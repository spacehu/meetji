<?php

namespace action\v2;

use mod\common as Common;
use TigerDAL;
use TigerDAL\Api\EnumLeoDAL;
use config\code;
use TigerDAL\AccessDAL;

class ApiEnum extends \action\RestfulApi {

    /**
     * 主方法引入父类的基类
     * 责任是分担路由的工作
     */
    function __construct() {
        $path = parent::__construct();
        if (!empty($path)) {
            $_path = explode("-", $path);
            $actEval = "\$res = \$this ->" . $_path['2'] . "();";
            eval($actEval);
            exit(json_encode($res));
        }
    }

    /** 异步 */
    function getRegion() {
        try {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            self::$data['data'] = EnumLeoDAL::GetRegion($id);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::API_ENUM], code::API_ENUM, json_encode($ex));
            self::$data['success'] = false;
            self::$data['message'] = '999';
        }
        return self::$data;
    }

}
