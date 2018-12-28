<?php

class LOAD {

    static function loadClass($class_name) {
        $classArray = explode("\\", $class_name);
        if (is_array($classArray)) {
            $url = '.';
            foreach ($classArray as $k => $v) {
                $url .= '/' . $v;
            }
            $url .= '.php';
            if (file_exists($url)) {
                return include_once $url;
            } else {
                //print_r($url);die;
                echo $class_name . '找不到';
                \mod\common::js_alert_redir($class_name . ". 找不到", ERROR_404);
                exit;
            }
        } else {
            echo $class_name . '错误';
        }
        //print_r($classArray);die;
    }

}

/**
 * 设置对象的自动载入 
 * spl_autoload_register — Register given function as __autoload() implementation 
 */
try {
    spl_autoload_register(array('LOAD', 'loadClass'));
//    $a = new main(); //实现自动加载，很多框架就用这种方法自动加载类 
//    $a->show();
} catch (Exception $ex) {
    print_r($ex);
}
//