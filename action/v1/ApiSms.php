<?php

namespace action\v1;

use mod\common as Common;
use TigerDAL;
use TigerDAL\Api\SmsDAL;
use TigerDAL\Web\AccountDAL;
use TigerDAL\AccessDAL;
use config\code;
use TigerDAL\Web\StatisticsDAL;

class ApiSms extends \action\RestfulApi {

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

    /** 异步 */
    function sendSms() {
        $phone = !empty($_GET['phone']) ? $_GET['phone'] : 0;
        try {
            if (empty($phone)) {
                TigerDAL\CatchDAL::markError(code::$code[code::API_ENUM], code::API_ENUM, json_encode('phone empty'));
                self::$data['success'] = false;
                self::$data['data'] = "phone empty";
                return self::$data;
            }
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
            $sms = new SmsDAL();
            // 每日10次
            //return $sms::checkInsert($phone, $access->getIP());
            if (!$sms::checkInsert($phone, $access->getIP())) {
                self::$data['success'] = false;
                self::$data['data'] = "Daily volume exceeds 10";
                return self::$data;
            }
            $orderid = $sms::insert($data);
            //发送信息
            $response = (array) SmsDAL::sendSms($phone, $code, $orderid);
            //记录成功
            //Common::pr($response);
            $_data = [
                'bizid' => $response['BizId'],
                'success' => 1,
            ];
            self::$data['data'] = $sms::update($orderid, $_data);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::API_ENUM], code::API_ENUM, json_encode($ex));
            echo json_encode(['success' => false, 'message' => '999']);
        }
        return self::$data;
    }

    /** 注册发信息需要校验是否已经注册 */
    function sendRegistSms() {
        $phone = !empty($_GET['phone']) ? $_GET['phone'] : 0;
        try {
            $AccountDAL = new AccountDAL();
            $user_info = $AccountDAL->checkUser($phone, 0);
            if ($user_info['code'] == 'emptyUser') {
                self::$data = $this->sendSms();
            } else {
                self::$data['success'] = false;
                self::$data['data'] = "Mobile phone is registered";
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::API_ENUM], code::API_ENUM, json_encode($ex));
            echo json_encode(['success' => false, 'message' => '999']);
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

}
