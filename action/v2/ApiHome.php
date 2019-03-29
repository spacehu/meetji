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
use TigerDAL\Cms\UserInfoDAL;
use TigerDAL\Web\PointDAL;
use config\code;

class ApiHome extends \action\RestfulApi {

    public $post;
    public $get;

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

    /** 获取已预定信息 */
    function getBookedList() {
        $leaveMessage = new LeaveMessageDAL();
        if (empty($this->header['openid'])) {
            self::$data['success'] = false;
            return self::$data;
        }
        $currentPage = isset($this->get['currentPage']) ? $this->get['currentPage'] : 1;
        $pagesize = isset($this->get['pagesize']) ? $this->get['pagesize'] : 10;

        self::$data['data']['list'] = $leaveMessage::getAll($currentPage, $pagesize, $this->header['openid']);
        self::$data['data']['total'] = $leaveMessage::getTotal($this->header['openid']);
        return self::$data;
    }

    /** 获取积分列表 */
    function getPoints() {
        $PointDAL = new PointDAL();
        $UserWechatDAL = new UserWechatDAL();
        if (empty($this->header['openid'])) {
            self::$data['success'] = false;
            return self::$data;
        }
        $currentPage = isset($this->get['currentPage']) ? $this->get['currentPage'] : 1;
        $pagesize = isset($this->get['pagesize']) ? $this->get['pagesize'] : 10;

        $_user = $UserWechatDAL->getByOpenid($this->header['openid']);
        self::$data['data']['list'] = $PointDAL->getAll($currentPage, $pagesize, $_user['id']);
        self::$data['data']['total'] = $PointDAL->getTotal($_user['id']);
        return self::$data;
    }

    /** 获取助力信息 */
    function getHelp() {
        $leaveMessage = new LeaveMessageDAL();
        $HomeDAL = new HomeDAL();
        self::$data['data']['lm'] = $leaveMessage->getHelp($this->get['lm_id']);
        self::$data['data']['article'] = $HomeDAL->GetArticleOne(self::$data['data']['lm']['article_id']);
        return self::$data;
    }

