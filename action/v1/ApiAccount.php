<?php

namespace action\v1;

use mod\common as Common;
use TigerDAL\Web\AccountDAL;
use TigerDAL\Web\StatisticsDAL;
use TigerDAL\Api\EnumDAL;
use TigerDAL\Web\PointDAL;
use TigerDAL\AccessDAL;
use config\code;
use TigerDAL\Api\TokenDAL;

include_once './mod/calendar.php';

class ApiAccount extends \action\RestfulApi {

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

    /** 注册 */
    function regist() {
        self::$data['title'] = "注册";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $phone = Common::specifyChar($_POST['phone']);
            $code = Common::specifyChar($_POST['code']);
            $password = Common::specifyChar($_POST['password']);
            $cfn_password = Common::specifyChar($_POST['cfn_password']);
            if (strlen($password) < 6) {
                self::$data['success'] = false;
                self::$data['data'] = "errorPasswordLength";
                return self::$data;
            }
            if ($password != $cfn_password) {
                self::$data['success'] = false;
                self::$data['data'] = "errorPasswordDifferent";
                return self::$data;
            }
            $AccountDAL = new AccountDAL();
            $check = $AccountDAL->checkPhone($phone, $code);
            if ($check !== true) {
                self::$data['success'] = false;
                self::$data['data'] = $check;
                return self::$data;
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

                self::$data['data'] = $res;
            } else {
                self::$data['success'] = false;
                self::$data['data'] = "errorSql";
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 登录 */
    function login() {
        self::$data['title'] = "登录";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $phone = Common::specifyChar($_POST['phone']);
            $password = Common::specifyChar($_POST['password']);

            $AccountDAL = new AccountDAL();
            $TokenDAL = new TokenDAL();
            $check = $AccountDAL->checkUser($phone, $password);
            if ($check['error'] == 1) {
                self::$data['success'] = false;
                self::$data['code'] = $check['code'];
            } else {
                self::$data['success'] = true;
                self::$data['code'] = $check['code'];
                //print_r($check);die;
                if (empty($check['code'])) {
                    $_user_id = $check['data']['user_id'];
                } else {
                    $_user_id = $check['data']['id'];
                }
                self::$data['token'] = $TokenDAL->saveToken($_user_id);
                //self::$res['data'] = $check['data'];
                $_data = [
                    'user_id' => $_user_id,
                    'point' => 5,
                    'type' => 'login',
                    'add_time' => date('Y-m-d H:i:s', time()),
                ];
                $PointDAL = new PointDAL();
                $PointDAL->insertDaily($_data);
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 登出 */
    function logout() {
        self::$data['title'] = "登出";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $TokenDAL = new TokenDAL();
            $TokenDAL->delToken();
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 用户中心 */
    function center() {
        self::$data['title'] = "用户中心";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $TokenDAL = new TokenDAL();
            $_token = $TokenDAL->checkToken();
            if ($_token['code'] != 90001) {
                self::$data['success'] = false;
                self::$data['data'] = 'token error';
                self::$data['code'] = $_token['code'];
                //self::$data['token'] = $_token['token'];
                return self::$data;
            }
            $AccountDAL = new AccountDAL();
            $res = $AccountDAL->getUserInfo($_token['data']['user_id']);
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
        return self::$data;
    }

    /** 保存用户信息 */
    function save_user_info() {
        self::$data['title'] = "保存用户信息";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $TokenDAL = new TokenDAL();
            $_token = $TokenDAL->checkToken();
            if ($_token['code'] != 90001) {
                self::$data['success'] = false;
                self::$data['data'] = 'token error';
                self::$data['code'] = $_token['code'];
                return self::$data;
            }
            $nickname = Common::specifyChar(!empty($_POST['nickname']) ? $_POST['nickname'] : "");
            $sex = Common::specifyChar($_POST['sex']);
            $brithday = Common::specifyChar($_POST['brithday']);
            $province = Common::specifyChar($_POST['province']);
            $city = Common::specifyChar($_POST['city']);
            $district = Common::specifyChar(!empty($_POST['district']) ? $_POST['district'] : "");
            $email = Common::specifyChar($_POST['email']);

            $AccountDAL = new AccountDAL();
            $check = $AccountDAL->getUserInfo($_token['data']['user_id']);
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
                $res = $AccountDAL->updateUserInfo($_token['data']['user_id'], $_data);
                self::$data['data'] = $res;
            } else {
                $_data = [
                    'name' => $check["phone"],
                    'phone' => $check["phone"],
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
                    'user_id' => $_token['data']['user_id'],
                ];
                $res = $AccountDAL->insertUserInfo($_data);
                self::$data['data'] = $res;
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 上传用户头像 */
    function upload_photo() {
        self::$data['title'] = "上传用户头像";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $TokenDAL = new TokenDAL();
            $_token = $TokenDAL->checkToken();
            if ($_token['code'] != 90001) {
                self::$data['success'] = false;
                self::$data['data'] = 'token error';
                self::$data['code'] = $_token['code'];
                return self::$data;
            }
            $photo = $_FILES['photo'];
            $path = \mod\init::$config['env']['user_path'] . '/' . md5($_token['data']['user_id']);
            $name = date("YmdHis") . ".jpg";
            if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $path)) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . $path, 0777);
            }
            move_uploaded_file($photo['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $path . '/' . $name);

            self::$data['data'] = $path . '/' . $name;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 保存用户头像 */
    function save_photo() {
        self::$data['title'] = "保存用户头像";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $TokenDAL = new TokenDAL();
            $_token = $TokenDAL->checkToken();
            if ($_token['code'] != 90001) {
                self::$data['success'] = false;
                self::$data['data'] = 'token error';
                self::$data['code'] = $_token['code'];
                return self::$data;
            }
            $photo = Common::specifyChar($_POST['photo']);
            $md5Uid = md5($_token['data']['user_id']);
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
            $check = $AccountDAL->getUserInfo($_token['data']['user_id']);
            if (!empty($check)) {
                $_data = [
                    'photo' => $photoT,
                    'edit_time' => date("Y-m-d H:i:s", time()),
                ];
                $res = $AccountDAL->updateUserInfo($_token['data']['user_id'], $_data);
            } else {
                $_data = [
                    'name' => $check["phone"],
                    'phone' => $check["phone"],
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
                    'user_id' => $_token['data']['user_id'],
                ];
                $res = $AccountDAL->insertUserInfo($_data);
            }
            self::$data['data'] = $res;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 上传用户头像api */
    function uploadPhoto() {
        self::$data['title'] = "上传用户头像";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $TokenDAL = new TokenDAL();
            $_token = $TokenDAL->checkToken();
            if ($_token['code'] != 90001) {
                self::$data['success'] = false;
                self::$data['data'] = 'token error';
                self::$data['code'] = $_token['code'];
                return self::$data;
            }
            $photo = $_POST['photo'];
            $base_img = str_replace('data:image/jpeg;base64,', '', $photo);
            $name = date("YmdHis") . rand(0, 999) . ".jpeg";
            $path = \mod\init::$config['env']['user_path'] . '/' . md5($_token['data']['user_id']);
            if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $path)) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . $path, 0777);
            }
            $path = $path . '/' . $name;
            self::$data['path'] = $path;
//            $ifp = fopen($_SERVER['DOCUMENT_ROOT'] . $path, "wb");
//            fwrite($ifp, base64_decode($base_img));
//            fclose($ifp);
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . $path, base64_decode($base_img));
            //return $base_img;

            $AccountDAL = new AccountDAL();
            $check = $AccountDAL->getUserInfo($_token['data']['user_id']);
            if (!empty($check)) {
                $os = unlink($_SERVER['DOCUMENT_ROOT'] . $check['photo']);
                self::$data['debug']['data'] = $check['photo'];
                self::$data['debug']['error'] = $os;
                $_data = [
                    'photo' => $path,
                    'edit_time' => date("Y-m-d H:i:s", time()),
                ];
                $res = $AccountDAL->updateUserInfo($_token['data']['user_id'], $_data);
            } else {
                $_user = $AccountDAL->getUser($_token['data']['user_id']);
                $_data = [
                    'name' => $_user["phone"],
                    'phone' => $_user["phone"],
                    'nickname' => "",
                    'photo' => $path,
                    'brithday' => "",
                    'province' => "",
                    'city' => "",
                    'district' => "",
                    'email' => "",
                    'sex' => "",
                    'add_time' => date("Y-m-d H:i:s", time()),
                    'edit_time' => date("Y-m-d H:i:s", time()),
                    'user_id' => $_token['data']['user_id'],
                ];
                $res = $AccountDAL->insertUserInfo($_data);
            }
            self::$data['data'] = $res;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

    /** 用户中心-积分 */
    function point() {
        self::$data['title'] = "用户中心-积分";
        self::$data['action'] = $this->class . '_' . __FUNCTION__;
        try {
            $TokenDAL = new TokenDAL();
            $_token = $TokenDAL->checkToken();
            if ($_token['code'] != 90001) {
                self::$data['success'] = false;
                self::$data['data'] = 'token error';
                self::$data['code'] = $_token['code'];
                return self::$data;
            }
            $PointDAL = new PointDAL();
            $res = $PointDAL->getUserPoint($_token['data']['user_id']);
            self::$data['data'] = !empty($res['sum']) ? $res['sum'] : 0;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::HOME_INDEX], code::HOME_INDEX, json_encode($ex));
        }
        return self::$data;
    }

}
