<?php

namespace TigerDAL\Api;

use TigerDAL\BaseDAL;

class LeaveMessageDAL {

    /** 获取用户信息列表 */
    public static function getAll($id) {
        $base = new BaseDAL();
        $sql = "select lm.*,a.name as subjectName,a.overview as subjectOverview,a.current_price as subjectCurrentPrice,i.original_src as subjectSrc "
                . "from " . $base->table_name("leave_message") . " as lm "
                . ", " . $base->table_name("article") . " as a "
                . ", " . $base->table_name("article_image") . " as ai "
                . ", " . $base->table_name("image") . " as i "
                . "where lm.article_id=a.id "
                . "and a.id=ai.article_id "
                . "and ai.image_id=i.id "
                . "and lm.`openid`='" . $id . "' order by lm.add_time desc;";
        //\mod\common::pr($sql);
        return $base->getFetchAll($sql);
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

}