    /** 记录预定信息和抽奖内容的方法 */
    function saveSingle() {
        $_error = 0;
        $_status = 0;
        $_pointId = 0;
        $leaveMessage = new LeaveMessageDAL();
        $PointDAL = new PointDAL();
        $UserWechatDAL = new UserWechatDAL();
        $HomeDAL = new HomeDAL();
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
        $_has = $leaveMessage->getOneByPhone($this->post['phone'], $this->post['article_id']);
        if (!empty($_has)) {
            self::$data['success'] = false;
            self::$data['result'] = "一天不能两次";
            return self::$data;
        }
        // 获取积分总数
        $_user = $UserWechatDAL->getByOpenid($this->header['openid']);
        $_point = $PointDAL->getUserPoint($_user['id']);
        // 获取活动价格
        $_article = $HomeDAL->GetArticleOne($this->post['article_id']);
        // 判断是否买得起
        if ($_point < $_article['data']['current_price']) {
            self::$data['success'] = false;
            self::$data['result']['msg'] = "积分不足，分享获得更多积分！";
            //return self::$data;
            $_status = 4; //积分没扣
        } else {
            // 消费积分
            $_dataP = [
                'user_id' => $_user['id'],
                'point' => -ceil($_article['data']['current_price']),
                'type' => 'shopping',
                'add_time' => date('Y-m-d H:i:s', time()),
            ];
            $_pointId = $PointDAL->insertZero($_dataP);
        }
        $_data = [
            'name' => !empty($this->post['name']) ? $this->post['name'] : '',
            'phone' => $this->post['phone'],
            'age' => !empty($this->post['age']) ? $this->post['age'] : 0,
            'sex' => !empty($this->post['sex']) ? $this->post['sex'] : '',
            'school' => !empty($this->post['school']) ? $this->post['school'] : '',
            'arrive_time' => !empty($this->post['arrive_time']) ? $this->post['arrive_time'] : '',
            'add_time' => date('Y-m-d H:i:s'),
            'article_id' => $this->post['article_id'],
            'status' => $_status,
            'openid' => !empty($this->header['openid']) ? $this->header['openid'] : '',
            'age_range' => !empty($this->post['age_range']) ? $this->post['age_range'] : '',
            'email' => !empty($this->post['email']) ? $this->post['email'] : '',
            'channel_code' => !empty($this->header['channel_code']) ? $this->header['channel_code'] : '',
            'article_type' => !empty($this->post['article_type']) ? $this->post['article_type'] : '',
            'city' => !empty($this->post['city']) ? $this->post['city'] : '',
            'point_id' => !empty($_pointId) ? $_pointId : 0,
        ];
        self::$data['result']['id'] = $leaveMessage::insert($_data);

        /* 助力活动 */
        if (!empty($this->post['article_type']) && $this->post['article_type'] == "help") {
            $_dataS = [
                'lm_id' => self::$data['result']['id'],
                'openid' => !empty($this->header['openid']) ? $this->header['openid'] : '',
                'add_time' => date('Y-m-d H:i:s'),
                'help_openid1' => '',
                'help_openid2' => '',
            ];
            self::$data['result']['help'] = $leaveMessage::insertHelp($_dataS);
        }
        self::$data['post'] = $_data;

        self::$data['result']['point'] = $PointDAL->getUserPoint($_user['id']);
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

    /** 记录用户信息 *//* 用户名，手机号，生日，性别，邮箱 */
    function saveUserInfo() {
        $UserInfoDAL = new UserInfoDAL();
        $UserWechatDAL = new UserWechatDAL();
        $PointDAL = new PointDAL();
        if (empty($this->header['openid'])) {
            self::$data['success'] = false;
            return self::$data;
        }
        $_userWCdata = $UserWechatDAL->getByOpenid($this->header['openid']);
        $_user = $UserInfoDAL->getByUserIdOne($_userWCdata['id']);
        //Common::pr($_user);
        if (!empty($_user)) {
            if (!empty($this->post['name'])) {
                $_data['name'] = $this->post['name'];
            }
            if (!empty($this->post['phone'])) {
                $_data['phone'] = $this->post['phone'];
                // 后续设置 之前没写过电话的 补给ta积分
                if (empty($_user['phone'])) {
                    //奖励积分
                    $_dataP = [
                        'user_id' => $_userWCdata['id'],
                        'point' => \mod\init::$config['pointInfo']['firstPhone'],
                        'type' => 'savePhone',
                        'add_time' => date('Y-m-d H:i:s', time()),
                    ];
                    $PointDAL->insertTotal($_dataP);
                }
            }
            if (!empty($this->post['brithday'])) {
                $_data['brithday'] = $this->post['brithday'];
            }
            if (!empty($this->post['sex'])) {
                $_data['sex'] = $this->post['sex'];
            }
            if (!empty($this->post['email'])) {
                $_data['email'] = $this->post['email'];
            }
            $res = $UserInfoDAL->updateByUserId($_userWCdata['id'], $_data);
        } else {
            $_data = [
                'name' => !empty($this->post['name']) ? $this->post['name'] : '',
                'phone' => !empty($this->post['phone']) ? $this->post['phone'] : '',
                'nickname' => !empty($this->post['nickname']) ? $this->post['nickname'] : '',
                'photo' => !empty($this->post['photo']) ? $this->post['photo'] : '',
                'brithday' => !empty($this->post['brithday']) ? $this->post['brithday'] : '',
                'province' => !empty($this->post['province']) ? $this->post['province'] : '',
                'city' => !empty($this->post['city']) ? $this->post['city'] : '',
                'district' => !empty($this->post['district']) ? $this->post['district'] : '',
                'email' => !empty($this->post['email']) ? $this->post['email'] : '',
                'sex' => !empty($this->post['sex']) ? $this->post['sex'] : '',
                'add_time' => date('Y-m-d H:i:s'),
                'edit_time' => date('Y-m-d H:i:s'),
                'user_id' => $_userWCdata['id'],
            ];
            $res = $UserInfoDAL->insert($_data);
            // 初次设置
            if (!empty($this->post['phone'])) {
                //奖励积分
                $_dataP = [
                    'user_id' => $_userWCdata['id'],
                    'point' => \mod\init::$config['pointInfo']['firstPhone'],
                    'type' => 'savePhone',
                    'add_time' => date('Y-m-d H:i:s', time()),
                ];
                $PointDAL = new PointDAL();
                $PointDAL->insertTotal($_dataP);
            }
        }
        self::$data['result']['data'] = $res;
        self::$data['result']['point'] = $PointDAL->getUserPoint($_userWCdata['id']);
        return self::$data;
    }

    /** 助力 */
    function saveHelp() {
        $leaveMessage = new LeaveMessageDAL();
        $lm_id = $this->post['lm_id'];
        if (!empty($this->header['openid'])) {
            $openid = $this->header['openid'];
        } else {
            $openid = 1;
        }
        $_row = $leaveMessage->getHelp($lm_id);
        if (empty($_row['help']['help_openid1']) && $_row['help']['openid'] != $openid) {
            $_data = [
                'help_openid1' => $openid,
            ];
        } else if (empty($_row['help']['help_openid2']) && $_row['help']['help_openid1'] != $openid && $_row['help']['openid'] != $openid) {
            $_data = [
                'help_openid2' => $openid,
            ];
        } else {
            // for test 
            if (!empty($this->post['help']) && $this->post['help'] == "self") {
                if (empty($_row['help']['help_openid1'])) {
                    $_data = [
                        'help_openid1' => $openid,
                    ];
                } else {
                    $_data = [
                        'help_openid2' => $openid,
                    ];
                }
            } else {
                return self::$data;
            }
        }
        self::$data['result'] = $leaveMessage->updateHelp($lm_id, $_data);
        return self::$data;
    }

    /** 分享得积分 */
    function savePoint() {
        $UserWechatDAL = new UserWechatDAL();
        if (empty($this->header['openid'])) {
            self::$data['success'] = false;
            return self::$data;
        }
        $_userWCdata = $UserWechatDAL->getByOpenid($this->header['openid']);
        //奖励积分
        $_dataP = [
            'user_id' => $_userWCdata['id'],
            'point' => \mod\init::$config['pointInfo']['share'],
            'type' => 'share',
            'add_time' => date('Y-m-d H:i:s', time()),
        ];
        $PointDAL = new PointDAL();
        $PointDAL->insertDaily($_dataP);
        self::$data['result']['point'] = $PointDAL->getUserPoint($_userWCdata['id']);
        return self::$data;
    }

}
