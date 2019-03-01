<?php

namespace TigerDAL\Cms;

use TigerDAL\BaseDAL;

class BookDAL {

    /** 获取用户信息列表 */
    public static function getAll($currentPage, $pagesize, $keywords = '') {
        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $where = "";
        if (!empty($keywords)) {
            $where .= " and name like '%" . $keywords . "%' ";
        }
        $sql = "select * from " . $base->table_name("leave_message") . " where `status`!=2 " . $where . " order by add_time desc limit " . $limit_start . "," . $limit_end . " ;";
        return $base->getFetchAll($sql);
    }

    /** 获取数量 */
    public static function getTotal($keywords = '') {
        $base = new BaseDAL();
        $where = "";
        if (!empty($keywords)) {
            $where .= " and name like '%" . $keywords . "%' ";
        }
        $sql = "select count(1) as total from " . $base->table_name("leave_message") . " where `status`!=2 " . $where . " limit 1 ;";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取用户信息 */
    public static function getOne($id) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("leave_message") . " where `status`!=2 and id=" . $id . "  limit 1 ;";
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
            $sql = "insert into " . $base->table_name('leave_message') . " values (null," . $set . ");";
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
            $sql = "update " . $base->table_name('leave_message') . " set " . $set . "  where id=" . $id . " ;";
            //echo $sql;die;
            return $base->query($sql);
        } else {
            return true;
        }
    }

    public static function getAllByDate($_startdate, $_enddate) {
        $base = new BaseDAL();
        $where = "";
        if (!empty($_startdate)) {
            $where .= " and lm.add_time >= '" . $_startdate . " 00:00:00' ";
        }
        if (!empty($_enddate)) {
            $where .= " and lm.add_time <= '" . $_enddate . " 23:59:59' ";
        }
        $sql = "select lm.`name`,
                        lm.phone,
                        a.`name` AS subjectName,
                        s.`name` AS schoolName,
                        lm.sex,
                        lm.age_range,
                        lm.add_time,
                        lm.arrive_time,
                        s.`region_name` AS schoolRegion,
                        lm.`email` "
                . "from " . $base->table_name("leave_message") . " as lm "
                . "left join " . $base->table_name("article") . " as a on lm.article_id=a.id "
                . "left join " . $base->table_name("school") . " as s on lm.school=s.id "
                . "where lm.`status`!=2 " . $where . " "
                . "order by lm.add_time desc;";
        //\mod\common::pr($sql);die;
        return $base->getFetchAll($sql);
    }

}
