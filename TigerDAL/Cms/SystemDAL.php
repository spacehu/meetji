<?php

namespace TigerDAL\Cms;

use TigerDAL\BaseDAL;

class SystemDAL {

    /** 获取系统信息列表 */
    public static function getAll() {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name('system') . " ;";
        return $base->getFetchAll($sql);
    }

    /** 更新系统信息 */
    public static function updateSystem($data) {
        $base = new BaseDAL();
        if (!empty($data)) {
            foreach ($data as $k => $v) {
                $sql = "update " . $base->table_name('system') . " set `value`='" . $v . "' where `name`='{$k}' ;";
                //echo $sql;
                $base->query($sql);
            }
        }
        return true;
    }

    /** 确认系统信息 若一致则不变 不一致则修改 */
    public static function checkSystem($data) {
        $base = new BaseDAL();
        if (!empty($data)) {
            foreach ($data as $k => $v) {
                $_sql = "select count(1) as num from " . $base->table_name('system') . " where `name`='" . $k . "' and `value`='" . $v . "';";
                $count = $base->getFetchRow($_sql);
                if ($count['num'] == 0) {
                    $sql = "update " . $base->table_name('system') . " set `value`='" . $v . "',`edit_time`='" . date("Y-m-d H:i:s", time()) . "' where `name`='{$k}' ;";
                    //echo $sql;
                    $base->query($sql);
                }
            }
        }
        return true;
    }

    /** 获取某条系统配置 */
    public static function getConfig($key) {
        $base = new BaseDAL();
        if (empty($key)) {
            return false;
        }
        $sql = "select * from " . $base->table_name('system') . " where `name`='" . $key . "';";
        $res = $base->getFetchRow($sql);
        return $res;
    }

    public static function getConfigWithTime($key, $_time = null) {
        $res = null;
        $_data = self::getConfig($key);
        if ($_time != null && !empty($_data)) {
            $res = (strtotime($_data['edit_time']) + $_time < strtotime("now")) ? null : $_data['value'];
        }
        return $res;
    }

}
