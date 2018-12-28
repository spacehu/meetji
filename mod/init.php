<?php

namespace mod;

use mod\common as Common;
use action\main;

/**
 * OA系统
 * 
 * 网站初始化基类
 * 
 * 所有动作所需要的元素的初始化配置
 *
 * BuildTime 2010-3-30
 *
 * @since Ver 0.1
 */
class init {

    /** 系统配置文件 */
    public static $config;

    /**
     * 初始化系统基类，加载所有系统开销所需要的各种配置
     * 包括数据库配置，常用路径的地址
     * 
     * @param $sysConfig 系统配置信息
     * @return 
     */
    function __construct($config) {
        //载入配置文件
        self::$config = $config;
        //创建mysql链接
        self::$config['mysql']['conn'] = $this->mysqlStart();
    }

    /** 创建mysql链接 */
    private function mysqlStart() {
        try {
            $conn = mysqli_connect(
                    self::$config['mysql']['host'], self::$config['mysql']['user'], self::$config['mysql']['password'], self::$config['mysql']['dbName'], self::$config['mysql']['port']
            );
            mysqli_query($conn, "set names utf8");
            return $conn;
        } catch (Exception $ex) {
            var_dump($ex);
            exit;
        }
    }

    /** 启动项 */
    public function run() {
        /** 初始化系统类 */
        $this->magicFunction();
        /** 判断语言 */
        $this->setLanguage(self::$config['language']['key']);

        /** 对应的过程名 */
        if (isset($_GET['a'])) {
            $_action = explode("/", $_GET['a']);
            if (!empty($_action['1'])) {
                $action = 'action\\' . $_action['0'] . '\\' . $_action['1'];
            } else {
                $action = 'action\\' . $_GET['a'];
            }
        } else {
            $action = 'action\\' . DEFAULT_ACTION;
        }
        /** 对应的模块名 */
        if (isset($_GET['m'])) {
            $mod = $_GET['m'];
        } else {
            $mod = null;
        }

        /** 自动产生初始化类 */
        $actEval = "\$act = new " . $action . "();";
        
        //Common::pr($actEval);die;
        eval($actEval);
        if (isset($mod)) {
            $actEval = "\$act ->" . $mod . "();";
            eval($actEval);
        }
        $this->afterRun();
    }

    /** 调试用 */
    private function afterRun() {
        if (init::$config['debug'] === true) {
            echo 'get: ';
            Common::pr($_GET);
            echo 'post: ';
            Common::pr($_POST);
            echo 'config: ';
            Common::pr(init::$config);
            echo 'session: ';
            Common::pr($_SESSION);
            echo 'cookie: ';
            Common::pr($_COOKIE);
        }
    }

    /** 关闭魔术引号（加速） */
    private function magicFunction() {
        if (get_magic_quotes_gpc()) {
            $_POST = array_map('stripslashes_deep', $_POST);
            $_GET = array_map('stripslashes_deep', $_GET);
            $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
            $_REQUEST = array_map('stripslashes_deep', $_REQUEST);
        }
    }

    /** 关闭魔术引号（加速） */
    private function stripslashes_deep($value) {
        $value = is_array($value) ?
                array_map('stripslashes_deep', $value) :
                stripslashes($value);
        return $value;
    }

    /** 语言设置 */
    private function setLanguage($defaultLanguage) {
        session_start();
        if (empty($_SESSION['lang'])) {
            $_SESSION['lang'] = $defaultLanguage;
        }
        if (isset($_GET['lang'])) {
            $url = explode("&lang=", $_SERVER['REQUEST_URI']);
            $url = str_replace("-lang-" . $_GET['lang'], '', $url[0]);
            js_redir($url);
        }
        self::$config['language']['common'] = include_once('./languages/' . $_SESSION['lang'] . '/common.php');
    }

    /** 设置模板 */
    public static function getTemplate($tmp, $tmpName, $isContent = false) {
        if (!$isContent) {
            $tmpPath = self::$config['template'] . '/' . $tmp . '/' . $tmpName . '.php';
            include_once($tmpPath);
            return true;
        } else {
            $tmpPath = self::$config['template'] . '/' . $tmp . '/' . $tmpName . '.xxx';
            include_once($tmpPath);
            return true;
        }
    }

