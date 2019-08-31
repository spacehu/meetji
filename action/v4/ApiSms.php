<?php

namespace action\v4;

use mod\common as Common;
use TigerDAL;
use TigerDAL\Api\TencentSmsDAL;
use TigerDAL\Api\AuthDAL;
use TigerDAL\AccessDAL;
use TigerDAL\Cms\BookDAL;
use config\code;
use TigerDAL\Web\StatisticsDAL;

class ApiSms extends \action\RestfulApi {

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

    /** 异步 */
    function sendSms() {
        $phone = !empty($this->post['phone']) ? $this->post['phone'] : 0;
        try {
            if (empty($phone)) {
                TigerDAL\CatchDAL::markError(code::$code[code::API_ENUM], code::API_ENUM, json_encode('phone empty'));
                self::$data['success'] = false;
                self::$data['data']['code'] = "phone empty";
                self::$data['msg'] = code::$code['phoneerror'];
                return self::$data;
            }
            $this->saveInfo();
            $code = rand(10000, 99999);
            //判斷是否可以發送
            //插入发送记录
            $access = new AccessDAL();
            $data = [
                'phone' => $phone,
                'date' => date("Ymd"),
                'code' => $code,
                'bizid' => '',
                'add_time' => date("Y-m-d H:i:s", time()),
                'success' => false,
                'ip' => $access->getIP(),
            ];
            //Common::pr($data);
            // 每日10次
            //return $sms::checkInsert($phone, $access->getIP());
            if (!TencentSmsDAL::checkInsert($phone, $access->getIP())) {
                self::$data['success'] = false;
                self::$data['data']['code'] = "Daily volume exceeds 10";
                self::$data['msg'] = code::$code['daily10'];
                return self::$data;
            }
            $orderid = TencentSmsDAL::insert($data);
            //发送信息
            $response = (array) json_decode(TencentSmsDAL::sendSms($phone, $code, $orderid));
            //记录成功
            //Common::pr($response);die;
            if ($response['result'] != 0) {
                self::$data['success'] = false;
                self::$data['data']['code'] = "sms api error. reson: ".$response['errmsg'];
                self::$data['msg'] = code::$code['smserror'];
                return self::$data;
            }
            $_data = [
                'bizid' => $response['sid'],
                'success' => 1,
            ];
            self::$data['data'] = TencentSmsDAL::update($orderid, $_data);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::API_ENUM], code::API_ENUM, json_encode($ex));
            self::$data['success'] = false;
            self::$data['data']['code'] = json_encode($ex);
            self::$data['msg'] = code::$code['systemerror'];
        }
        return self::$data;
    }

    /** 注册发信息需要校验是否已经注册 */
    function sendRegistSms() {
        $phone = !empty($this->get['phone']) ? $this->get['phone'] : 0;
        try {
            $AuthDAL = new AuthDAL();
            $user_info = $AuthDAL->checkUser($phone, 0);
            if ($user_info['code'] == 'emptyUser') {
                self::$data = $this->sendSms();
            } else {
                self::$data['success'] = false;
                self::$data['data']['code'] = "Mobile phone is registered";
                self::$data['msg'] = code::$code['hadUser'];
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::API_ENUM], code::API_ENUM, json_encode($ex));
            self::$data['success'] = false;
            self::$data['data']['code'] = json_encode($ex);
            self::$data['msg'] = code::$code['systemerror'];
        }
        return self::$data;
    }

    /** 异步 */
    function getSms() {
        try {
//            $phone = $_GET['phone'];
//            $date = $_GET['date'];
//            $bizid = $_GET['bizid'];
            $phone = "13564138770";
            $date = "20180105";
            $bizid = "226804715121129486^0";
            $response = SmsDAL::querySendDetails($phone, $date, $bizid);
            echo "查询短信发送情况(querySendDetails)接口返回的结果:\n";
            print_r($response);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::API_ENUM], code::API_ENUM, json_encode($ex));
            echo json_encode(['success' => false, 'message' => '999']);
        }
    }

    function saveInfo() {
        $data = [
            'name' => $this->post['name'],
            'phone' => $this->post['phone'],
            'age' => 0,
            'sex' => "",
            'school' => "",
            'arrive_time' => $this->post['time'],
            'add_time' => date("Y-m-d H:i:s"),
            'article_id' => 0,
            'status' => 0,
            'openid' => "",
            'age_range' => "",
            'email' => "",
            'channel_code' => "server.meetji.com",
            'article_type' => "",
            'city' => $this->post['city'],
            'point_id' => 0,
        ];
        //print_r($data);die;
        BookDAL::insert($data);
    }

}
