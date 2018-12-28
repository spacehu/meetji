<?php

namespace action;

use mod\common as Common;
use TigerDAL\Web\HomeDAL;
use TigerDAL\Web\StatisticsDAL;
use TigerDAL\AccessDAL;
use config\code;
use action\WeChat;
use TigerDAL\Api\LogDAL;

class home {

    private $class;
    public static $data;

    function __construct() {
        $this->class = str_replace('action\\', '', __CLASS__);
        self::$data['keywords'] = "胡彦斌 太歌 太歌文化传媒工作室 太歌文化 说唱 hip-hop 中国风";
        self::$data['class'] = $this->class;
        $this->insertStatistics($_SERVER);
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
            $wc = new WeChat();
            $wc->beforeWeb();
        }
        //Common::pr($_SESSION);
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
            'action' => self::$data['class'],
            'model' => $_GET['m'],
            'page' => $_GET['m'],
            'page_url' => $method['HTTP_HOST'] . $method['REQUEST_URI'],
            'add_time' => date("Y-m-d H:i:s"),
        ];
        $statistics->insert($data);
    }

    /** 首页 */
    function index() {
        self::$data['title'] = "首页";
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

        \mod\init::getTemplate('html', 'web', true);
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

        \mod\init::getTemplate('html', 'web', true);
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
            $res = $HomeDAL->GetWorks($currentPage, $pagesize, $type);
            self::$data['total'] = $HomeDAL->GetWorksTotal($type);
            self::$data['data'] = $res['data'];
            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }

        \mod\init::getTemplate('html', 'web', true);
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

        \mod\init::getTemplate('html', 'web', true);
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

        \mod\init::getTemplate('html', 'web', true);
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

        \mod\init::getTemplate('html', 'web', true);
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

        \mod\init::getTemplate('html', 'web', true);
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

        \mod\init::getTemplate('html', 'web', true);
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

        \mod\init::getTemplate('html', 'web', true);
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

        \mod\init::getTemplate('html', 'web', true);
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

        \mod\init::getTemplate('html', 'web', true);
    }

    /** 单页 */
    function single() {
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $_data = (array) json_decode(base64_decode($_GET['keyword']));
            self::$data['title'] = $_data['title'];
            self::$data['data'] = $_data['data'];
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('single', 'web', true);
    }

}