    /*     * ************************************************************************************************************************************ */

    /**
     * 
     * @param $revUser 收件用户群
     * @param $subject 邮件标题
     * @param $tmpName 所使用的邮件模板
     */
    function mailTo($revUser, $subject, $tmpName, $content, $debug = false) {

        include($this->sysVar['mod'] . 'mail/smtp.php');

        $mail = new ferrySmtp($this->sysVar['lib'] . 'mailer/class.phpmailer.php');

        $mail->MailTemplate($tmpName, $content);

        if ($debug) {
            return $mail->mail_content;
        } else {
            $mail->Send($revUser, $subject);
        }


        return true;
    }

    function m_tree($menu_id = 0, $lang, $level = 0, $is_show_all = true) {
        $sql = "select c.*,i.menu_name, COUNT(s.menu_id) AS has_children " .
                " from " . $this->table_name('menu') . " as c " .
                "left join " . $this->table_name('menu') . " as s on s.parent_id=c.menu_id " .
                "left join " . $this->table_name('menu_i8n') . " as i on i.menu_id=c.menu_id " .
                " where i.i8n='" . $lang . "' " .
                " GROUP BY c.menu_id " .
                " order by c.parent_id asc,c.order_by asc";
        $cate = getFetchAll($sql, $this->conn);

        $options = $this->menu_options($menu_id, $cate);
        $children_level = 99999; //大于这个分类的将被删除
        if ($is_show_all == false) {
            foreach ($options as $key => $val) {
                if ($val['level'] > $children_level) {
                    unset($options[$key]);
                } else {
                    if ($val['is_show'] == 0 && false) {
                        unset($options[$key]);
                        if ($children_level > $val['level']) {
                            $children_level = $val['level']; //标记一下，这样子分类也能删除
                        }
                    } else {
                        $children_level = 99999; //恢复初始值
                    }
                }
            }
        }

        /* 截取到指定的缩减级别 */
        if ($level > 0) {
            if ($menu_id == 0) {
                $end_level = $level;
            } else {
                $first_item = reset($options); // 获取第一个元素
                $end_level = $first_item['level'] + $level;
            }

            /* 保留level小于end_level的部分 */
            foreach ($options AS $key => $val) {
                if ($val['level'] >= $end_level) {
                    unset($options[$key]);
                }
            }
        }
        return $options;
    }

    /* 排序分类树 */

