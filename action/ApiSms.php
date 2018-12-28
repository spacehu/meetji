<?php

namespace action;

use mod\common as Common;
use TigerDAL;
use TigerDAL\Api\SmsDAL;
use TigerDAL\AccessDAL;
use config\code;

class ApiSms {

    private $class;
    public static $data;

    function __construct() {
        $this->class = str_replace('action\\', '', __CLASS__);
    }

    /** 异步 */
    function sendSms() {
        try {
            $phone = $_GET['phone'];
            if (empty($phone)) {
                TigerDAL\CatchDAL::markError(code::$code[code::API_ENUM], code::API_ENUM, json_encode('phone empty'));
                exit("phone empty");
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
            $orderid = $sms::insert($data);
            //发送信息
            $response = (array) SmsDAL::sendSms($phone, $code, $orderid);
            //记录成功
            //Common::pr($response);
            $_data = [
                'bizid' => $response['BizId'],
                'success' => 1,
            ];
            $res = $sms::update($orderid,$_data);
            return $res;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::API_ENUM], code::API_ENUM, json_encode($ex));
            echo json_encode(['success' => false, 'message' => '999']);
        }
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
