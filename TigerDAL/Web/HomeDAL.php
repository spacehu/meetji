<?php

namespace TigerDAL\Web;

use TigerDAL\BaseDAL;

/*
 * 用来返回生成首页需要的数据
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class HomeDAL {

    function __construct() {
        
    }

    /** 获取轮播图片 */
    public function GetSlideShow($currentPage, $pagesize) {

        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;

        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("slide_show") . " as s , " . $base->table_name("image") . " as i where s.`delete`=0 and i.`delete`=0 and s.image_id=i.id order by s.order_by asc, s.add_time desc limit " . $limit_start . "," . $limit_end . "";
        $data = $base->getFetchAll($sql);

        $sql = "select count(1) as num from " . $base->table_name("slide_show") . " as s , " . $base->table_name("image") . " as i where s.`delete`=0 and i.`delete`=0 and s.image_id=i.id  ";
        $total = $base->getFetchRow($sql);

        return ['data' => $data, 'total' => $total['num']];
    }

    /** 获取活动 */
    public function GetArticleSql($keywords = '', $region = '', $cat = '', $brand = '', $age = [], $subject_category = '') {

        $base = new BaseDAL();
        $where = '';
        if (!empty($keywords)) {
            $where .= " and (`a`.`name` like '%" . $keywords . "%' or `a`.`overview` like '%" . $keywords . "%' or `a`.`tags` like '%" . $keywords . "%') ";
        }
        if (!empty($region)) {
            $_sql = "select `as`.`article_id` as `id` "
                    . "from " . $base->table_name("school") . " as `s` ," . $base->table_name("article_school") . " as `as` "
                    . "where `s`.id=`as`.school_id and `s`.`region_name` like '%" . $region . "%' ";
            $_region = $base->getFetchAll($_sql);
            if (!empty($_region)) {
                foreach ($_region as $v) {
                    $_arr[] = $v['id'];
                }
                $_id = implode(',', $_arr);
                $where .= " and `a`.id in (" . $_id . ")";
            }
        }
        if (!empty($cat)) {
            $_sql = "select id "
                    . "from " . $base->table_name("category") . " as `s`  "
                    . "where `s`.`name` = '" . $cat . "' ";
            $_cat = $base->getFetchRow($_sql);
            if (!empty($_cat)) {
                $where .= " and `a`.cat_id = " . $_cat['id'] . " ";
            }
        }
        if (!empty($brand)) {
            $_sql = "select id "
                    . "from " . $base->table_name("brand") . " as `s`  "
                    . "where `s`.`name` like '%" . $brand . "%' ";
            $_brand = $base->getFetchRow($_sql);
            if (!empty($_brand)) {
                $where .= " and `a`.brand_id = " . $_brand['id'] . " ";
            }
        }
        if (!empty($age)) {
            $where .= " and ((`age_min`<='" . $age[0] . "' and `age_max`>='" . $age[0] . "') or (`age_min`<='" . $age[1] . "' and `age_max`>='" . $age[1] . "'))";
        }
        if (!empty($subject_category)) {
            $where .= " and `a`.`subject_category`='" . $subject_category . "' ";
        }
        $sql = "from " . $base->table_name("article") . " as a "
                . "left join " . $base->table_name("article_image") . " as ai on a.id=ai.article_id "
                . "left join " . $base->table_name("image") . " as i on ai.image_id=i.id "
                . "left join " . $base->table_name("leave_message") . " as lm on a.id=lm.article_id "
                . "where a.`delete`=0 and i.`delete`=0 " . $where;
        return $sql;
    }

    /** 获取活动 */
    public function GetArticle($currentPage, $pagesize, $keywords = '', $region = '', $cat = '', $brand = '', $age = [], $subject_category = '') {

        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;

        $sql = "select a.*,i.original_src as src,if(lm.statics=1,count(1),0) as booked_count ";
        $sql .= $this->GetArticleSql($keywords, $region, $cat, $brand, $age, $subject_category);
        $sql .= "group by a.id "
                . "order by i.add_time desc,a.add_time desc "
                . "limit " . $limit_start . "," . $limit_end . ";";
        echo $sql;die;
        $data = $base->getFetchAll($sql);
        return ['data' => $data];
    }

    /** 获取活动数量 */
    public function GetArticleTotal($keywords = '', $region = '', $cat = '', $brand = '', $age = [], $subject_category = '') {

        $base = new BaseDAL();
        $sql = "select count(1) as total ";
        $sql .= $this->GetArticleSql($keywords, $region, $cat, $brand, $age, $subject_category);
        //echo $sql;
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取单个活动 */
    public function GetArticleOne($id) {

        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("article") . "  where`delete`=0 and `id`='" . $id . "';";
        $data = $base->getFetchRow($sql);
        $_sql = "select i.* from " . $base->table_name("article_image") . " as ai ," . $base->table_name("image") . " as i "
                . "where ai.image_id=i.id and ai.article_id='" . $id . "' order by ai.add_time asc;";
        $_data = $base->getFetchAll($_sql);
        $data['image'] = $_data;
        $_sql = "select s.* from " . $base->table_name("article_school") . " as `as` ," . $base->table_name("school") . " as s "
                . "where `as`.school_id=s.id and `as`.article_id='" . $id . "' order by `as`.add_time asc;";
        $_data = $base->getFetchAll($_sql);
        $data['school'] = $_data;
        return ['data' => $data];
    }

}
