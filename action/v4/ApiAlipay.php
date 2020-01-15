<?php

/**
 * restful api 的基本接口用来调用类库和方法的控制器
 * 
 */

namespace action\v4;

use mod\common as Common;
use TigerDAL\AccessDAL;
use TigerDAL\Api\LogDAL;
use config\code;

class ApiAlipay extends \action\RestfulApi {

    private $class;
    public $aeskey;         //支付宝密钥
    public $index_url;               //微信回调地址，要跟公众平台的配置域名相同  
    public $code;
    public $openid;

    /**
     * 主方法引入父类的基类
     * 责任是分担路由的工作
     */
    function __construct() {
        $path = parent::__construct();
        $this->class = str_replace('action\\', '', __CLASS__);
        LogDAL::save(date("Y-m-d H:i:s") . "-------------------------------------" . $this->class . "", "DEBUG");
        LogDAL::save(date("Y-m-d H:i:s") . "-------------------------------------" . $path . "", "DEBUG");
        $this->aeskey = \mod\init::$config['env']['lib']['alipay']['min']['aeskey'];
        $this->get = Common::exchangeGet();
        $this->header = Common::exchangeHeader();
        //$this->index_url = urlencode("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);           //微信回调地址，要跟公众平台的配置域名相同  
        if (!empty($path)) {
            $_path = explode("-", $path);
            $mod=$_path['2'];
            $res=$this->$mod();
            exit(json_encode($res));
        }
    }

    /**
     * 结束魔术方法
     */
    function __destruct() {
        parent::__destruct();
    }

    /**
     * 前端请求解析电话号码的方法
     * 返回解析完成的电话号码
     */
    function oriPhone(){
        $response=$this->post['response'];
        return $this->decryptData($response);

    }

    /**
     * 解码用的私有方法
     */
    public function decryptData( $encryptedData )
    {
        $key = $this->aeskey;
        $aesKey=base64_decode($key);
        $iv = 0;

        $aesIV=base64_decode($iv);

        $aesCipher=base64_decode($encryptedData);

        $result=openssl_decrypt( $aesCipher, "AES-128-CBC", $aesKey, 1, $aesIV);
        
        return $result;
    }
}
