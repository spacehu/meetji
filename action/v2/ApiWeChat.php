<?php

/**
 * restful api 的基本接口用来调用类库和方法的控制器
 *
 */

namespace action\v2;

use action\RestfulApi;
use http\Exception;
use mod\common as Common;
use mod\init;
use TigerDAL\CatchDAL;
use TigerDAL\Web\StatisticsDAL;
use TigerDAL\AccessDAL;
use TigerDAL\Api\WeChatDAL;
use TigerDAL\Cms\UserInfoDAL;
use TigerDAL\Api\LogDAL;
use TigerDAL\Cms\SystemDAL;
use TigerDAL\Web\PointDAL;
use config\code;

class ApiWeChat extends RestfulApi
{

    private $class;
    public $appid;                   //微信APPID，公众平台获取  
    public $appsecret;               //微信APPSECREC，公众平台获取  
    public $index_url;               //微信回调地址，要跟公众平台的配置域名相同  
    public $code;
    public $openid;
    private $access_token;

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
        $this->appid = init::$config['wechat']['appid'];                   //微信APPID，公众平台获取
        $this->appsecret = init::$config['wechat']['secret'];              //微信APPSECREC，公众平台获取
        $this->get = Common::exchangeGet();
        $this->header = Common::exchangeHeader();
        $this->post = Common::exchangePost();

