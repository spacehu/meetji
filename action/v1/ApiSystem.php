<?php

namespace action\v1;

use mod\common as Common;
use TigerDAL;
use TigerDAL\Api\EnumDAL;
use config\code;
use TigerDAL\Cms\SystemDAL;

class ApiSystem extends \action\RestfulApi {

    private $class;

    function __construct() {
        $path = parent::__construct();
        $this->class = str_replace('action\\', '', __CLASS__);
        //Common::pr($_SERVER);
        if (!empty($path)) {
            $_path = explode("-", $path);
            $actEval = "\$res = \$this ->" . $_path['2'] . "();";
            eval($actEval);
            exit(json_encode($res));
        }
    }

    /** 异步 */
    function saveip() {
        try {
            $id = $_GET['keyword'];
            $_data = [
                'server_ip' => $id,
            ];
            if (!empty($id)) {
                self::$data = SystemDAL::checkSystem($_data);
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::API_ENUM], code::API_ENUM, json_encode($ex));
            self::$data['success'] = false;
            self::$data['message'] = '999';
        }
        return self::$data;
    }

}
