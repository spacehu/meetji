<?php

namespace TigerDAL\Cms;

use TigerDAL\BaseDAL;

class StatisticsDAL {

    /** 获取pv列表 */
    public static function getPageView($_startTime, $_endTime, $_model = "", $_url = "") {
        $_and = "";
        return self::query($_and, $_startTime, $_endTime, $_model, $_url);
    }

    /** 获取iv列表 */
    public static function getIPView($_startTime, $_endTime, $_model = "", $_url = "") {
        $_and = "";
        $_groupby = "group by ip ";
        return self::query($_and, $_startTime, $_endTime, $_model, $_url, $_groupby);
    }

    /** 获取uv列表  */
    public static function getUserView($_startTime, $_endTime, $_model = "", $_url = "") {
        $_and = "and user_id is not null and user_id <> '' ";
        $_groupby = "group by user_id ";
        return self::query($_and, $_startTime, $_endTime, $_model, $_url, $_groupby);
    }

    private static function query($_and, $_startTime, $_endTime, $_model, $_url, $_groupby = "") {
        $base = new BaseDAL();
        $_and .= !empty($_model) ? "and `model`='" . $_model . "' " : "";
        $_and .= !empty($_url) ? "and `page_url`='" . $_url . "' " : "";
        $sql = "select count(1) as num,A.time "
                . "FROM ( "
                . "SELECT LEFT (add_time, 10) AS time "
                . "from " . $base->table_name('access_log') . " "
                . "where `add_time`>='" . $_startTime . "' "
                . "and `add_time`<'" . $_endTime . "' "
                . $_and
                . $_groupby
                . ") AS A "
                . "GROUP BY A.time; ";
        return $base->getFetchAll($sql);
    }

    /** 获取抽奖类型 */
    public static function getSource() {
        $base = new BaseDAL();
        $sql = "select source "
                . "FROM " . $base->table_name('leave_message') . " "
                . "group by source"
                . "; ";
        return $base->getFetchAll($sql);
    }

    /** 获取参与信息 */
    public static function getBonus($currentPage, $pagesize, $_startTime, $_endTime, $_source) {
        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $sql = "select * "
                . "FROM " . $base->table_name('leave_message') . " "
                . "where `add_time`>='" . $_startTime . "' "
                . "and `add_time`<'" . $_endTime . "' "
                . "and `source`='" . $_source . "' "
                . "order by code desc "
                . "limit " . $limit_start . "," . $limit_end . " "
                . "; ";
        return $base->getFetchAll($sql);
    }

    /** 获取数量 */
    public static function getBonusTotal($_startTime, $_endTime, $_source) {
        $base = new BaseDAL();
        $sql = "select count(1) as total "
                . "FROM " . $base->table_name('leave_message') . " "
                . "where `add_time`>='" . $_startTime . "' "
                . "and `add_time`<'" . $_endTime . "' "
                . "and `source`='" . $_source . "' "
                . "order by code desc "
                . "limit 1 "
                . "; ";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取粉丝信息-男女比例 */
    public static function getSex() {
        $base = new BaseDAL();
        $sql = "select count(1) as num,sex "
                . "FROM " . $base->table_name('user_info') . " "
                . "group by sex "
                . "; ";
        return $base->getFetchAll($sql);
    }

    /** 获取粉丝信息-年龄区间 
      SELECT
      SUM(A.num) AS num,
      CASE
      WHEN age <= 18 THEN
      'c1'
      WHEN (age <= 24 AND age > 19) THEN
      'c2'
      WHEN (age <= 30 AND age > 25) THEN
      'c3'
      WHEN (age <= 40 AND age > 31) THEN
      'c4'
      WHEN age > 40 THEN
      'c5'
      ELSE
      'c0'
      END AS `nld`
      FROM
      (
      SELECT
      count(1) AS num,
      (
      YEAR (NOW()) - YEAR (DATE(brithday))
      ) AS age
      FROM
      mrhu_user_info
      GROUP BY
      age
      ) AS A
      GROUP BY
      nld;
     * @return type
     */
    public static function getAge() {
        $base = new BaseDAL();
        $sql = "SELECT SUM(A.num) as num, "
                . "CASE when age<=18 then 'c1' when (age<=24 and age>=19) then 'c2' when (age<=30 and age>=25) then 'c3' when (age<=40 and age>=31) then 'c4' when age>40 then 'c5' else  'c0' end as `nld` "
                . "FROM	( "
                . "SELECT count(1) AS num,(YEAR (NOW()) - YEAR (DATE(brithday))) AS age "
                . "FROM " . $base->table_name('user_info') . " "
                . "GROUP BY age "
                . ") AS A "
                . "GROUP BY nld "
                . "; ";
        return $base->getFetchAll($sql);
    }

    /** 获取粉丝信息-居住省份
      SELECT
      count(1) AS num,
      rc.`NAME`
      FROM
      mrhu_user_info AS ui,
      mrhu_region_china AS rc
      WHERE
      ui.province = rc.id
      GROUP BY
      rc.`NAME`;
     */
    public static function getRegion() {
        $base = new BaseDAL();
        $sql = "select count(1) as num,rc.`name` "
                . "FROM " . $base->table_name('user_info') . " as ui "
                . ", " . $base->table_name('region_china') . " as rc "
                . "where ui.province=rc.id and ui.province is not null and ui.province <> 0 "
                . "group by rc.`name` "
                . "; ";
        return $base->getFetchAll($sql);
    }

}