    function menu_options($spec_cat_id, $arr) {
        static $menu_options = array();

        if (isset($menu_options[$spec_cat_id])) {
            return $menu_options[$spec_cat_id];
        }
        if (!isset($menu_options[0])) {
            $level = $last_cat_id = 0;
            $options = $cat_id_array = $level_array = array();

            while (!empty($arr)) {

                foreach ($arr AS $key => $value) {
                    $cat_id = $value['menu_id'];
                    if ($level == 0 && $last_cat_id == 0) {
                        if ($value['parent_id'] > 0) {
                            break;
                        }

                        $options[$cat_id] = $value;
                        $options[$cat_id]['level'] = $level;
                        $options[$cat_id]['id'] = $cat_id;
                        $options[$cat_id]['name'] = $value['menu_name'];
                        unset($arr[$key]);

                        if ($value['has_children'] == 0) {
                            continue;
                        }
                        $last_cat_id = $cat_id;
                        $cat_id_array = array($cat_id);
                        $level_array[$last_cat_id] = ++$level;
                        continue;
                    }

                    if ($value['parent_id'] == $last_cat_id) {
                        $options[$cat_id] = $value;
                        $options[$cat_id]['level'] = $level;
                        $options[$cat_id]['id'] = $cat_id;
                        $options[$cat_id]['name'] = $value['menu_name'];
                        unset($arr[$key]);

                        if ($value['has_children'] > 0) {
                            if (end($cat_id_array) != $last_cat_id) {
                                $cat_id_array[] = $last_cat_id;
                            }
                            $last_cat_id = $cat_id;
                            $cat_id_array[] = $cat_id;
                            $level_array[$last_cat_id] = ++$level;
                        }
                    } elseif ($value['parent_id'] > $last_cat_id) {
                        break;
                    }
                }

                $count = count($cat_id_array);
                if ($count > 1) {
                    $last_cat_id = array_pop($cat_id_array);
                } elseif ($count == 1) {
                    if ($last_cat_id != end($cat_id_array)) {
                        $last_cat_id = end($cat_id_array);
                    } else {
                        $level = 0;
                        $last_cat_id = 0;
                        $cat_id_array = array();
                        continue;
                    }
                }

                if ($last_cat_id && isset($level_array[$last_cat_id])) {
                    $level = $level_array[$last_cat_id];
                } else {
                    $level = 0;
                }
            }

            $menu_options[0] = $options;
        } else {
            $options = $menu_options[0];
        }

        if (!$spec_cat_id) {
            return $options;
        } else {
            if (empty($options[$spec_cat_id])) {
                return array();
            }

            $spec_cat_id_level = $options[$spec_cat_id]['level'];

            foreach ($options AS $key => $value) {
                if ($key != $spec_cat_id) {
                    unset($options[$key]);
                } else {
                    break;
                }
            }

            $spec_cat_id_array = array();
            foreach ($options AS $key => $value) {
                if (($spec_cat_id_level == $value['level'] && $value['menu_id'] != $spec_cat_id) ||
                        ($spec_cat_id_level > $value['level'])) {
                    break;
                } else {
                    $spec_cat_id_array[$key] = $value;
                }
            }
            $menu_options[$spec_cat_id] = $spec_cat_id_array;

            return $spec_cat_id_array;
        }
    }

    /* 获取配置文件内容 */
    /* 通用树状结构 */

    function o_tree($id = 0, $lang = 'en_us', $level = 0, $is_show_all = true) {
        $sql = "select c.*, COUNT(s.order_id) AS has_children " .
                " from " . $this->table_name('order') . " as c " .
                "left join " . $this->table_name('order') . " as s on s.parent_id=c.order_id " .
                " GROUP BY c.order_id " .
                " order by c.parent_id asc,c.order_id asc";
        //	pr($sql);
        $cate = getFetchAll($sql, $this->conn);

        $options = $this->category_options($id, $cate, 'order_id', 'order_sn');
        $children_level = 99999; //大于这个分类的将被删除
        if ($is_show_all == false) {
            foreach ($options as $key => $val) {
                if ($val['level'] > $children_level) {
                    unset($options[$key]);
                } else {
                    if ($val['is_show'] == 0 && false) {
                        unset($options[$key]);
                        if ($children_level > $val['level']) {
                            $children_level = $val['level']; //标记一下，这样子分类也能删除
                        }
                    } else {
                        $children_level = 99999; //恢复初始值
                    }
                }
            }
        }

        /* 截取到指定的缩减级别 */
        if ($level > 0) {
            if ($id == 0) {
                $end_level = $level;
            } else {
                $first_item = reset($options); // 获取第一个元素
                $end_level = $first_item['level'] + $level;
            }

            /* 保留level小于end_level的部分 */
            foreach ($options AS $key => $val) {
                if ($val['level'] >= $end_level) {
                    unset($options[$key]);
                }
            }
        }
        return $options;
    }

    /* 排序分类树 */

