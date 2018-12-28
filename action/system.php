<?php

namespace action;

use mod\common as Common;
use TigerDAL;
use TigerDAL\Cms\SystemDAL;
use config\code;

class system {

    private $class;
    public static $data;

    function __construct() {
        $this->class = str_replace('action\\', '', __CLASS__);
    }

    function index() {
        Common::isset_cookie();
        try {
            self::$data['data'] = SystemDAL::getAll();
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SYSTEM_INDEX], code::SYSTEM_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateSystem() {
        Common::isset_cookie();
        try {
            self::$data['data'] = SystemDAL::updateSystem($_POST);
            if (self::$data) {
                Common::js_redir(Common::url_rewrite('index.php?a=system&m=index'));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SYSTEM_UPDATE], code::SYSTEM_UPDATE, json_encode($ex));
        }
    }
}
