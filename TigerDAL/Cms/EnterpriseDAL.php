<?php

namespace TigerDAL\Cms;

use TigerDAL\BaseDAL;

class EnterpriseDAL {

    /** 获取用户信息列表 */
    public static function getAll($currentPage, $pagesize, $keywords = '') {
        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $where = "";
        if (!empty($keywords)) {
            $where .= " and e.`name` like '%" . $keywords . "%' ";
        }
        $sql = "select e.*,u.`name` as uname from `" . $base->table_name("enterprise") ."` as e "
        . " left join `".$base->table_name("user")."` as u on e.user_id = u.id "
        . " where e.`delete`=0 " . $where . " order by e.edit_time desc limit " . $limit_start . "," . $limit_end . " ;";
        return $base->getFetchAll($sql);
    }

    /** 获取数量 */
    public static function getTotal($keywords = '') {
        $base = new BaseDAL();
        $where = "";
        if (!empty($keywords)) {
            $where .= " and name like '%" . $keywords . "%' ";
        }
        $sql = "select count(1) as total from " . $base->table_name("enterprise") . " where `delete`=0 " . $where . " limit 1 ;";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取用户信息 */
    public static function getOne($id) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("enterprise") . " where `delete`=0 and id=" . $id . "  limit 1 ;";
        return $base->getFetchRow($sql);
    }

    /** 获取用户信息 */
    public static function getByName($name) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("enterprise") . " where `delete`=0 and name='" . $name . "'  limit 1 ;";
        return $base->getFetchRow($sql);
    }

    /** 获取用户信息 */
    public static function getByCode($code) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("enterprise") . " where `delete`=0 and code='" . $code . "'  limit 1 ;";
        //echo $sql;
        return $base->getFetchRow($sql);
    }
    
    /** 获取用户信息 */
    public static function getByUserId($id) {
        $base = new BaseDAL();
        //$sql = "select * from " . $base->table_name("enterprise") . " where `delete`=0 and user_id='" . $id . "'  limit 1 ;";
        $sql = "select e.* "
                . "from " . $base->table_name("enterprise") . " as e "
                . "left join ".$base->table_name("user")." as u on e.id=u.enterprise_id "
                . "where e.`delete`=0 and u.id='" . $id . "'  limit 1 ;";
        return $base->getFetchRow($sql);
    }

    /** 新增用户信息 */
    public static function insert($data) {
        $base = new BaseDAL();
        return $base->insert($data,'enterprise');
    }

    /** 更新用户信息 */
    public static function update($id, $data) {
        $base = new BaseDAL();
        return $base->update($id,$data,'enterprise');
    }

    /** 删除用户信息 */
    public static function delete($id) {
        $base = new BaseDAL();
        $sql = "update " . $base->table_name('enterprise') . " set `delete`=1  where id=" . $id . " ;";
        return $base->query($sql);
    }

}
