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
use config\code;

class ApiHome extends \action\RestfulApi {

    public $post;

    /**
     * 主方法引入父类的基类
     * 责任是分担路由的工作
     */
    function __construct() {
        $path = parent::__construct();
        $this->post = Common::exchangePost();
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
            self::$data['data']['total'] = $res['total'];
            self::$data['data']['list'] = $res['data'];
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
            self::$data['data']['total'] = $res['total'];
            self::$data['data']['list'] = $res['data'];
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 课程列表 */
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
            self::$data['data']['info'] = $res['data'];
            //Common::pr($res);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 记录留言信息和抽奖内容的方法 */
    function saveSingle() {
        $leaveMessage = new LeaveMessageDAL();
        if (empty($this->post['phone'])) {
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

}