        $this->access_token['access_token'] = self::getAccessTokenByAppid();
        if (empty($this->header['openid'])) {
            $this->openid = $this->header['openid'];
        } else {
            $this->beforeWeb();
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

    /** 获取access_token */
    function getAccessToken()
    {
        self::$data['title'] = "获取AccessToken";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $this->code = $this->getCode();
            $this->access_token = $this->getOpenId();
            LogDAL::saveLog("DEBUG", "INFO", json_encode($this->access_token));
            $userInfo = $this->getUserInfo();
            LogDAL::saveLog("DEBUG", "INFO", json_encode($userInfo));
            self::$data['data'] = [
                'openid' => $this->access_token['openid'],
                'access_token' => $this->access_token['access_token'],
                'nickname' => $userInfo['nickname'],
                'headimgurl' => $userInfo['headimgurl'],
            ];
        } catch (Exception $ex) {
            CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        LogDAL::saveLog("DEBUG", "INFO", json_encode(self::$data));
        return self::$data;
    }

    /** 获取access_token */
    function getTicket()
    {
        self::$data['title'] = "获取JsApiTicket";
        LogDAL::saveLog("DEBUG", "INFO", json_encode($this->get));
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            /* 判断是否有没过期的ticket 有的话 直接拿出来用 */
            $_ticket = SystemDAL::getConfigWithTime("js_ticket", 7200);
            if (empty($_ticket)) {
                $_token = $this->getToken();
                LogDAL::saveLog("DEBUG", "INFO", json_encode($_token));
                $res = $this->getJsApiTicket($_token['access_token']);
                LogDAL::saveLog("DEBUG", "INFO", json_encode($res));
                $_ticket = $res['ticket'];
            }
            $noncestr = "DSFHAJKHFJKA";
            $timestamp = time();
            $url = urldecode($this->get['url']);
            $string = 'jsapi_ticket=' . $_ticket . '&noncestr=' . $noncestr . '&timestamp=' . $timestamp . '&url=' . $url;
            $signature = sha1($string);
            self::$data['data'] = [
                'ticket' => $_ticket,
                'expires_in' => $res['expires_in'],
                'access_token' => $_token['access_token'],
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

    /** 获取授权信息 */
    function getWeChatInfo()
    {
        try {
            LogDAL::saveLog("DEBUG", "INFO", json_encode($this->get));
            self::initUser();
        } catch (Exception $ex) {
            CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        LogDAL::saveLog("DEBUG", "INFO", json_encode(self::$data));
        return self::$data;
    }

    function sendWechatMessage()
    {
        $res_array=self::sendMessage();
        self::$data['success'] = true;
        self::$data['data'] = $res_array;
        return self::$data;
    }

    /**
     * 检测有无$_SESSION。如果有，直接忽略。
     * 如果没有$_SESSION，就依次执行getCode、getOpenId、getUserInfo来获取用户信息。目的是解决CODE只能获取一次，刷新页面openid会丢失的问题。
     * 再判断是否在数据库中，没有则写入数据库。最后将open_id写入session。
     */
    public function beforeWeb()
    {
        if (empty($this->header['openid'])) {                             //如果$_SESSION中没有openid，说明用户刚刚登陆，就执行getCode、getOpenId、getUserInfo获取他的信息
            $this->code = $this->getCode();
            LogDAL::saveLog("DEBUG", "INFO", json_encode($this->code));
            if (self::$data['success'] == false) {
                return false;
            }
            $this->access_token = $this->getOpenId();
            LogDAL::saveLog("DEBUG", "INFO", json_encode($this->access_token));
            if ($this->access_token['errcode'] == 40029) {
                self::$data['success'] = false;
                self::$data['data'] = $this->access_token;
                return false;
            }
            $this->openid = $this->access_token['openid'];
        }
        return true;
    }

    public function initUser()
    {
        /** 初始化本地数据 */
        $wechat = new WeChatDAL();
        $UserInfoDAL = new UserInfoDAL();
        $PointDAL = new PointDAL();
        $userInfo = $this->getUserInfo();
        LogDAL::saveLog("DEBUG", "INFO", json_encode($userInfo));
        if (!empty($userInfo) && !empty($userInfo['openid'])) {
            $result = $wechat->getOpenId($userInfo['openid']);     //根据OPENID查找数据库中是否有这个用户，如果没有就写数据库。继承该类的其他类，用户都写入了数据库中。
            LogDAL::saveLog("DEBUG", "INFO", json_encode($result));
            if (empty($result)) {
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
                    'phone' => "",
                ];
                LogDAL::saveLog("DEBUG", "INFO", json_encode($_data));
                $wechat->addWeChatUserInfo($_data);
            }
        } else {
            /** 微信返回错误 */
            self::$data['success'] = false;
            self::$data['data']['code'] = $this->access_token;
            self::$data['data']['userError'] = $userInfo;
            return false;
        }
        $result = $wechat->getOpenId($this->openid);

        $_res = $UserInfoDAL->getByUserIdOne($result['id']);
        if (!empty($_res)) {
            $result['nickname'] = $_res['name'];
            $result['phone'] = $_res['phone'];
            $result['brithday'] = $_res['brithday'];
            $result['sex'] = $_res['sex'];
            $result['email'] = $_res['email'];
        } else {
            $result['brithday'] = '';
            $result['email'] = '';
        }
        // 积分
        $_point = $PointDAL->getUserPoint($result['id']);
        $result['point'] = !empty($_point) ? $_point : 0;
        self::$data['success'] = true;
        self::$data['data'] = $result;
        LogDAL::save(json_encode($this->openid));
        return true;
    }

    /**
     * @explain
     * 获取code,用于获取openid和access_token
     * @remark
     * code只能使用一次，当获取到之后code失效,再次获取需要重新进入
     * 不会弹出授权页面，适用于关注公众号后自定义菜单跳转等，如果不关注，那么只能获取openid
     * */
    public function getCode()
    {
        if (isset($this->get["code"])) {
            return $this->get["code"];
        } else {
            //$str = "location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $this->appid . "&redirect_uri=" . $this->index_url . "&response_type=code&scope=snsapi_userinfo#wechat_redirect";
            $str = "location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $this->appid . "&redirect_uri=INDEX_URL&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
            //LogDAL::save($str);
            self::$data['success'] = false;
            self::$data['data'] = $str;
        }
    }

    /**
     * @explain
     * 用于获取用户openid
     * */
    public function getOpenId()
    {
        $access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $this->appid . "&secret=" . $this->appsecret . "&code=" . $this->code . "&grant_type=authorization_code";
        //LogDAL::saveLog("DEBUG", "info", $access_token_url);
        $access_token_json = $this->https_request($access_token_url);
        $access_token_array = json_decode($access_token_json, TRUE);
        return $access_token_array;
    }

    /**
     * @explain
     * 通过code获取用户openid以及用户的微信号信息
     * @return mixed
     * @remark
     * 获取到用户的openid之后可以判断用户是否有数据，可以直接跳过获取access_token,也可以继续获取access_token
     * access_token每日获取次数是有限制的，access_token有时间限制，可以存储到数据库7200s. 7200s后access_token失效
     */
    public function getUserInfo()
    {
        $userinfo_url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $this->access_token['access_token'] . "&openid=" . $this->access_token['openid'] . "&lang=zh_CN";
        //LogDAL::saveLog("DEBUG", "info", $userinfo_url);
        $userinfo_json = $this->https_request($userinfo_url);
        $userinfo_array = json_decode($userinfo_json, TRUE);
        return $userinfo_array;
    }

    /**
     * 前端用 获取access_token 用 的
     * @return type
     */
    public function getToken()
    {
        $userinfo_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $this->appid . "&secret=" . $this->appsecret . "";
        LogDAL::saveLog("DEBUG", "INFO", $userinfo_url);
        $userinfo_json = $this->https_request($userinfo_url);
        LogDAL::saveLog("DEBUG", "INFO", $userinfo_json);
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
     * 用来获取access_token的接口
     * @return mixed
     */
    public function getAccessTokenByAppid()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $this->appid . "&secret=" . $this->appsecret;
        $res_json = $this->https_request($url);
        $res_array = json_decode($res_json, TRUE);
        return $res_array['access_token'];
    }

    /**
     * 发送微信通知消息
     */
    public function sendMessage(){
        $url = "https://api.weixin.qq.com/cgi-bin/message/subscribe/bizsend?access_token=" . $this->access_token['access_token'];
        $_data=[
            "first"=>[
                "value"=>"您的注册信息已经提交！"
            ],
            "keyword1"=>[
                "value"=>"用户注册"
            ],
            "keyword2"=>[
                "value"=>"待审核"
            ],
            "remark"=>[
                "value"=>"有任何疑问请联系我们的服务人员。"
            ],
        ];
        $data = [
            'touser' => $this->access_token['openid'],
            'template_id' => '4M8RWgwsGDYlZL_NuWg--FecFh3QKWMW1hVZIfm34IU',
            'data' => json_encode($_data),
        ];
        $res_json = $this->https_request($url, $data);
        $res_array = json_decode($res_json, TRUE);
        return $res_array;
    }

    /**
     * @explain
     * 发送http请求，并返回数据
     * @param $url
     * @param null $data
     * @return mixed
     */
    public function https_request($url, $data = null)
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
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

}