    function category_options($spec_cat_id, $arr, $id_name, $name_name) {
        static $categorys_options = array();

        if (isset($categorys_options[$spec_cat_id])) {
            return $categorys_options[$spec_cat_id];
        }
        if (!isset($categorys_options[0])) {
            $level = $last_cat_id = 0;
            $options = $cat_id_array = $level_array = array();

            while (!empty($arr)) {

                foreach ($arr AS $key => $value) {
                    $cat_id = $value[$id_name];
                    if ($level == 0 && $last_cat_id == 0) {
                        if ($value['parent_id'] > 0) {
                            break;
                        }

                        $options[$cat_id] = $value;
                        $options[$cat_id]['level'] = $level;
                        $options[$cat_id]['id'] = $cat_id;
                        $options[$cat_id]['name'] = $value[$name_name];
                        unset($arr[$key]);

                        if ($value['has_children'] == 0) {
                            continue;
                        }
                        $last_cat_id = $cat_id;
                        $cat_id_array = array($cat_id);
                        $level_array[$last_cat_id] = ++$level;
                        continue;
                    }

                    if ($value['parent_id'] == $last_cat_id) {
                        $options[$cat_id] = $value;
                        $options[$cat_id]['level'] = $level;
                        $options[$cat_id]['id'] = $cat_id;
                        $options[$cat_id]['name'] = $value[$name_name];
                        unset($arr[$key]);

                        if ($value['has_children'] > 0) {
                            if (end($cat_id_array) != $last_cat_id) {
                                $cat_id_array[] = $last_cat_id;
                            }
                            $last_cat_id = $cat_id;
                            $cat_id_array[] = $cat_id;
                            $level_array[$last_cat_id] = ++$level;
                        }
                    } elseif ($value['parent_id'] > $last_cat_id) {
                        break;
                    }
                }

                $count = count($cat_id_array);
                if ($count > 1) {
                    $last_cat_id = array_pop($cat_id_array);
                } elseif ($count == 1) {
                    if ($last_cat_id != end($cat_id_array)) {
                        $last_cat_id = end($cat_id_array);
                    } else {
                        $level = 0;
                        $last_cat_id = 0;
                        $cat_id_array = array();
                        continue;
                    }
                }

                if ($last_cat_id && isset($level_array[$last_cat_id])) {
                    $level = $level_array[$last_cat_id];
                } else {
                    $level = 0;
                }
            }

            $categorys_options[0] = $options;
        } else {
            $options = $categorys_options[0];
        }

        if (!$spec_cat_id) {
            return $options;
        } else {
            if (empty($options[$spec_cat_id])) {
                return array();
            }

            $spec_cat_id_level = $options[$spec_cat_id]['level'];

            foreach ($options AS $key => $value) {
                if ($key != $spec_cat_id) {
                    unset($options[$key]);
                } else {
                    break;
                }
            }

            $spec_cat_id_array = array();
            foreach ($options AS $key => $value) {
                if (($spec_cat_id_level == $value['level'] && $value[$id_name] != $spec_cat_id) ||
                        ($spec_cat_id_level > $value['level'])) {
                    break;
                } else {
                    $spec_cat_id_array[$key] = $value;
                }
            }
            $categorys_options[$spec_cat_id] = $spec_cat_id_array;

            return $spec_cat_id_array;
        }
    }

    /* 通用树状结构 end */

    function inside_config() {
        $dbconfig = '';
        $sql = "select * from " . $this->table_name("config") . " where type='1' order by order_by asc";
        $products = getFetchAll($sql, $this->conn);
        if (!empty($products)) {
            foreach ($products as $k => $v) {
                if (strpos($v['con_name'], '_arr') == false) {
                    $dbconfig[$v['con_name']] = $v['con_value'];
                } else {
                    $arr = explode(';', $v['con_value']);
                    $_arr = '';
                    foreach ($arr as $ka => $va) {
                        $_sarr = explode(':', $va);
                        $_arr[$_sarr[0]] = $_sarr[1];
                    }
                    $dbconfig[$v['con_name']] = $_arr;
                }
            }
        }

        return $dbconfig;
    }

    //base function

