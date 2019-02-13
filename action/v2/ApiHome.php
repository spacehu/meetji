<?php

/**
 * restful api 的基本接口用来调用类库和方法的控制器
 * 
 */

namespace action\v2;

use mod\common as Common;
use TigerDAL\Web\HomeDAL;
use TigerDAL\Api\LeaveMessageDAL;
use TigerDAL\Cms\CategoryDAL;
use TigerDAL\Cms\BrandDAL;
use TigerDAL\Cms\SystemDAL;
use TigerDAL\Cms\CommentDAL;
use TigerDAL\Cms\UserWechatDAL;
use config\code;

class ApiHome extends \action\RestfulApi {

    public $post;
    public $get;
    public $header;

    /**
     * 主方法引入父类的基类
     * 责任是分担路由的工作
     */
    function __construct() {
        $path = parent::__construct();
        $this->post = Common::exchangePost();
        $this->get = Common::exchangeGet();
        $this->header = Common::exchangeHeader();
        if (!empty($path)) {
            $_path = explode("-", $path);
            $actEval = "\$res = \$this ->" . $_path['2'] . "();";
            eval($actEval);
            exit(json_encode($res));
        }
    }

    /** 轮播图片 */
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

    /** 分类列表 */
    function getCategory() {
        try {
            //轮播列表
            $CategoryDAL = new CategoryDAL();
            $res = $CategoryDAL->getAll(1, 10);
            //print_r($res);die;
            self::$data['data']['total'] = $CategoryDAL->getTotal();
            self::$data['data']['list'] = $res;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 品牌列表 */
    function getBrand() {
        try {
            //轮播列表
            $BrandDAL = new BrandDAL();
            $res = $BrandDAL->getAll(1, 10);
            //print_r($res);die;
            self::$data['data']['total'] = $BrandDAL->getTotal();
            self::$data['data']['list'] = $res;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 年龄段列表 */
    function getAgeRange() {
        try {
            //轮播列表
            $res = SystemDAL::getConfig('age_range');
            //print_r($res);die;
            self::$data['data']['list'] = explode(';', $res['value']);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 学科分类列表 */
    function getSubjectCategory() {
        try {
            //轮播列表
            $_subjectCategory = SystemDAL::getConfig("subject_category");
            self::$data['data']['list'] = array_values((array) json_decode($_subjectCategory['value']));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 课程列表 */
    function article() {
        try {
            //var_dump($_GET['age_start']);
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 5;
            $keywords = isset($_GET['keywords']) ? urldecode($_GET['keywords']) : '';
            $region = isset($_GET['region']) ? urldecode($_GET['region']) : '';
            $cat = isset($_GET['cat']) ? urldecode($_GET['cat']) : '';
            $brand = isset($_GET['brand']) ? urldecode($_GET['brand']) : '';
            $age_start = isset($_GET['age_start']) ? ($_GET['age_start'] != '') ? (int) $_GET['age_start'] : '' : '';
            $age_end = isset($_GET['age_end']) ? ($_GET['age_end'] != '') ? (int) $_GET['age_end'] : '' : '';
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
            if (isset($age_start) && is_int($age_start)) {
                $age[0] = $age_start;
                if (isset($age_end) && is_int($age_end)) {
                    $age[1] = $age_end;
                } else {
                    $age[1] = 0;
                }
            }
            //奖项列表
            $HomeDAL = new HomeDAL();
            //Common::pr($age);
            $res = $HomeDAL->GetArticle($currentPage, $pagesize, $keywords, $region, $cat, $brand, $age, $subject_category);
            self::$data['data']['total'] = $HomeDAL->GetArticleTotal($keywords, $region, $cat, $brand, $age, $subject_category);
            self::$data['data']['list'] = $res['data'];
            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 课程详情 */
    function article_detail() {
        try {
            $id = $_GET['id'];
            self::$data['id'] = $id;
            $HomeDAL = new HomeDAL();
            $res = $HomeDAL->GetArticleOne($id);
            $comment = CommentDAL::getByArticleId($id, 1, 10);
            self::$data['data']['info'] = $res['data'];
            self::$data['data']['info']['comment'] = $comment;
            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 记录预定信息和抽奖内容的方法 */
    function saveSingle() {
        $leaveMessage = new LeaveMessageDAL();
        if (empty($this->header['openid'])) {
            self::$data['success'] = false;
            return self::$data;
        }
        if (empty($this->post['phone'])) {
            self::$data['success'] = false;
            return self::$data;
        }
        if (empty($this->post['article_id'])) {
            self::$data['success'] = false;
            return self::$data;
        }
        $_data = [
            'name' => !empty($this->post['name']) ? $this->post['name'] : '',
            'phone' => $this->post['phone'],
            'age' => !empty($this->post['age']) ? $this->post['age'] : '',
            'sex' => !empty($this->post['sex']) ? $this->post['sex'] : '',
            'school' => !empty($this->post['school']) ? $this->post['school'] : '',
            'arrive_time' => !empty($this->post['arrive_time']) ? $this->post['arrive_time'] : '',
            'add_time' => date('Y-m-d H:i:s'),
            'article_id' => $this->post['article_id'],
            'status' => 0,
            'openid' => $this->header['openid'],
        ];
        /* 抽奖规则 */
        if (!empty($this->post['source']) && $this->post['source'] == "givemeachance") {
            $_bonus = $leaveMessage::getBonus($_data);
            if ($_bonus['error'] == 1) {
                self::$data = $_bonus;
                return self::$data;
            } else {
                $_data['code'] = $_bonus['code'];
            }
        }
        self::$data['result'] = $leaveMessage::insert($_data);
        self::$data['post'] = $_data;
        return self::$data;
    }

    /** 记录评论信息 */
    function saveComment() {
        $CommentDAL = new CommentDAL();
        $UserWechatDAL = new UserWechatDAL();
        if (empty($this->post['star'])) {
            self::$data['success'] = false;
            return self::$data;
        }
        if (empty($this->post['comment'])) {
            self::$data['success'] = false;
            return self::$data;
        }
        if (empty($this->post['article_id'])) {
            self::$data['success'] = false;
            return self::$data;
        }
        if (!empty($this->header['openid'])) {
            $_userInfoWechat = $UserWechatDAL->getByOpenid($this->header['openid']);
            $_name = $_userInfoWechat['nickname'];
            $_headimgurl = $_userInfoWechat['headimgurl'];
        } else {
            $_name = '匿名';
            $_headimgurl = '';
        }
        $_data = [
            'article_id' => $this->post['article_id'],
            'openid' => !empty($this->header['openid']) ? $this->header['openid'] : '',
            'name' => $_name,
            'overview' => !empty($this->post['comment']) ? $this->post['comment'] : '',
            'star' => !empty($this->post['star']) ? $this->post['star'] : '',
            'status' => 0,
            'add_time' => date('Y-m-d H:i:s'),
            'headimgurl' => $_headimgurl,
        ];
        self::$data['result'] = $CommentDAL::insert($_data);
        self::$data['post'] = $_data;
        return self::$data;
    }

    /** 获取已预定信息 */
    function getBookedList() {
        $leaveMessage = new LeaveMessageDAL();
        if (empty($this->header['openid'])) {
            self::$data['success'] = false;
            return self::$data;
        }
        $currentPage = isset($this->get['currentPage']) ? $this->get['currentPage'] : 1;
        $pagesize = 10;

        self::$data['data']['list'] = $leaveMessage::getAll($currentPage, $pagesize, $this->header['openid']);
        self::$data['data']['total'] = $leaveMessage::getTotal($this->header['openid']);
        return self::$data;
    }

}
