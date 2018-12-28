<?php

namespace action;

use mod\common as Common;
use TigerDAL\BaseDAL;

class login {

    function __construct() {
        
    }

    /**
     * 用户登录界面显示
     */
    function login() {
        \mod\init::getTemplate('./', 'login', false);
    }

    /**
     * 用户登录提交
     */
    function loginPost() {
        if (isset($_POST['t_username']) && isset($_POST['t_password'])) {

            $t_username = Common::specifyChar($_POST['t_username']);
            $t_password = md5(Common::specifyChar($_POST['t_password']));
            try {
                $db = new BaseDAL();
                $sql = "select *,count(*) as num from " . $db->table_name('user') . " where name='" . $t_username . "' and password='" . $t_password . "' ";
                //Common::pr($sql);
                $sod = $db->getFetchRow($sql);
                //Common::pr($sod);die;
                if ($sod['num'] == '1') {
                    Common::writeSession($sod['name'], "userName");
                    Common::writeSession($sod['id'], "id");
                    if (!empty($_POST['get_c']) && $_POST['get_c'] == 'on') {
                        Common::writeCookie($sod['name'], "userName");
                        Common::writeCookie($sod['id'], "id");
                    }
                    Common::writeCookie('zh_cn', "lang");
                    Common::writeSession('zh_cn', "lang");
                    echo "<script>parent.location.href='" . Common::url_rewrite("index.php?a=admin&m=index") . "';</script>";
                    exit;
                } else {
                    Common::js_alert_redir('密码错误,请重新再试', Common::url_rewrite('index.php?a=login&m=login'));
                    exit;
                }
            } catch (Exception $ex) {
                Common::pr($ex);
            }
        } else {
            Common::js_alert_redir('密码错误,请重新再试', Common::url_rewrite('index.php?a=login&m=login'));
            exit;
        }
    }

    function logOff() {
        Common::writeCookie("", "userName");
        Common::writeCookie("", "id");
        Common::destorySession();
        echo "<script>parent.location.href='" . Common::url_rewrite("index.php?a=login&m=login") . "';</script>";
    }

}
