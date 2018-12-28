<?php

/**
 * restful api 的基本接口用来调用类库和方法的控制器
 * 
 */

namespace action\v1;

use mod\common as Common;
use TigerDAL\Web\HomeDAL;
use TigerDAL\Web\StatisticsDAL;
use TigerDAL\AccessDAL;
use TigerDAL\Api\LeaveMessageDAL;
use config\code;

class ApiHome extends \action\RestfulApi {

    private $class;

    /**
     * 主方法引入父类的基类
     * 责任是分担路由的工作
     */
    function __construct() {
        $path = parent::__construct();
        $this->class = str_replace('action\\', '', __CLASS__);
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

    /** 首页 */
    function slideShow() {
        self::$data['title'] = "轮播数据";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            //轮播列表
            $HomeDAL = new HomeDAL();
            $res = $HomeDAL->GetSlideShow(1, 20);
            //print_r($res);die;
            self::$data['total'] = $res['total'];
            self::$data['slide_show'] = $res['data'];
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 简介 */
    function awards() {
        //print_r($_SESSION);die;
        self::$data['title'] = "简介";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            //奖项列表
            $HomeDAL = new HomeDAL();
            $res = $HomeDAL->GetAwards();
            self::$data['awards'] = $res['data'];
            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 作品 */
    function works() {
        self::$data['title'] = "作品";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $type = isset($_GET['type']) ? $_GET['type'] : "";
            $_pagesize = 8;
            if ($type == "album" || $type == "film") {
                $_pagesize = 12;
            }
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : $_pagesize;
            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            self::$data['type'] = $type;
            $HomeDAL = new HomeDAL();
            //列表
            $res = $HomeDAL->GetWorksReplace($currentPage, $pagesize, $type);
            self::$data['total'] = $HomeDAL->GetWorksTotal($type);
            self::$data['data'] = $res['data'];
            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 专辑列表 */
    function album() {
        self::$data['title'] = "音乐";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 9;
            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            //奖项列表
            $HomeDAL = new HomeDAL();
            $res = $HomeDAL->GetAlbum($currentPage, $pagesize);
            self::$data['total'] = $HomeDAL->GetAlbumTotal();
            self::$data['album'] = $res['data'];
            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 专辑音乐 */
    function album_music() {
        self::$data['title'] = "音乐";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $id = $_GET['id'];
            self::$data['id'] = $id;
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 4;
            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            //奖项列表
            $HomeDAL = new HomeDAL();
            $res = $HomeDAL->GetMusic($id);
            self::$data['music'] = $res['data'];

            $res = $HomeDAL->GetAlbum($currentPage, $pagesize);
            self::$data['total'] = $HomeDAL->GetAlbumTotal();
            self::$data['album'] = $res['data'];

            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 行程列表 */
    function notice() {
        self::$data['title'] = "行程";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 9;
            $year = isset($_GET['year']) ? $_GET['year'] : date("Y");
            $month = isset($_GET['month']) ? $_GET['month'] : date("m");
            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            self::$data['year'] = $year;
            self::$data['month'] = $month;
            //奖项列表
            $HomeDAL = new HomeDAL();

            self::$data['dateList'] = $HomeDAL->GetNoticeDate($year);

            $res = $HomeDAL->GetNotice($currentPage, $pagesize, $year, $month);
            self::$data['total'] = $HomeDAL->GetNoticeTotal($year, $month);
            self::$data['notice'] = $res['data'];
            self::$data['newId'] = $HomeDAL->GetNewNoticeId();
            //Common::pr(self::$data);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 活动列表 */
    function article() {
        self::$data['title'] = "活动";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 4;
            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            //奖项列表
            $HomeDAL = new HomeDAL();

            $res = $HomeDAL->GetArticle($currentPage, $pagesize);
            self::$data['total'] = $HomeDAL->GetArticleTotal();
            self::$data['article'] = $res['data'];
            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 活动详情 */
    function article_detail() {
        self::$data['title'] = "活动";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
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

    /** 视频列表 */
    function video() {
        self::$data['title'] = "视频";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 6;
            $type = isset($_GET['type']) ? $_GET['type'] : "all";
            self::$data['type'] = $type;
            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;

            $HomeDAL = new HomeDAL();

            if ($type == "all") {
                $_type = "mv','concert','live','joker";
            } else {
                $_type = $type;
            }
            $res = $HomeDAL->GetVideo($currentPage, $pagesize, $_type);
            self::$data['total'] = $HomeDAL->GetVideoTotal($_type);
            self::$data['video'] = $res['data'];
            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 视频播放页 */
    function video_detail() {
        self::$data['title'] = "视频";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $id = $_GET['id'];
            self::$data['id'] = $id;

            $HomeDAL = new HomeDAL();
            $HomeDAL->AddAccess($id, "video");

            $res = $HomeDAL->GetVideoOne($id);
            self::$data['video'] = $res['data'];
            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 照片列表 */
    function photo() {
        self::$data['title'] = "照片";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 4;
            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            //照片列表
            $HomeDAL = new HomeDAL();

            $res = $HomeDAL->GetPhoto($currentPage, $pagesize);
            self::$data['total'] = $HomeDAL->GetPhotoTotal();
            self::$data['photo'] = $res['data'];
            //最新专辑 
            $album = $HomeDAL->GetAlbum(1, 1);
            self::$data['album'] = $album['data'][0];
            //视频列表 * 24
            $video = $HomeDAL->GetVideo(1, 24, "mv");
            self::$data['video'] = $video['data'];

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
