<?php

namespace mod;

use mod\init as Init;

class common {

    public static $haystack = ['a', 'm'];

    /** 路由重写 */
    public static function url_rewrite($url) {
        if (Init::$config['url_rewrite'] == 'true') {
            //echo $url;
            $a1 = explode("?", $url);
            $s1 = str_replace("index.php", "", $a1[0]);
            if (strpos($a1[1], "&amp;")) {
                $a2 = explode("&amp;", $a1[1]);
            } else {
                $a2 = explode("&", $a1[1]);
            }
            if (!empty($a2)) {
                $turl = $s1;
                foreach ($a2 as $k => $v) {
                    $a3 = explode("=", $v);
                    if ($k === 0) {
                        $turl .= $a3[1];
                    } else {
                        if (in_array($a3[0], self::$haystack)) {
                            $turl .= "-" . $a3[1];
                        } else {
                            $turl .= "-" . $a3[0] . "-" . $a3[1];
                        }
                    }
                }
                $turl .= ".htm";
            } else {
                $turl = $s1;
            }
            $new_url = $turl;
        } else {
            $new_url = $url;
        }
        //Common::pr($new_url);die;
        return $new_url;
    }

    /** 打印报错 */
    static public function pr($obj) {
        echo "<pre>";
        var_dump($obj);
    }

    /** js 弹出错误并关闭窗口 */
    public static function js_close($error_message) {
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
        echo "<script language=javascript>alert('{$error_message}');parent.window.close();</script>";
    }

    /** js 弹出错误并返回 */
    public static function js_error($error_message) {
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
        echo "<script language=javascript>alert('{$error_message}');window.history.back();</script>";
    }

    /** js 弹出错误并跳转指定url */
    public static function js_alert_redir($error_message, $url) {
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
        echo "<script language=javascript>alert('{$error_message}');window.location.href='{$url}';</script>";
    }

    /** js 弹出错误 */
    public static function js_alert($error_message) {
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
        echo "<script language=javascript>alert('{$error_message}');</script>";
    }

    /** js 跳转指定url */
    public static function js_redir($url) {
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
        echo "<script language=javascript>window.location.href='{$url}';</script>";
        exit;
    }

    /** js 无法打开并返回 */
    public static function no_open_error() {
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
        echo "<script language=javascript>alert('无法打开');window.history.back();</script>";
    }

    /** 转义字符 */
    public static function specifyChar($specChar) {
        return addslashes(htmlspecialchars($specChar));
    }

    /** 转义字符 */
    public static function str_rewrite($arr) {
        return base64_encode(json_encode($arr));
    }

    /** 写入session信息 */
    public static function writeSession($session_value, $session_name, $session_time = 0) {
        if ($session_time != 0) {
            $sessiont = $session_time;
        } else {
            $sessiont = Init::$config['cookie_life_time'];
        }
        try {
            session_set_cookie_params($sessiont);
            @session_start();
            $_SESSION[Init::$config['shop_name']][$session_name] = $session_value;
            session_write_close();
        } catch (Exception $e) {
            print $e->getMessage();
            exit;
        }

        return true;
    }

