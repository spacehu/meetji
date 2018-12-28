<?php

namespace mod;

use mod\init as Init;
use TigerDAL\BaseDAL;

class upload {

    public function uploaded_file($table, $field, $filename, $path, $id) {//存数据库表名，上传表单名
        $_md5 = md5(file_get_contents($_FILES[$filename]['tmp_name']));
        $base = new BaseDAL();
        $and = "";
        if (!empty($id)) {
            $and = " and id!='" . $id . "'";
        }
        $sql = "select * from " . $base->table_name($table) . "where `delete`=0 and `" . $field . "`='" . $_md5 . "' " . $and . "  limit 1 ;";
        $row = $base->getFetchRow($sql);
        if (!empty($row)) {
            return ['success' => false, 'data' => $row];
        }
        $pos = strrpos($_FILES[$filename]['name'], "."); //取得文件名中后缀名的开始位置
        $ext = substr($_FILES[$filename]['name'], $pos); //取得后缀名，包括点号
        $name = $_md5 . $ext;
        $full_path = $path . '/' . $name;
        $full_path_move = \mod\init::$config['env']['path'] . '/' . $name;
        //echo __FILE__;
        move_uploaded_file($_FILES[$filename]['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $full_path_move);
        return ['success' => true, 'path' => $full_path, 'md5' => $_md5];
    }

}