    function base() {
//		$sql="select * from ".$this->table_name("menu")."";
//		$sql="select * from ".$this->table_name("menu")." as a left join ".$this->table_name('menu_i8n')." as i on i.menu_id=a.menu_id where a.type='top' and i.i8n='".$_SESSION['lang']."' and a.is_show='1' order by a.order_by asc";
//		$products['menu']=getFetchAll($sql,$this->conn);
        /* 菜单各种 */
        $products['menu'] = $this->m_tree(0, $_SESSION['lang']);
        /* 底部菜单 */
        $sql = "select * from " . $this->table_name("menu") . " as a left join " . $this->table_name('menu_i8n') . " as i on i.menu_id=a.menu_id where a.type='down' and i.i8n='" . $_SESSION['lang'] . "' and a.is_show='1' order by a.order_by asc";
        $products['down'] = getFetchAll($sql, $this->conn);
        /* 左侧推荐分享文章 */
        $sql = "select * from " . $this->table_name("article_i8n") . " as ai " .
                " left join " . $this->table_name("article") . " as a on a.art_id=ai.art_id " .
                " left join " . $this->table_name("img") . " as im on a.art_id=im.type_id " .
                " where ai.i8n='" . $_SESSION['lang'] . "' and a.cat_id='12' and im.type='A' order by a.edit_time desc LIMIT 0, 2";
        $products['share'] = getFetchAll($sql, $this->conn);
        /* 系统参数 */
        $products['config'] = $this->dbconfig;
        //pr($this->dbconfig);
        /* 左侧文章对应菜单变化文字 */
        $sql = "select * from " . $this->table_name("menu") . " as a left join " . $this->table_name('menu_i8n') . " as i on i.menu_id=a.menu_id and i.i8n='" . $_SESSION['lang'] . "' and a.is_show='1' order by a.order_by asc";
        $products['left'] = getFetchAll($sql, $this->conn);
        /* 左侧文章对应菜单变化文字category */
        $sql = "select * from " . $this->table_name("category") . " as a left join " . $this->table_name('category_i8n') . " as i on i.cat_id=a.cat_id and i.i8n='" . $_SESSION['lang'] . "' and a.is_show='1' order by a.order_by asc";
        $products['category'] = getFetchAll($sql, $this->conn);

        if ($_SERVER['HTTP_HOST'] == "127.0.0.1" || $_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] != "fillmorewine.com") {
            $products['server']['host'] = "http://" . $_SERVER['SERVER_NAME'] . '' . str_replace('index.php', '', $_SERVER['PHP_SELF']);
        } else {
            $products['server']['host'] = "http://" . $_SERVER['SERVER_NAME'] . '/';
        }
        return $products;
        //	pr($products);die;
    }

    /**
     * 发送邮件
     * $maildetail 标题内容 (收件人地址$maildetail['user_email'],收件人姓名$maildetail['user_name'],邮件台头$maildetail['subject'],邮件详细$maildetail['body'])
     */
    function for_sm($maildetail) {

        $con = $this->inside_config();
        include_once("./lib/phpmailer/class.phpmailer.php");

        $mail = new PHPMailer();
        $mail->CharSet = "utf-8";
        $mail->IsSMTP();
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com"; // SMTP servers
        $mail->Port = 465;
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->IsHTML(true); //开启html格式

        $mail->Username = $con['out_put_email']; // SMTP username
        $mail->Password = $con['out_put_password']; // SMTP password
        //$mail->SMTPDebug  = 2; 

        $mail->From = $con['company_email']; //从哪里发来
        $mail->FromName = $con['company_name']; //从哪里发来

        $mail->AddAddress($maildetail['user_email'], $maildetail['user_name']); //收件人地址
        $mail->AddReplyTo($con['company_email'], $con['company_name']); //对方可回复对象.

        $mail->Subject = $maildetail['subject'];
        $mail->Body = $maildetail['body']; //邮件正文
        //$data['con']=$mail;
        return $mail->Send();
    }

    /**
     * 分页
     * 输入
     * $template = $this->sysVar['template'] 载入路径
     * $action = $action 当前方法
     * $page int 当前page
     * $Totalpage int 总页数
     * $perpagenum int 每页几个
     * $search array 搜索数组
     * $config array 选择框搜索文字描述及内容 
     * 
     * 输出
     * $text array
     * $page int
     * $action string
     * 
     */
    function i_page($template, $action, $page, $Totalpage, $perpagenum, $search, $config) {
        $andSearch = '';
        if (!empty($config['search'])) {
            $pros = $config['search']['pro'];
            $andSearch = '&pro=' . $pros;

            $_pros = explode('_', $pros);
            $pro = $_pros[0];
            $year = $_pros[1];
        }
        //pr($andSearch);
        $action = 'i_' . $action;
        $tmpPath = $template . 'inventory/page.xxx';
        include($tmpPath);
    }

}
