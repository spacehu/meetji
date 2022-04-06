<?php

namespace action;

use mod\common as Common;
use TigerDAL;
use TigerDAL\Cms\EnterpriseDAL;
use TigerDAL\Cms\UserDAL;
use config\code;

class enterprise {

    private $class;
    public static $data;

    function __construct() {
        $this->class = str_replace('action\\', '', __CLASS__);
    }

    function index() {
        Common::isset_cookie();
        Common::writeSession($_SERVER['REQUEST_URI'], $this->class);
        try {
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : \mod\init::$config['page_width'];
            $keywords = isset($_GET['keywords']) ? $_GET['keywords'] : "";

            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            self::$data['keywords'] = $keywords;
            //Common::pr(self::$data);die;
            self::$data['total'] = EnterpriseDAL::getTotal($keywords);
            self::$data['data'] = EnterpriseDAL::getAll($currentPage, $pagesize, $keywords);
            self::$data['class'] = $this->class;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::CATEGORY_INDEX], code::CATEGORY_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function getEnterprise() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data['data'] = EnterpriseDAL::getOne($id);
            } else {
                self::$data['data'] = null;
            }
            self::$data['class'] = $this->class;
            self::$data['list'] = UserDAL::getAll(1, 999, '');
            //Common::pr(self::$data['list']);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::CATEGORY_INDEX], code::CATEGORY_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateEnterprise() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                $data = [
                    'name' => $_POST['name'],
                    'code' => $_POST['code'],
                    'edit_by' => Common::getSession("id"),
                    'username' => $_POST['username'],
                    'usercode' => isset($_POST['usercode']) ? $_POST['usercode'] : "",
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address'],
                    'appid' => $_POST['appid'],
                    'secret' => $_POST['secret'],
                    'cli_status' => $_POST['cli_status'],
                    'cli_config' => $_POST['cli_config'],
                    'user_id' => $_POST['user_id'],
                    'wechat_appid' => isset($_POST['wechat_appid']) ? $_POST['wechat_appid'] : "",
                    'wechat_secert' => isset($_POST['wechat_secert']) ? $_POST['wechat_secert'] : "",
                    'wechat_access_token' => isset($_POST['wechat_access_token']) ? $_POST['wechat_access_token'] : "",
                ];
                self::$data = EnterpriseDAL::update($id, $data);
            } else {
                if (EnterpriseDAL::getByName($_POST['name'])) {
                    Common::js_alert(code::ALREADY_EXISTING_DATA);
                    TigerDAL\CatchDAL::markError(code::$code[code::ALREADY_EXISTING_DATA], code::ALREADY_EXISTING_DATA, json_encode($_POST));
                    Common::js_redir(Common::getSession($this->class));
                }
                //Common::pr(UserDAL::getUser($_POST['name']));die;
                $data = [
                    'name' => $_POST['name'],
                    'code' => $_POST['code'],
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                    'username' => $_POST['username'],
                    'usercode' => isset($_POST['usercode']) ? $_POST['usercode'] : "",
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address'],
                    'user_id' => $_POST['user_id'],
                    'appid' => $_POST['appid'],
                    'secret' => $_POST['secret'],
                    'cli_status' => $_POST['cli_status'],
                    'cli_config' => $_POST['cli_config'],
                    'qrcode_status' => isset($_POST['qrcode_status']) ? $_POST['qrcode_status']:0,
                    'wechat_appid' => isset($_POST['wechat_appid']) ? $_POST['wechat_appid'] : "",
                    'wechat_secert' => isset($_POST['wechat_secert']) ? $_POST['wechat_secert'] : "",
                    'wechat_access_token' => isset($_POST['wechat_access_token']) ? $_POST['wechat_access_token'] : "",
                ];
                self::$data = EnterpriseDAL::insert($data);
            }
            if (self::$data) {
                //Common::pr(Common::getSession($this->class));die;
                Common::js_redir(Common::getSession($this->class));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::CATEGORY_UPDATE], code::CATEGORY_UPDATE, json_encode($ex));
        }
    }

    function deleteEnterprise() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = EnterpriseDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::CATEGORY_DELETE], code::CATEGORY_DELETE, json_encode($ex));
        }
    }

}
