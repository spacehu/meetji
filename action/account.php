<?php

namespace action;

use mod\common as Common;
use TigerDAL\Web\AccountDAL;
use TigerDAL\Web\StatisticsDAL;
use TigerDAL\Api\EnumDAL;
use TigerDAL\Web\PointDAL;
use TigerDAL\AccessDAL;
use config\code;

include_once './mod/calendar.php';

class account {

    private $class;
    public static $data;
    public static $res = ['success' => true, 'code' => '', 'data' => ''];

    function __construct() {
        $this->class = str_replace('action\\', '', __CLASS__);
        self::$data['keywords'] = "胡彦斌";
        self::$data['class'] = $this->class;
        $this->insertStatistics($_SERVER);
        //Common::pr($_SERVER);
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

    /** 注册 */
    function regist() {
        self::$data['title'] = "注册";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $phoneFix = Common::specifyChar($_POST['phone_fix']);
            $phone = Common::specifyChar($_POST['phone']);
            $code = Common::specifyChar($_POST['code']);
            $password = Common::specifyChar($_POST['password']);
            $cfn_password = Common::specifyChar($_POST['cfn_password']);
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

    /** 用户中心 */
    function center() {
        Common::isset_cookie_account();
        self::$data['title'] = "用户中心";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $AccountDAL = new AccountDAL();
            $res = $AccountDAL->getUserInfo(Common::getSession("user_id"));
            $EnumDAL = new EnumDAL();
            $region = $EnumDAL::GetRegionWithOutCountry();
            if (!empty($res['province'])) {
                $region_city = $EnumDAL::GetRegionWithOutCountry($res['province']);
                self::$data['region_city'] = $region_city['data'];
            }
            $year = date('Y');
            $month = date('n');
            $url = $_SERVER['PHP_SELF'];
            $calendar = calendar($year, $month, $url);
            //print_r($res);die;
            self::$data['data'] = $res;
            self::$data['region'] = $region['data'];
            self::$data['calendar'] = $calendar;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }

        \mod\init::getTemplate('html', 'web', true);
    }

    /** 保存用户信息 */
    function save_user_info() {
        self::$data['title'] = "保存用户信息";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $nickname = Common::specifyChar(!empty($_POST['nickname']) ? $_POST['nickname'] : "");
            $sex = Common::specifyChar($_POST['sex']);
            $brithday = Common::specifyChar($_POST['brithday']);
            $province = Common::specifyChar($_POST['province']);
            $city = Common::specifyChar($_POST['city']);
            $district = Common::specifyChar(!empty($_POST['district']) ? $_POST['district'] : "");
            $email = Common::specifyChar($_POST['email']);

            $AccountDAL = new AccountDAL();
            $check = $AccountDAL->getUserInfo(Common::getSession("user_id"));
            if (!empty($check)) {
                $_data = [
                    'nickname' => $nickname,
                    'brithday' => $brithday,
                    'province' => $province,
                    'city' => $city,
                    'district' => $district,
                    'email' => $email,
                    'sex' => $sex,
                    'edit_time' => date("Y-m-d H:i:s", time()),
                ];
                $res = $AccountDAL->updateUserInfo(Common::getSession("user_id"), $_data);
                self::$res['data'] = $res;
            } else {
                $_data = [
                    'name' => Common::getSession("phone"),
                    'phone' => Common::getSession("phone"),
                    'nickname' => $nickname,
                    'photo' => "",
                    'brithday' => $brithday,
                    'province' => $province,
                    'city' => $city,
                    'district' => $district,
                    'email' => $email,
                    'sex' => $sex,
                    'add_time' => date("Y-m-d H:i:s", time()),
                    'edit_time' => date("Y-m-d H:i:s", time()),
                    'user_id' => Common::getSession("user_id"),
                ];
                $res = $AccountDAL->insertUserInfo($_data);
                self::$res['data'] = $res;
                Common::writeSession($check['data']['nickname'], "nickname");
            }
            exit(json_encode(self::$res));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
    }

    /** 上传用户头像 */
    function upload_photo() {
        self::$data['title'] = "上传用户头像";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $photo = $_FILES['photo'];
            $path = \mod\init::$config['env']['user_path'] . '/' . md5(Common::getSession("user_id"));
            $name = date("YmdHis") . ".jpg";
            if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $path)) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . $path, 0777);
            }
            move_uploaded_file($photo['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $path . '/' . $name);

            self::$res['data'] = $path . '/' . $name;

            exit(json_encode(self::$res));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
    }

    /** 保存用户头像 */
    function save_photo() {
        self::$data['title'] = "保存用户头像";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $photo = Common::specifyChar($_POST['photo']);
            $md5Uid = md5(Common::getSession("user_id"));
            $photoT = preg_replace("/" . $md5Uid . "\/(.*).jpg/", $md5Uid . "/photoT.jpg", $photo);
            //var_dump($photoT);die;
            rename($_SERVER['DOCUMENT_ROOT'] . $photo, $_SERVER['DOCUMENT_ROOT'] . $photoT);

            $path = $_SERVER['DOCUMENT_ROOT'] . "/data/user_doc/" . $md5Uid;
            foreach (scandir($path) as $filename) {
                if ($filename == '.' || $filename == '..') {
                    continue;
                }
                if ($_SERVER['DOCUMENT_ROOT'] . $photoT != $path . '/' . $filename) {
                    unlink($path . '/' . $filename);
                }
            }
            $AccountDAL = new AccountDAL();
            $check = $AccountDAL->getUserInfo(Common::getSession("user_id"));
            if (!empty($check)) {
                $_data = [
                    'photo' => $photoT,
                    'edit_time' => date("Y-m-d H:i:s", time()),
                ];
                $res = $AccountDAL->updateUserInfo(Common::getSession("user_id"), $_data);
            } else {
                $_data = [
                    'name' => Common::getSession("phone"),
                    'phone' => Common::getSession("phone"),
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
                    'user_id' => Common::getSession("user_id"),
                ];
                $res = $AccountDAL->insertUserInfo($_data);
                Common::writeSession($check['data']['nickname'], "nickname");
            }
            self::$res['data'] = $res;
            Common::writeSession($photoT, "photo");
            exit(json_encode(self::$res));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
    }

    /** 用户中心-积分 */
    function point() {
        Common::isset_cookie_account();
        self::$data['title'] = "用户中心-积分";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $PointDAL = new PointDAL();
            $res = $PointDAL->getUserPoint(Common::getSession("user_id"));
            self::$data['data'] = !empty($res['sum']) ? $res['sum'] : 0;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }

        \mod\init::getTemplate('html', 'web', true);
    }

}
