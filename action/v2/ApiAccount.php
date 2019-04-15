<?php

namespace action\v2;

use mod\common as Common;
use TigerDAL\Web\AccountDAL;
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

    /** 注册 */
    function regist() {
        try {
            $phoneFix = Common::specifyChar($this->post['phone_fix']);
            $phone = Common::specifyChar($this->post['phone']);
            $code = Common::specifyChar($this->post['code']);
            $password = Common::specifyChar($this->post['password']);
            $cfn_password = Common::specifyChar($this->post['cfn_password']);
            if (strlen($password) < 6) {
                exit(json_encode("errorPasswordLength"));
            }
            if ($password != $cfn_password) {
                exit(json_encode("errorPasswordDifferent"));
            }
            $AccountDAL = new AccountDAL();
            $check = $AccountDAL->checkPhone($phone, $code);
            if ($check !== true) {
                exit(json_encode($check));
            }
            $data = [
                'name' => $phone,
                'password' => md5($password),
                'add_by' => 1,
                'add_time' => date("Y-m-d H:i:s", time()),
                'edit_by' => 1,
                'edit_time' => date("Y-m-d H:i:s", time()),
                'role_id' => 0,
                'delete' => 0,
            ];
            $res = $AccountDAL->insert($data);
            if (!empty($res)) {
                $_dataUserInfo = [
                    'name' => $phone,
                    'phone' => $phone,
                    'nickname' => "",
                    'photo' => "",
                    'brithday' => "",
                    'province' => "",
                    'city' => "",
                    'district' => "",
                    'email' => "",
                    'sex' => "",
                    'add_time' => date("Y-m-d H:i:s", time()),
                    'edit_time' => date("Y-m-d H:i:s", time()),
                    'user_id' => $res,
                ];
                $AccountDAL->insertUserInfo($_dataUserInfo);
                //奖励积分
                $_data = [
                    'user_id' => $res,
                    'point' => 15,
                    'type' => 'regist',
                    'add_time' => date('Y-m-d H:i:s', time()),
                ];
                $PointDAL = new PointDAL();
                $PointDAL->insert($_data);

                exit(json_encode($res));
            } else {
                exit(json_encode("errorSql"));
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
    }

    /** 登录 */
    function login() {
        self::$data['title'] = "登录";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $phone = Common::specifyChar($_POST['phone']);
            $password = Common::specifyChar($_POST['password']);

            $AccountDAL = new AccountDAL();
            $check = $AccountDAL->checkUser($phone, $password);
            if ($check['error'] == 1) {
                self::$res['success'] = false;
                self::$res['code'] = $check['code'];
            } else {
                self::$res['success'] = true;
                self::$res['code'] = $check['code'];
                //print_r($check);die;
                if (empty($check['code'])) {
                    Common::writeSession($check['data']['nickname'], "nickname");
                    Common::writeSession($check['data']['id'], "user_info_id");
                    Common::writeSession($check['data']['phone'], "phone");
                    Common::writeSession($check['data']['user_id'], "user_id");
                    Common::writeSession($check['data']['photo'], "photo");
                } else {
                    Common::writeSession($check['data']['name'], "phone");
                    Common::writeSession($check['data']['id'], "user_id");
                }
                //self::$res['data'] = $check['data'];
                $_data = [
                    'user_id' => Common::getSession("user_id"),
                    'point' => 5,
                    'type' => 'login',
                    'add_time' => date('Y-m-d H:i:s', time()),
                ];
                $PointDAL = new PointDAL();
                $PointDAL->insertDaily($_data);
            }
            exit(json_encode(self::$res));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
    }

    /** 登出 */
    function logout() {
        self::$data['title'] = "登出";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            Common::destorySession();
            Common::js_redir("./");
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
    }

}
