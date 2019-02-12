<?php

namespace TigerDAL\Api;

use TigerDAL\BaseDAL;

/*
 * 用来返回生成首页需要的数据
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class LogDAL {

    // 文件最大3M
    const maxSize = 3;

    public static $_data = ['DEBUG' => "", "log" => ""];

    function __construct() {
        
    }

    public static function save($str, $filename = 'log') {
        self::$_data[$filename] .= "\n" . $str;
    }

    public static function saveLog($level, $info, $keyword) {
        $str = "[" . $level . "][" . $info . "][" . date("Y-m-d H:i:s") . "]:" . $keyword . "";
        self::save($str, $level);
    }

    public static function _saveLog() {
        if (!empty(self::$_data)) {
            foreach (self::$_data as $k => $v) {
                self::_save($v, $k);
            }
        }
    }

    public static function _save($str, $filename = 'log') {
        $logPath = $_SERVER['DOCUMENT_ROOT'] . \mod\init::$config['env']['logPath'] . '/';
        if (!is_dir($logPath)) {
            mkdir($logPath, 0777);
        }

        $file = $logPath . $filename . '.txt';
        if (!is_file($file)) {
            touch($file);
        }
        if (filesize($file) > self::maxSize * 1024 * 1024) {
            for ($i = 0; $i < 100000; $i ++) {
                $newfile = $logPath . $filename . "." . $i . ".txt";
                if (!is_file($newfile)) {
                    copy($file, $newfile);
                    unlink($file);
                    break;
                }
            }
        }
        file_put_contents($file, $str . "\n", FILE_APPEND);
    }

}
