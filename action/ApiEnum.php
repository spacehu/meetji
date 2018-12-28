<?php

namespace action;

use mod\common as Common;
use TigerDAL;
use TigerDAL\Api\EnumDAL;
use config\code;

class ApiEnum {

    private $class;
    public static $data;

    function __construct() {
        $this->class = str_replace('action\\', '', __CLASS__);
    }

    /** 异步 */
    function getRegion() {
        try {
            $id = $_GET['id'];
            self::$data = EnumDAL::GetRegion($id);
            if (self::$data) {
                echo json_encode(['success' => true, 'data' => self::$data]);
            } else {
                echo json_encode(['success' => false, 'message' => '查询失败，请联系系统管理员']);
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::API_ENUM], code::API_ENUM, json_encode($ex));
            echo json_encode(['success' => false, 'message' => '999']);
        }
    }

}