    /** 得到session信息 */
    public static function getSession($session_name) {
        try {
            //session_start();
            if (isset($_SESSION[Init::$config['shop_name']][$session_name])) {
                return $_SESSION[Init::$config['shop_name']][$session_name];
            } else {
                return false;
            }
            session_write_close();
        } catch (Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

    /** 删除session信息 */
    public static function destorySession() {
        try {
            //	session_start();
            session_unset();
            session_destroy();
        } catch (Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

    /** 写入cookie信息 */
    public static function writeCookie($cookie_value, $cookie_name) {
        try {
            setCookie(Init::$config['shop_name'] . "[" . $cookie_name . "]", $cookie_value, Init::$config['cookie_life_time'], '/', DOMAIN_NAME);
        } catch (Exception $e) {
            print $e->getMessage();
            exit;
        }
        return true;
    }

    /** 判断cookie是否过期 */
    public static function isset_cookie() {
        if (!isset($_COOKIE[Init::$config['shop_name']]['userName']) && empty($_SESSION[Init::$config['shop_name']]['userName'])) {
            Common::js_redir(Common::url_rewrite('index.php?a=login&m=login'));
        }

        //self::pr($_SESSION);die;
        $_actions = ['admin']; //默认权限界面
        //$_models = ['index'];
        if (!in_array($_GET['a'], $_actions)) {
            $user_role = \TigerDAL\Cms\UserDAL::getRole(self::getSession('id'));
            //self::pr($user_role);die;
            $_role = explode(";", $user_role['data']);
            switch ($_GET['m']) {
                case "index":
                    if (!in_array($_GET['a'], $_role)) {
                        Common::js_alert_redir("action: " . $_GET['a'] . ". 没有权限", ERROR_405);
                        exit;
                    }
                    if (!empty($_GET['type'])) {
                        if (!in_array($_GET['a'] . "_" . $_GET['type'], $_role)) {
                            Common::js_alert_redir("action: " . $_GET['a'] . "_" . $_GET['type'] . ". 1没有权限", ERROR_405);
                            exit;
                        }
                    }
                    break;
                case "staticPage":
                    if (!in_array($_GET['a'], $_role)) {
                        Common::js_alert_redir("action: " . $_GET['a'] . ". 没有权限", ERROR_405);
                        exit;
                    }
                    break;
                default:
                    if (!in_array($_GET['m'], $_role)) {
                        Common::js_alert_redir("model: " . $_GET['m'] . ". 没有权限", ERROR_405);
                        exit;
                    }
                    break;
            }
        }
    }

    /** 判断cookie是否过期 前台用户登录 */
    public static function isset_cookie_account() {
        if (!isset($_COOKIE[Init::$config['shop_name']]['user_id']) && empty($_SESSION[Init::$config['shop_name']]['user_id'])) {
            Common::js_redir(Common::url_rewrite('./index.php?a=home&m=index'));
        }
    }

    public static function cut_str($string, $sublen, $start = 0, $code = 'UTF-8') {
        if ($code == 'UTF-8') {
            $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
            preg_match_all($pa, $string, $t_string);

            if (count($t_string[0]) - $start > $sublen)
                return join('', array_slice($t_string[0], $start, $sublen)) . "";
            return join('', array_slice($t_string[0], $start, $sublen));
        }
        else {
            $start = $start * 2;
            $sublen = $sublen * 2;
            $strlen = strlen($string);
            $tmpstr = '';

            for ($i = 0; $i < $strlen; $i++) {
                if ($i >= $start && $i < ($start + $sublen)) {
                    if (ord(substr($string, $i, 1)) > 129) {
                        $tmpstr .= substr($string, $i, 2);
                    } else {
                        $tmpstr .= substr($string, $i, 1);
                    }
                }
                if (ord(substr($string, $i, 1)) > 129)
                    $i++;
            }
            if (strlen($tmpstr) < $strlen)
                $tmpstr .= "";
            return $tmpstr;
        }
    }

    /** 增加长度 前面补零  */
    public static function add_len($num, $len) {
        if (strlen($num) >= $len) {
            return $num;
        } else {
            $_add = $len - strlen($num);
            $res = $num;
            for ($i = 0; $i < $_add; $i++) {
                $res = '0' . $res;
            }
            return $res;
        }
    }

    /**
     * 获取url 参数方法
     */
    public static function exchangeGet() {
        $res = "";
        $url = $_SERVER['REQUEST_URI'];
        $get = explode("?", $url);
        if (!empty($get[1])) {
            $request = explode("&", $get[1]);
            if (!empty($request)) {
                foreach ($request as $k => $v) {
                    $_res = explode("=", $v);
                    $res[$_res[0]] = $_res[1];
                }
            }
        }
        return $res;
    }

    /**
     * 获取post 参数方法
     */
    public static function exchangePost() {
        $res = "";
        if (!empty($_POST)) {
            $res = $_POST;
        } else {
            $res = (array) json_decode(file_get_contents('php://input'));
        }
        return $res;
    }

    /**
     * 获取post 参数方法
     */
    public static function exchangeHeader() {
        // 忽略获取的header数据
        $ignore = array('host', 'accept', 'content-length', 'content-type');

        $headers = array();

        foreach ($_SERVER as $key => $value) {
            if (substr($key, 0, 5) === 'HTTP_') {
                $key = substr($key, 5);
                $key = str_replace('_', ' ', $key);
                $key = str_replace(' ', '-', $key);
                $key = strtolower($key);

                if (!in_array($key, $ignore)) {
                    $headers[$key] = $value;
                }
            }
        }
        return $headers;
    }

    public static function getIP() {
        global $_SERVER;
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('REMOTE_ADDR')) {
            $ip = getenv('REMOTE_ADDR');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /*     * *********************************************** */

    function StrLenW($str) {
        $count = 0;
        $len = strlen($str);
        for ($i = 0; $i < $len; $i++, $count++)
            if (ord($str[$i]) >= 128)
                $i++;
        return $count;
    }

    function toCNcap($data) {
        //var_dump($data);
        $capnum = array("零", "壹", "贰", "叁", "肆", "伍", "陆", "柒", "捌", "玖");
        $capdigit = array("", "拾", "佰", "仟");
        $subdata = @explode(".", $data);
        $yuan = $subdata[0];
        $j = 0;
        $nonzero = 0;
        for ($i = 0; $i < strlen($subdata[0]); $i++) {
            if (0 == $i) { //确定个位 
                if (isset($subdata[1])) {
                    $cncap = (substr($subdata[0], -1, 1) != 0) ? "元" : "元零";
                } else {
                    $cncap = "元";
                }
            }
            if (4 == $i) {
                $j = 0;
                $nonzero = 0;
                $cncap = "万" . $cncap;
            } //确定万位
            if (8 == $i) {
                $j = 0;
                $nonzero = 0;
                $cncap = "亿" . $cncap;
            } //确定亿位
            $numb = substr($yuan, -1, 1); //截取尾数
            $cncap = ($numb) ? $capnum[$numb] . $capdigit[$j] . $cncap : (($nonzero) ? "零" . $cncap : $cncap);
            $nonzero = ($numb) ? 1 : $nonzero;
            $yuan = substr($yuan, 0, strlen($yuan) - 1); //截去尾数	  
            $j++;
        }

        if (isset($subdata[1])) {
            $chiao = (substr($subdata[1], 0, 1)) ? $capnum[substr($subdata[1], 0, 1)] . "角" : "零";
            $cent = (substr($subdata[1], 1, 1)) ? $capnum[substr($subdata[1], 1, 1)] . "分" : "零分";
        }
        $chiao = '';
        $cent = '';
        $cncap .= $chiao . $cent . "整";
        $cncap = preg_replace("/(零)+/", "\\1", $cncap); //合并连续“零”
        return $cncap;
    }

    function week_e_c($obj) {
        $e = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        $c = array("星期天", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六");
        $week = str_replace($e, $c, $obj);
        return $week;
    }

}
