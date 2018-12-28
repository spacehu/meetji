<?php

/**
 * restful api 的基本接口用来调用类库和方法的控制器
 * 
 */

namespace action\v2;

use mod\common as Common;
use TigerDAL\Web\StatisticsDAL;
use TigerDAL\AccessDAL;
use TigerDAL\Api\WeChatDAL;
use TigerDAL\Api\LogDAL;
use config\code;

class ApiWeChat extends \action\RestfulApi {

    private $class;
    public $appid;                   //微信APPID，公众平台获取  
    public $appsecret;               //微信APPSECREC，公众平台获取  
    public $index_url;               //微信回调地址，要跟公众平台的配置域名相同  
    public $code;
    public $openid;
    private $get;

    /**
     * 主方法引入父类的基类
     * 责任是分担路由的工作
     */
    function __construct() {
        $path = parent::__construct();
        $this->class = str_replace('action\\', '', __CLASS__);

        $this->appid = \mod\init::$config['wechat']['appid'];                   //微信APPID，公众平台获取  
        $this->appsecret = \mod\init::$config['wechat']['secret'];              //微信APPSECREC，公众平台获取  
        $this->get = Common::exchangeGet();
        $this->index_url = urlencode(\mod\init::$config['wechat']['index_url'] . '/api-index-title-' . $this->get['backurl']);           //微信回调地址，要跟公众平台的配置域名相同  
        //$this->index_url = urlencode("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);           //微信回调地址，要跟公众平台的配置域名相同  

        $this->insertStatistics($_SERVER);
        //Common::pr($_SERVER);
        if (!empty($path)) {
            $_path = explode("-", $path);
            $actEval = "\$res = \$this ->" . $_path['2'] . "();";
            eval($actEval);
            exit(json_encode($res));
        }
    }

    /** 记录日志 */
    private function insertStatistics($method) {
        $access = new AccessDAL();
        $statistics = new StatisticsDAL();
        $data = [
            'ip' => $access->getIP(),
            'machine' => $access->getOS(),
            'browser' => $access->getBrowse(),
            'user_id' => !empty(Common::getSession("user_id")) ? Common::getSession("user_id") : "",
            'action' => $this->class,
            'model' => $_GET['m'],
            'page' => $_GET['m'],
            'page_url' => $method['HTTP_HOST'] . $method['REQUEST_URI'],
            'add_time' => date("Y-m-d H:i:s"),
        ];
        $statistics->insert($data);
    }

    /** 获取授权信息 */
    function getWeChatInfo() {
        try {
            LogDAL::saveLog("DEBUG", "INFO", json_encode($this->get));
            $this->beforeWeb();
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        LogDAL::saveLog("DEBUG", "INFO", json_encode(self::$data));
        return self::$data;
    }

    /**
     * 检测有无$_SESSION。如果有，直接忽略。
     * 如果没有$_SESSION，就依次执行getCode、getOpenId、getUserInfo来获取用户信息。目的是解决CODE只能获取一次，刷新页面openid会丢失的问题。  
     * 再判断是否在数据库中，没有则写入数据库。最后将open_id写入session。  
     */
    public function beforeWeb() {
        if (!$_SESSION['openid']) {                             //如果$_SESSION中没有openid，说明用户刚刚登陆，就执行getCode、getOpenId、getUserInfo获取他的信息  
            $this->code = $this->getCode();
            LogDAL::saveLog("DEBUG", "INFO", json_encode($this->code));
            if (self::$data['success'] == false) {
                return false;
            }
            $this->access_token = $this->getOpenId();
            //LogDAL::saveLog(json_encode($this->access_token));
            $userInfo = $this->getUserInfo();
            //LogDAL::saveLog("LOG", "INFO", json_encode($userInfo));
            if ($userInfo) {
                $wechat = new WeChatDAL();
                $result = $wechat->getOpenId($userInfo['openid']);     //根据OPENID查找数据库中是否有这个用户，如果没有就写数据库。继承该类的其他类，用户都写入了数据库中。  
                LogDAL::saveLog("DEBUG", "INFO", json_encode($result));
                if (!$result) {
                    $_data = [
                        'openid' => $userInfo['openid'],
                        'nickname' => $userInfo['nickname'],
                        'sex' => $userInfo['sex'],
                        'language' => $userInfo['language'],
                        'city' => $userInfo['city'],
                        'province' => $userInfo['province'],
                        'country' => $userInfo['country'],
                        'headimgurl' => $userInfo['headimgurl'],
                        'privilege' => json_encode($userInfo['privilege']),
                        'add_time' => date("Y-m-d H:i:s"),
                        'edit_time' => date("Y-m-d H:i:s"),
                        'user_id' => !empty(Common::getSession("user_id")) ? Common::getSession("user_id") : "",
                    ];
                    LogDAL::saveLog("DEBUG", "INFO", json_encode($_data));
                    $wechat->addWeChatUserInfo($_data);
                }
                //$_SESSION['openid'] = $userInfo['openid'];         //写到$_SESSION中。微信缓存很坑爹，调试时请及时清除缓存再试。  
                self::$data['data'] = 'openid: ' . $userInfo['openid'];
            }
        }
        LogDAL::save(json_encode($_SESSION['openid']));
    }

    /**
     * @explain 
     * 获取code,用于获取openid和access_token 
     * @remark 
     * code只能使用一次，当获取到之后code失效,再次获取需要重新进入 
     * 不会弹出授权页面，适用于关注公众号后自定义菜单跳转等，如果不关注，那么只能获取openid 
     * */
    public function getCode() {
        if (isset($this->get["code"])) {
            return $this->get["code"];
        } else {
            //$str = "location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $this->appid . "&redirect_uri=" . $this->index_url . "&response_type=code&scope=snsapi_userinfo#wechat_redirect";
            $str = "location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $this->appid . "&redirect_uri=" . $this->index_url . "&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
            //LogDAL::save($str);
            self::$data['success'] = false;
            self::$data['data'] = $str;
        }
    }

    /**
     * @explain 
     * 用于获取用户openid 
     * */
    public function getOpenId() {
        $access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $this->appid . "&secret=" . $this->appsecret . "&code=" . $this->code . "&grant_type=authorization_code";
        $access_token_json = $this->https_request($access_token_url);
        $access_token_array = json_decode($access_token_json, TRUE);
        return $access_token_array;
    }

    /**
     * @explain 
     * 通过code获取用户openid以及用户的微信号信息 
     * @return 
     * @remark 
     * 获取到用户的openid之后可以判断用户是否有数据，可以直接跳过获取access_token,也可以继续获取access_token 
     * access_token每日获取次数是有限制的，access_token有时间限制，可以存储到数据库7200s. 7200s后access_token失效 
     * */
    public function getUserInfo() {

        $userinfo_url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $this->access_token['access_token'] . "&openid=" . $this->access_token['openid'] . "&lang=zh_CN";
        $userinfo_json = $this->https_request($userinfo_url);
        $userinfo_array = json_decode($userinfo_json, TRUE);
        return $userinfo_array;
    }

    /**
     * @explain 
     * 发送http请求，并返回数据 
     * */
    public function https_request($url, $data = null) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

}
