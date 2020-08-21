<?php

/**
 * restful api 的基本接口用来调用类库和方法的控制器
 * 
 */

namespace action\v4;

use mod\common as Common;
use TigerDAL\Api\ItemDAL;
use TigerDAL\Api\LogDAL;
use TigerDAL\Cms\SystemDAL;
use TigerDAL\Cms\UserWechatDAL;
use TigerDAL\Cms\UserInfoDAL;
use config\code;

class ApiItem extends \action\RestfulApi {


    /**
     * 主方法引入父类的基类
     * 责任是分担路由的工作
     */
    function __construct() {
        $path = parent::__construct();
        if (!empty($path)) {
            $_path = explode("-", $path);
            $mod=$_path['2'];
            $res=$this->$mod();
            exit(json_encode($res));
        }
    }

    /** 课程详情 */
    function getItem() {
        try {
            self::$data['id'] = $id = $_GET['id'];
            $ItemDAL = new ItemDAL();
            $res = $ItemDAL->getOne($id);
            self::$data['data']['info'] = $res['data'];
            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

}
