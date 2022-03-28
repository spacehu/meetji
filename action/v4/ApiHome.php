<?php

/**
 * restful api 的基本接口用来调用类库和方法的控制器
 * 
 */

namespace action\v4;

use action\RestfulApi;
use http\Exception;
use mod\common as Common;
use mod\init;
use TigerDAL\Api\LeaveMessageDAL;
use TigerDAL\Api\YimeiDAL;

class ApiHome extends RestfulApi {

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
            $mod=$_path['2'];
            $res = $this->$mod();
            exit(json_encode($res));
        }
    }

    /** 记录预定信息和抽奖内容的方法 */
    function saveSingle() {
        $_error = 0;
        $_status = 0;
        $leaveMessage = new LeaveMessageDAL();

        $_data = [
            'name' => !empty($this->post['name']) ? $this->post['name'] : '',
            'phone' => $this->post['phone'],
            'age' => !empty($this->post['age']) ? $this->post['age'] : 0,
            'sex' => !empty($this->post['sex']) ? $this->post['sex'] : '',
            'school' => !empty($this->post['school']) ? $this->post['school'] : '',
            'arrive_time' => !empty($this->post['arrive_time']) ? $this->post['arrive_time'] : '',
            'add_time' => date('Y-m-d H:i:s'),
            'article_id' => !empty($this->post['article_id']) ? $this->post['article_id'] : 0,
            'status' => $_status,
            'openid' => !empty($this->header['openid']) ? $this->header['openid'] : '',
            'age_range' => !empty($this->post['age_range']) ? $this->post['age_range'] : '',
            'email' => !empty($this->post['email']) ? $this->post['email'] : '',
            'channel_code' => !empty($this->header['channel']) ? $this->header['channel'] : '',
            'article_type' => !empty($this->post['article_type']) ? $this->post['article_type'] : '',
            'city' => !empty($this->post['city']) ? $this->post['city'] : '',
            'point_id' => !empty($_pointId) ? $_pointId : 0,
            'note'=>!empty($this->post['note'])?$this->post['note']:'',
            'company'=>!empty($this->post['company'])?$this->post['company']:'',
            'position'=>!empty($this->post['position'])?$this->post['position']:'',
            'years'=>!empty($this->post['years'])?$this->post['years']:'',
            'highest_education'=>!empty($this->post['highest_education'])?$this->post['highest_education']:'',
        ];
        self::$data['result']['id'] = $leaveMessage::insert($_data);

        
        self::$data['post'] = $_data;
        if (!empty($this->header['channel'])) {
            // 根据code进行提交操作 code=yimei的有独立dal
            if($this->header['channel']=="yimei"){
                return YimeiDAL::sendToSalesForce(self::$data['result']['id'],$this->header['channel'],$_data);
            }
        }
        return self::$data;
    }


}
