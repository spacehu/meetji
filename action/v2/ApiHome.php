<?php

/**
 * restful api 的基本接口用来调用类库和方法的控制器
 * 
 */

namespace action\v2;

use mod\common as Common;
use TigerDAL\Web\HomeDAL;
use TigerDAL\Web\StatisticsDAL;
use TigerDAL\AccessDAL;
use TigerDAL\Api\LeaveMessageDAL;
use config\code;

class ApiHome extends \action\RestfulApi {

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

    /** 首页 */
    function slideShow() {
        try {
            //轮播列表
            $HomeDAL = new HomeDAL();
            $res = $HomeDAL->GetSlideShow(1, 20);
            //print_r($res);die;
            self::$data['data']['total'] = $res['total'];
            self::$data['data']['list'] = $res['data'];
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 活动列表 */
    function article() {
        try {
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 5;
            $keywords = isset($_GET['keywords']) ? urldecode($_GET['keywords']) : '';
            $region = isset($_GET['region']) ? urldecode($_GET['region']) : '';
            $cat = isset($_GET['cat']) ? urldecode($_GET['cat']) : '';
            $brand = isset($_GET['brand']) ? urldecode($_GET['brand']) : '';
            $age_start = isset($_GET['age_start']) ? $_GET['age_start'] : '';
            $age_end = isset($_GET['age_end']) ? $_GET['age_end'] : '';
            $subject_category = isset($_GET['subject_category']) ? urldecode($_GET['subject_category']) : '';
            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            self::$data['keywords'] = $keywords;
            self::$data['region'] = $region;
            self::$data['cat'] = $cat;
            self::$data['brand'] = $brand;
            self::$data['age_start'] = $age_start;
            self::$data['age_end'] = $age_end;
            self::$data['subject_category'] = $subject_category;

            $age = [];
            if (!empty($age_start)) {
                $age[0] = $age_start;
                if (!empty($age_end)) {
                    $age[1] = $age_end;
                } else {
                    $age[1] = 0;
                }
            }
            //奖项列表
            $HomeDAL = new HomeDAL();

            $res = $HomeDAL->GetArticle($currentPage, $pagesize, $keywords, $region, $cat, $brand, $age, $subject_category);
            self::$data['data']['total'] = $HomeDAL->GetArticleTotal();
            self::$data['data']['list'] = $res['data'];
            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 活动详情 */
    function article_detail() {
        try {
            $id = $_GET['id'];
            self::$data['id'] = $id;
            //奖项列表
            $HomeDAL = new HomeDAL();
            $HomeDAL->AddAccess($id, "article");

            $res = $HomeDAL->GetArticleOne($id);
            self::$data['article'] = $res['data'];
            $buttonMenu = $HomeDAL->GetArticleButtonMenu($id);
            self::$data['buttonMenu'] = $buttonMenu['data'];

            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 分享列表 */
    function share() {
        self::$data['title'] = "分享";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 9;
            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            //照片列表
            $HomeDAL = new HomeDAL();

            $res = $HomeDAL->GetShare($currentPage, $pagesize);
            self::$data['total'] = $HomeDAL->GetShareTotal();
            self::$data['share'] = $res['data'];

            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 单页 */
    function single() {
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
//            $_data = (array) json_decode(base64_decode($_GET['keyword']));
//            self::$data['title'] = $_data['title'];
//            self::$data['data'] = $_data['data'];
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 记录留言信息和抽奖内容的方法 */
    function saveSingle() {
        $leaveMessage = new LeaveMessageDAL();
        $_data = [
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'overview' => !empty($_POST['overview']) ? $_POST['overview'] : '',
            'add_time' => date('Y-m-d H:i:s'),
            'source' => $_POST['source'],
            'province' => !empty($_POST['province']) ? $_POST['province'] : '',
            'city' => !empty($_POST['city']) ? $_POST['city'] : '',
            'district' => !empty($_POST['district']) ? $_POST['district'] : '',
            'code' => "0",
            'code_used' => 0,
        ];
        if ($_data['source'] == "givemeachance") {
            $_bonus = $leaveMessage::getBonus($_data);
            if ($_bonus['error'] == 1) {
                self::$data = $_bonus;
                return self::$data;
            } else {
                $_data['code'] = $_bonus['code'];
            }
        }
//print_r($_data);die;
        self::$data['result'] = $leaveMessage::insert($_data);
        self::$data['post'] = $_data;
        return self::$data;
    }

}
