<?php

namespace TigerDAL\Cms;

use TigerDAL\BaseDAL;

class ChannelDAL {

    /** 获取用户信息列表 */
    public static function getAll($currentPage, $pagesize, $keywords = '') {
        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $where = self::getUniqueData();
        if (!empty($keywords)) {
            $where .= " and c.`name` like '%" . $keywords . "%' ";
        }
        $sql = "select c.*,u.`name` as uname from " . $base->table_name("channel") ." as c "
        . " left join `".$base->table_name("user")."` as u on c.add_by = u.id "
        . " where c.`delete`=0 " . $where . " order by c.edit_time desc limit " . $limit_start . "," . $limit_end . " ;";
        return $base->getFetchAll($sql);
    }

    /** 获取数量 */
    public static function getTotal($keywords = '') {
        $base = new BaseDAL();
        $where = self::getUniqueData();
        if (!empty($keywords)) {
            $where .= " and name like '%" . $keywords . "%' ";
        }
        $sql = "select count(1) as total from " . $base->table_name("channel") . " where `delete`=0 " . $where . " limit 1 ;";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取用户信息 */
    public static function getOne($id) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("channel") . " where `delete`=0 and id=" . $id . "  limit 1 ;";
        return $base->getFetchRow($sql);
    }

    /** 获取用户信息 */
    public static function getByName($name) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("channel") . " where `delete`=0 and name='" . $name . "'  limit 1 ;";
        return $base->getFetchRow($sql);
    }

    /** 新增用户信息 */
    public static function insert($data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $v) {
                $_data[] = " '" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "insert into " . $base->table_name('channel') . " values (null," . $set . ");";
            return $base->query($sql);
        } else {
            return true;
        }
    }

    /** 更新用户信息 */
    public static function update($id, $data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $_data[] = " `" . $k . "`='" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "update " . $base->table_name('channel') . " set " . $set . "  where id=" . $id . " ;";
            return $base->query($sql);
        } else {
            return true;
        }
    }

    /** 删除用户信息 */
    public static function delete($id) {
        $base = new BaseDAL();
        $sql = "update " . $base->table_name('channel') . " set `delete`=1  where id=" . $id . " ;";
        return $base->query($sql);
    }

    /**
     * 判断是否需要获取自有数据
     */
    public static function getUniqueData(){
        // 判断是否需要获取独立信息
        $uid=$_SESSION[\mod\init::$config['shop_name']]['id'];
        $user=UserDAL::getOne($uid);
        if($user['role_id']>1){
            return " and add_by = ".$uid ." ";
        }
        return "";
    }
}
