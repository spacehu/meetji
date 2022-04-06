<?php

/**
 * restful api 的基本接口用来调用类库和方法的控制器
 *
 */

namespace action\v4;

use action\RestfulApi;
use http\Exception;
use mod\common as Common;
use mod\init;
use TigerDAL\BaseDAL;
use TigerDAL\CatchDAL;
use TigerDAL\AccessDAL;
use TigerDAL\Api\WeChatDAL;
use TigerDAL\Api\LogDAL;
use TigerDAL\Cms\SystemDAL;
use config\code;
use TigerDAL\Api\YimeiDAL;

class ApiWeChat extends RestfulApi
{

    private $class;
    public static $appid;                   //微信APPID，公众平台获取  
    public static $appsecret;               //微信APPSECREC，公众平台获取  
    public static $index_url;               //微信回调地址，要跟公众平台的配置域名相同  
    public static $code;
    private $access_token;
    private $enterprise_id;
    private $JsApiTicket;

    /**
     * 主方法引入父类的基类
     * 责任是分担路由的工作
     */
    function __construct()
    {
        $path = parent::__construct();
        $this->class = str_replace('action\\', '', __CLASS__);
        LogDAL::save(date("Y-m-d H:i:s") . "-------------------------------------" . $this->class . "", "DEBUG");
        LogDAL::save(date("Y-m-d H:i:s") . "-------------------------------------" . $path . "", "DEBUG");

        if(empty($this->header['channel'])){
            self::$data['success']=false;
            self::$data['data']="channel empty";
            return self::$data;
        }
        $enterprise=self::getEnterpriseInfo();
        if(empty($enterprise)){
            self::$data['success']=false;
            self::$data['data']="enterprise info empty";
            return self::$data;
        }
        $this->enterprise_id=$enterprise['id'];
        if(empty($enterprise['wechat_appid'])){
            self::$data['success']=false;
            self::$data['data']="wechat appid empty";
            return self::$data;
        }
        $this->appid=$enterprise['wechat_appid'];
        $this->secret=$enterprise['wechat_secert'];
        if(empty($enterprise['wechat_access_token'])){
            self::reflashToken();
        }else{
            $this->access_token=$enterprise['wechat_access_token'];
        }
        //$this->index_url = urlencode("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);           //微信回调地址，要跟公众平台的配置域名相同
        if (!empty($path)) {
            $_path = explode("-", $path);
            $mod = $_path[2];
            $res = $this->$mod();
            exit(json_encode($res));
        }
    }

    function __destruct()
    {
        parent::__destruct();
    }

    /** 获取 access_token */
    function getTicket() 
    {
        self::$data['title'] = "获取JsApiTicket";
        LogDAL::saveLog("DEBUG", "INFO", json_encode($this->get));
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $enterpriseInfo=self::getEnterpriseInfo();
            /* 判断是否有没过期的ticket 有的话 直接拿出来用 */
            if (empty($enterpriseInfo['wechat_ticket'])) {
                self::reflashJsApiTicket();
            }else{
                $this->JsApiTicket=$enterpriseInfo['wechat_ticket'];
            }
            if($enterpriseInfo['wechat_ticket_expires_in']<time()){
                self::reflashJsApiTicket();
            }
            $enterpriseInfo=self::getEnterpriseInfo();
            $noncestr = "DSFHAJKHFJKA";
            $timestamp = time();
            $url = urldecode($this->get['url']);
            $string = 'jsapi_ticket=' . $this->JsApiTicket . '&noncestr=' . $noncestr . '&timestamp=' . $timestamp . '&url=' . $url;
            $signature = sha1($string);
            self::$data['data'] = [
                'ticket' => $this->JsApiTicket,
                'expires_in' => $enterprise['wechat_ticket_expires_in'],
                'access_token' => $this->access_token,
                'noncestr' => $noncestr,
                'timestamp' => $timestamp,
                'url' => $url,
                'signature' => $signature,
                'string' => $string,
            ];
        } catch (Exception $ex) {
            CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        LogDAL::saveLog("DEBUG", "INFO", json_encode(self::$data));
        return self::$data;
    }

    /**
     * 前端用 获取access_token 用的 该数据因提供给微信运营平台用的普通access_token
     */
    public function getToken()
    {
        $userinfo_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $this->appid . "&secret=" . $this->appsecret . "";
        $userinfo_json = $this->https_request($userinfo_url);
        $userinfo_array = json_decode($userinfo_json, TRUE);
        return $userinfo_array;
    }

    /**
     * 前端用 获取ticket 用 的
     * @param type $access_token
     * @return type
     */
    public function getJsApiTicket($access_token)
    {
        $userinfo_url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=" . $access_token . "&type=jsapi";
        $userinfo_json = $this->https_request($userinfo_url);
        $userinfo_array = json_decode($userinfo_json, TRUE);
        return $userinfo_array;
    }

    /**
     * @explain
     * 发送http请求，并返回数据
     * @param $url
     * @param null $data
     * @param null $headers
     * @return mixed
     */
    public function https_request($url, $data = null, $headers = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

    /**
     * 获取code下的企业关系key
     * @return array 
     */
    public static function getEnterpriseInfo(){
        return YimeiDAL::token($this->header['channel']);
    }

    /**
     * 刷新 access token
     */
    public static function reflashToken(){
        // get token
        $access_token=$this->getToken();
        // set global
        $this->access_token=$access_token['access_token'];
        // save to db
        $data=[
            "wechat_access_token"=>$this->access_token,
            "wechat_access_token_expires_in"=>(int)(time()+$ticket['expires_in']),
        ];
        YimeiDAL::saveEnterprise($this->enterprise_id,$data);
    }
    
    /**
     * 刷新 ticket
     */
    public static function reflashJsApiTicket(){
        // get token
        $ticket=$this->getJsApiTicket($this->access_token);
        // set global
        $this->JsApiTicket=$ticket['ticket'];
        // save to db
        $data=[
            "wechat_ticket"=>$ticket['ticket'],
            "wechat_ticket_expires_in"=>(int)(time()+$ticket['expires_in']),
        ];
        YimeiDAL::saveEnterprise($this->enterprise_id,$data);
    }
}
