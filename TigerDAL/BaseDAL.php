<?php

namespace TigerDAL;

/*
 * 基本数据类包
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class BaseDAL {

    //表名
    public $tab_name;
    //创建连接
    public $conn;

    //默认方法
    function __construct() {
        $this->tab_name = \mod\init::$config['mysql']['table_pre'];
        $this->conn = \mod\init::$config['mysql']['conn'];
        //var_dump($this->conn);
    }

    /** 获取列表 */
    public function getFetchAll($sql) {
        $result = $this->query($sql);
        if (!empty($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        if (!isset($data)) {
            return false;
        } else {
            return $data;
        }
    }

    /** 获取单个 */
    public function getFetchRow($sql) {
        $result = $this->query($sql);
        if (!empty($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data = $row;
            }
        }
        if (!isset($data)) {
            return false;
        } else {
            return $data;
        }
    }

    /** 执行sql */
    public function query($sql) {
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    /** 设置表名 */
    public function table_name($name) {
        $ls = $this->tab_name . $name;
        return $ls;
    }

    /** 获取mysql最近一条的id */
    public function last_insert_id() {
        return mysqli_insert_id($this->conn);
    }

}
