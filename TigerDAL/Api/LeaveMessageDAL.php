<?php

namespace TigerDAL\Api;

use TigerDAL\BaseDAL;

class LeaveMessageDAL {

    /** 获取用户信息列表 */
    public static function getAll($currentPage, $pagesize, $id) {
        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $sql = "select lm.*,a.name as subjectName,a.overview as subjectOverview,a.current_price as subjectCurrentPrice,i.original_src as subjectSrc "
                . "from " . $base->table_name("leave_message") . " as lm "
                . ", " . $base->table_name("article") . " as a "
                . ", " . $base->table_name("article_image") . " as ai "
                . ", " . $base->table_name("image") . " as i "
                . "where lm.article_id=a.id "
                . "and a.id=ai.article_id "
                . "and ai.image_id=i.id "
                . "and lm.`openid`='" . $id . "' "
                . "GROUP BY lm.id "
                . "order by lm.add_time desc "
                . "limit " . $limit_start . "," . $limit_end . " ;";
        //\mod\common::pr($sql);
        return $base->getFetchAll($sql);
    }

    /** 获取用户信息列表 */
    public static function getOneByPhone($phone, $article_id) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("leave_message") . " where phone=" . $phone . " and article_id=" . $article_id . " and add_time>'" . date("Y-m-d") . " 00:00:00'  limit 1 ;";
        return $base->getFetchRow($sql);
    }

    /** 获取用户信息总数 */
    public static function getTotal($id) {
        $base = new BaseDAL();
        $sql = "select count(lm.id) as total "
                . "from " . $base->table_name("leave_message") . " as lm "
//                . ", " . $base->table_name("article") . " as a "
//                . ", " . $base->table_name("article_image") . " as ai "
//                . ", " . $base->table_name("image") . " as i "
                . "where "
                . "lm.`openid`='" . $id . "' "
//                . "and lm.article_id=a.id "
//                . "and a.id=ai.article_id "
//                . "and ai.image_id=i.id "
//                . "GROUP BY lm.id "
                . "";
        //\mod\common::pr($sql);
        return $base->getFetchRow($sql)['total'];
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
            $base->query($sql);
            return $base->last_insert_id();
        } else {
            return true;
        }
    }

    public static function getBonus($_data) {
        $base = new BaseDAL();
        $sql = "select count(1) as num from mrhu_leave_message "
                . "where `source`='" . $_data['source'] . "' and `phone`='" . $_data['phone'] . "' and `code`<>'0' and `code_used`=0 "
                . "limit 1;";
        //print_r($sql);die;
        if ($base->getFetchRow($sql)['num'] == 0) {
            $_sd = date("Y-m-d 00:00:00");
            $_ld = date("Y-m-d+1 00:00:00");
            $sql = "select count(1) as num from mrhu_leave_message "
                    . "where `source`='" . $_data['source'] . "' and `code`<>'0' and `add_time`>'" . $_sd . "' and `add_time`<'" . $_ld . "' "
                    . "limit 1;";
            if ($base->getFetchRow($sql)['num'] < 10) {
                $_incode = (date("H") * 3600) + (date("i") * 60) + date("s");
                $_setup = round($_incode / 864) - 2;
                //$_setup = 98; //for test
                //print_r($_setup);
                if (rand((2 + $_setup), 100) == 100) {
                    $_data['code'] = "TH" . date("ymd") . rand(100, 999);
                } else {
                    return ['error' => 1, 'errorMessage' => 'tryAgain'];
                }
            } else {
                return ['error' => 1, 'errorMessage' => 'dailyOver'];
            }
        } else {
            return ['error' => 1, 'errorMessage' => 'hasCode'];
        }
        return ['error' => 0, 'code' => $_data['code']];
    }

    /** 新增用户信息 */
    public static function insertHelp($data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $v) {
                $_data[] = " '" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "insert into " . $base->table_name('leave_message_help') . " values (null," . $set . ");";
            $base->query($sql);
            return $base->last_insert_id();
        } else {
            return true;
        }
    }

    public static function getHelp($lm_id) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("leave_message") . " where id=" . $lm_id . "  limit 1 ;";
        $res = $base->getFetchRow($sql);
        $sql = "select * from " . $base->table_name("leave_message_help") . " where lm_id=" . $lm_id . "  limit 1 ;";
        $res['help'] = $base->getFetchRow($sql);
        $sql = "select * from " . $base->table_name("user_info_wechat") . " where openid='" . $res['help']['openid'] . "'  limit 1 ;";

        $res['help']['list'][0] = $base->getFetchRow($sql);
        $sql = "select * from " . $base->table_name("user_info_wechat") . " where openid='" . $res['help']['help_openid1'] . "'  limit 1 ;";
        $row = $base->getFetchRow($sql);
        if (!empty($row)) {
            $res['help']['list'][] = $row;
        }
        $sql = "select * from " . $base->table_name("user_info_wechat") . " where openid='" . $res['help']['help_openid2'] . "'  limit 1 ;";
        $row = $base->getFetchRow($sql);
        if (!empty($row)) {
            $res['help']['list'][] = $row;
        }
        $res['help']['total'] = count($res['help']['list']);
        return $res;
    }

    /** 更新用户信息 */
    public static function updateHelp($id, $data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $_data[] = " `" . $k . "`='" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "update " . $base->table_name('leave_message_help') . " set " . $set . "  where lm_id=" . $id . " ;";
            return $base->query($sql);
        } else {
            return true;
        }
    }

}
