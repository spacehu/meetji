<?php

namespace action;

use mod\common as Common;
use TigerDAL;
use TigerDAL\Cms\UserWechatDAL;
use TigerDAL\Cms\UserInfoDAL;
use config\code;

class userWechat {

    private $class;
    public static $data;

    function __construct() {
        $this->class = str_replace('action\\', '', __CLASS__);
    }

    function index() {
        //Common::pr(date("Y-m-d H:i:s"));die;
        Common::isset_cookie();
        Common::writeSession($_SERVER['REQUEST_URI'], $this->class);
        //Common::pr(Common::getSession($this->class));die;
        $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
        $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : \mod\init::$config['page_width'];
        $keywords = isset($_GET['keywords']) ? $_GET['keywords'] : "";
        try {
            self::$data['data'] = UserWechatDAL::getAll($currentPage, $pagesize, $keywords);
            self::$data['total'] = UserWechatDAL::getTotal($keywords);

            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            self::$data['keywords'] = $keywords;
            self::$data['class'] = $this->class;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::USER_INDEX], code::USER_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function getUserWechat() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                $res = UserWechatDAL::getOne($id);
                self::$data['data'] = $res;
                if (!empty($res)) {
                    self::$data['data']['subinfo'] = UserInfoDAL::getByUserIdOne($id);
                }
            } else {
                self::$data['data'] = null;
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::USER_INDEX], code::USER_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

}
