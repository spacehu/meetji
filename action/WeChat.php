<?php

namespace action;

define("TOKEN", "space2018");
ob_clean();

use mod\common as Common;
use TigerDAL;
use TigerDAL\Api\LogDAL;
use TigerDAL\Api\HttpDAL;
use TigerDAL\Cms\SystemDAL;
use TigerDAL\Api\WeChatDAL;

class WeChat {

    private $class;
    public static $data;
    public $appid;                   //微信APPID，公众平台获取  
    public $appsecret;               //微信APPSECREC，公众平台获取  
    public $index_url;               //微信回调地址，要跟公众平台的配置域名相同  
    public $code;
    public $openid;
    private $get;

    function __construct() {
        $this->class = str_replace('action\\', '', __CLASS__);
        $this->appid = \mod\init::$config['wechat']['appid'];                   //微信APPID，公众平台获取  
        $this->appsecret = \mod\init::$config['wechat']['secret'];              //微信APPSECREC，公众平台获取  
        $this->index_url = urlencode(\mod\init::$config['wechat']['index_url']);           //微信回调地址，要跟公众平台的配置域名相同  
//        $this->index_url = urlencode("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);           //微信回调地址，要跟公众平台的配置域名相同  
        $this->get = Common::exchangeGet();
        LogDAL::saveLog("LOG", "INFO", "this->get: " . json_encode($this->get));
    }

    /** 微信验证 */
    function check() {
        $echoStr = $_GET["echostr"];
        //valid signature , option
        if ($this->checkSignature()) {
            echo $echoStr;
            exit;
        }
    }

    /** 微信验证 */
    function checkSignature() {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = TOKEN;
        LogDAL::saveLog("LOG", "INFO", "_GET: " . json_encode($_GET));
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if ($tmpStr == $signature) {
            LogDAL::saveLog("LOG", "INFO", "验证服务器成功");
            return true;
        } else {
            return false;
        }
    }

    /** 微信验证 */
    function responseMsg() {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        //extract post data
        if (!empty($postStr)) {

            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
 <ToUserName><![CDATA[%s]]></ToUserName>
 <FromUserName><![CDATA[%s]]></FromUserName>
 <CreateTime>%s</CreateTime>
 <MsgType><![CDATA[%s]]></MsgType>
 <Content><![CDATA[%s]]></Content>
 <FuncFlag>0</FuncFlag>
 </xml>";
            if (!empty($keyword)) {
                $msgType = "text";
                $contentStr = "Welcome to wechat world!";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            } else {
                echo "Input something...";
            }
        } else {
            echo "";
            exit;
        }
    }

    /** 获取access_token */
    function setAccessToken() {
        $accessToken = WeChatDAL::getAccessToken();
        //var_dump($accessToken);
        if (empty($accessToken)) {
            $_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . \mod\init::$config['wechat']['appid'] . "&secret=" . \mod\init::$config['wechat']['secret'];
            $_data = json_decode(HttpDAL::Get($_url));
            //var_dump($_data);
            //var_dump($_data->access_token);
            $data = [
                "access_token" => $_data->access_token,
            ];
            SystemDAL::updateSystem($data);
            LogDAL::saveLog("LOG", "INFO", "access_token获取成功: " . $_data->access_token);
            $accessToken = $_data->access_token;
        }
        return $accessToken;
    }

    /**
     * 检测有无$_SESSION。如果有，直接忽略。
     * 如果没有$_SESSION，就依次执行getCode、getOpenId、getUserInfo来获取用户信息。目的是解决CODE只能获取一次，刷新页面openid会丢失的问题。  
     * 再判断是否在数据库中，没有则写入数据库。最后将open_id写入session。  
     */
    public function beforeWeb() {
        if (!$_SESSION['openid']) {                             //如果$_SESSION中没有openid，说明用户刚刚登陆，就执行getCode、getOpenId、getUserInfo获取他的信息  
            $this->code = $this->getCode();
            //LogDAL::save(json_encode($this->code));
            $this->access_token = $this->getOpenId();
            //LogDAL::save(json_encode($this->access_token));
            $userInfo = $this->getUserInfo();
            //LogDAL::saveLog("LOG", "INFO", json_encode($userInfo));
            if ($userInfo) {
                $wechat = new WeChatDAL();
                $result = $wechat->getOpenId($userInfo['openid']);     //根据OPENID查找数据库中是否有这个用户，如果没有就写数据库。继承该类的其他类，用户都写入了数据库中。  
                LogDAL::saveLog("LOG", "INFO", json_encode($result));
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
                    LogDAL::saveLog("LOG", "INFO", json_encode($_data));
                    $wechat->addWeChatUserInfo($_data);
                }
                $_SESSION['openid'] = $userInfo['openid'];         //写到$_SESSION中。微信缓存很坑爹，调试时请及时清除缓存再试。  
            }
        }
        //LogDAL::save(json_encode($_SESSION['openid']));
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
            header($str);
            exit;
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

    /** 发送行程 */
    function sendNotice() {
        
    }

}
