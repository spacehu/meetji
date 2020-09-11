<?php

namespace TigerDAL;

use TigerDAL\Api\LogDAL;

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
    private $sql;
    private $log;

    //默认方法
    function __construct($_LOG = "DEBUG") {
        $this->tab_name = \mod\init::$config['mysql']['table_pre'];
        $this->conn = \mod\init::$config['mysql']['conn'];
        //var_dump($this->conn);
        $this->log = $_LOG;
    }

    function __destruct() {
        if ($this->log == 'cli') {
            cLogDAL::save(date("Y-m-d H:i:s") . "-sql---" . json_encode($this->sql) . "", $this->log);
        } else {
            LogDAL::save(date("Y-m-d H:i:s") . "-sql---" . json_encode($this->sql) . "", $this->log);
        }
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
        $this->sql .= $sql;
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

    public function insert($data,$db) {
        if (is_array($data)) {
            foreach ($data as $v) {
                $_data[] = " '" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "insert into " . $this->table_name($db) . " values (null," . $set . ");";
            $this->query($sql);
            return $this->last_insert_id();
        } else {
            return false;
        }
    }

    public function update($id, $data,$db) {
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $_data[] = " `" . $k . "`='" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "update " . $this->table_name($db) . " set " . $set . "  where id=" . $id . " ;";
            return $this->query($sql);
        } else {
            return false;
        }
    }
}
