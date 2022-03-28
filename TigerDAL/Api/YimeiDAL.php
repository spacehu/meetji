<?php

namespace TigerDAL\Api;

use TigerDAL\BaseDAL;
use TigerDAL\HttpRequestDAL;
use mod\init;

const URL="/services/data/v47.0/sobjects/Lead"; 
const PROJECT="DBA";

class YimeiDAL {

    // 获取user_id
    public static function getUserId($code){
        $base = new BaseDAL();
        // todo get uid by code 
        $sql="select * from `".$base->table_name("channel")."` where `code`= '".$code."' and `delete`=0;";
        $channel=$base->getFetchRow($sql);
        if(empty($channel)||empty($channel['add_by'])){
            return false;
        }
        return $channel['add_by'];
    }

    // 获取数据库中的token
    public static function token($code){
        $base = new BaseDAL();
        $uid=self::getUserId($code);
        if(!$uid){
            return false;
        }
        // get token by uid 
        $sql="select * from `".$base->table_name("enterprise")."` where `user_id`= '".$uid."' ;";
        $enterprise=$base->getFetchRow($sql);
        if(empty($enterprise)){
            return false;
        }
        return [
            'id'=>$enterprise['id'],
            'username'=>$enterprise['username'],
            'usercode'=>$enterprise['usercode'],
            'appid'=>$enterprise['appid'],
            'secret'=>$enterprise['secret'],
            'api_res_config'=>$enterprise['api_res_config'],
        ];
    }
    
    // 刷新数据库中的token
    public static function reflashToken($enterprise_id,$username,$usercode,$appid,$secret){
        $url=init::$config['env']['lib']['yimei']['url']
        ."?grant_type=password&client_id=".urlencode($appid)
        ."&client_secret=".urlencode($secret)
        ."&username=".urlencode($username)
        ."&password=".urlencode($usercode);
        $res=HttpRequestDAL::post($url);
        $_data=[
            "api_res_config"=>$res,
        ];
        return self::saveEnterprise($enterprise_id,$_data);
    }

    // 保存新的数据信息
    public static function saveEnterprise($enterprise_id,$_data){
        $base=new BaseDAL();
        if($base->update($enterprise_id,$_data,"enterprise")){
            return $_data;
        }
        return false;
    }

    // 提交数据
    public static function doPost($config,$data){
        $url=$config['instance_url']."/services/data/v47.0/composite/";
        $header=[
            "Authorization:".$config['token_type']." ".$config['access_token'],
            "Content-Type:application/json",
        ];
        return HttpRequestDAL::post($url,json_encode($data),$header);
    }
    // 根据code进行提交操作，提交的方向从 获取token的返回值来进行 执行两次 第二次失败后返回错误信息。
    public static function sendToSalesForce($reference_id,$code,$_data){
        // 数据转译
        $data=[
            "allOrNone"=>true,
            "compositeRequest"=>[
                0=>[
                    "method"=>"POST",
                    "body"=>[
                        "LastName"=>$_data['name'],
                        "Years__c"=>$_data['years'],
                        "Position__c"=>$_data['position'],
                        "Company__c"=>$_data['company'],
                        "College__c"=>$_data['school'],
                        "Mobile__c"=>$_data['phone'],
                        "Age__c"=>$_data['age'],
                        "HighestEducation__c"=>$_data['highest_education'],
                        "Email"=>$_data['email'],
                        "Project__c"=>PROJECT,
                        "Postscript__c"=>$_data['note'],
                    ],
                    "referenceId"=>"$reference_id",
                    "url"=>URL,
                ],
            ],
        ];
        // 校验获取token
        $access_info=self::token($code);
        if(!$access_info){
            return false;
        }
        if(empty($access_info['api_res_config'])){
            // 拉取token数据
            $res_info=self::reflashToken($access_info['id'],$access_info['username'],$access_info['usercode'],$access_info['appid'],$access_info['secret']);
            $api_res_confg=json_decode($res_info['api_res_config'],true);
        }else{
            $api_res_confg=json_decode($access_info['api_res_config'],true);
        }
        // 第一次提交
        $res=self::doPost($api_res_confg,$data);
        // 刷新token
        $resData=json_decode($res,true);
        if(!empty($resData['errorCode'])&&$resData['errorCode']=="INVALID_SESSION_ID"){
            $res_info=self::reflashToken($access_info['id'],$access_info['username'],$access_info['usercode'],$access_info['appid'],$access_info['secret']);
            $api_res_confg=json_decode($res_info['api_res_config'],true);
            // 第二次提交
            $res=self::doPost($api_res_confg,$data);
            $resData=json_decode($res,true);
        }
        return $resData;
    }
}
