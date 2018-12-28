<?php

namespace action;

use mod\common as Common;
use config\code;
use TigerDAL\Api\LogDAL;

class api {

    public static $data;
    private $get;

    function __construct() {
        $this->get = Common::exchangeGet();
    }

    function index() {

        try {
            //print_r($_GET);die;
            $_path = "";
            if (!empty($_GET['title'])) {
                $_path = $_GET['title'];
            }
            LogDAL::saveLog("API", "INFO", json_encode($this->get));
            $_url = "https://www.tigerhuclub.com/" . $_path . "?code=" . $this->get['code'];
            LogDAL::saveLog("API", "INFO", json_encode($_url));
            Common::js_redir($_url);
            exit;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
    }

}
