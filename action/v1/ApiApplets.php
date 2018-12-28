<?php

/**
 * restful api 的基本接口用来调用类库和方法的控制器
 * 
 */

namespace action\v1;

use mod\common as Common;
use TigerDAL\Web\StatisticsDAL;
use TigerDAL\Api\AppletsDAL;
use TigerDAL\Api\WeChatDAL;
use TigerDAL\AccessDAL;
use config\code;

class ApiApplets extends \action\RestfulApi {

    private $class;
    private $get;

    /**
     * 主方法引入父类的基类
     * 责任是分担路由的工作
     */
    function __construct() {
        $path = parent::__construct();
        $this->class = str_replace('action\\', '', __CLASS__);
        $this->get = Common::exchangeGet();
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

    /** 保存用户微信信息 */
    function saveWeChatInfo() {
        try {
            $userInfo = [
                'openid' => $_POST['openid'],
                'nickname' => $_POST['nickName'],
                'sex' => $_POST['sex'],
                'language' => $_POST['language'],
                'city' => $_POST['city'],
                'province' => $_POST['province'],
                'country' => $_POST['country'],
                'headimgurl' => $_POST['avatarUrl'],
                'privilege' => json_encode($_POST['privilege']),
                'add_time' => date("Y-m-d H:i:s"),
                'edit_time' => date("Y-m-d H:i:s"),
                'user_id' => "",
            ];
            if ($userInfo) {
                $wechat = new WeChatDAL();
                $result = $wechat->getOpenId($userInfo['openid']);     //根据OPENID查找数据库中是否有这个用户，如果没有就写数据库。继承该类的其他类，用户都写入了数据库中。  
                LogDAL::saveLog("DEBUG", "INFO", json_encode($result));
                if (!$result) {
                    LogDAL::saveLog("DEBUG", "INFO", json_encode($userInfo));
                    $wechat->addWeChatUserInfo($userInfo);
                }
                //$_SESSION['openid'] = $userInfo['openid'];         //写到$_SESSION中。微信缓存很坑爹，调试时请及时清除缓存再试。  
                self::$data['data'] = 'openid: ' . $userInfo['openid'];
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
            self::$data['data'] = json_encode($ex);
        }
        return self::$data;
    }

    /** 照片列表 */
    function photo() {
        self::$data['title'] = "照片";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 20;
            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            //照片列表
            $AppletsDAL = new AppletsDAL();

            $res = $AppletsDAL->GetPhoto($currentPage, $pagesize);
            self::$data['total'] = $AppletsDAL->GetPhotoTotal();
            self::$data['photo'] = $res['data'];

            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

}
