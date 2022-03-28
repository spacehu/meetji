<?php

namespace TigerDAL;

use mod\init;
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
        $this->tab_name = init::$config['mysql']['table_pre'];
        $this->conn = init::$config['mysql']['conn'];
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

    /** 获取列表
     * @param $sql
     * @return array|bool
     */
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

    /** 获取单个
     * @param $sql
     * @return array|bool|null
     */
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

    /** 执行sql
     * @param $sql
     * @return bool|\mysqli_result
     */
    public function query($sql) {
        $this->sql .= $sql;
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    /** 设置表名
     * @param $name
     * @return string
     */
    public function table_name($name) {
        $ls = $this->tab_name . $name;
        return $ls;
    }

    /** 获取mysql最近一条的id */
    public function last_insert_id() {
        return mysqli_insert_id($this->conn);
    }

    /** 新增用户信息
     * @param $data
     * @param $_db
     * @return bool|mysqli_result
     */
    public function insert($data, $_db)
    {
        $match = ["NOW()","NULL"];
        if (is_array($data)) {
            $_data = [];
            foreach ($data as $v) {
                if (is_numeric($v)) {
                    $_data[] = " " . $v . " ";
                } else if (!isset($v)) {
                    $_data[] = " null ";
                } else if (in_array($v, $match)) {
                    $_data[] = " " . $v . " ";
                } else {
                    $_data[] = " '" . $v . "' ";
                }
            }
            $set = implode(',', $_data);
            $sql = "insert into " . $this->table_name($_db) . " values (null," . $set . ");";
            //var_dump($sql);die;
            $this->query($sql);
            return $this->last_insert_id();
        } else {
            return true;
        }
    }

    /** 更新用户信息
     * @param $id
     * @param $data
     * @param $_db
     * @return bool|mysqli_result
     */
    public function update($id, $data, $_db)
    {
        $match = ["NOW()"];
        if (is_array($data)) {
            $_data = [];
            foreach ($data as $k => $v) {
                if (is_numeric($v)) {
                    $_data[] = " `" . $k . "`=" . $v . " ";
                } else if (!isset($v)) {
                    $_data[] = " `" . $k . "`= null ";
                } else if (in_array($v, $match)) {
                    $_data[] = " `" . $k . "`=" . $v . " ";
                } else {
                    $_data[] = " `" . $k . "`='" . $v . "' ";
                }
            }
            $set = implode(',', $_data);
            $sql = "update " . $this->table_name($_db) . " set " . $set . "  where id=" . $id . " ;";
            return $this->query($sql);
        } else {
            return true;
        }
    }
}
