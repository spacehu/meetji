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

    /** 获取轮播图片 */
    public function GetAwards() {

        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("article") . " where type='awards' and `delete`=0 order by year desc, add_time desc;";
        $data = $base->getFetchAll($sql);

        return ['data' => $data];
    }

    /** 获取专辑 */
    public function GetAlbum($currentPage, $pagesize) {

        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $sql = "select am.*,i.original_src as src from " . $base->table_name("art_music") . " as am , " . $base->table_name("image") . " as i where am.media_id=i.id and am.`delete`=0 and i.`delete`=0 order by publish_time desc limit " . $limit_start . "," . $limit_end . ";";
        $data = $base->getFetchAll($sql);
        return ['data' => $data];
    }

    /** 获取专辑数量 */
    public function GetAlbumTotal() {

        $base = new BaseDAL();
        $sql = "select count(1) as total from " . $base->table_name("art_music") . " as am , " . $base->table_name("image") . " as i where am.media_id=i.id and am.`delete`=0 and i.`delete`=0 ;";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取专辑 */
    public function GetMusic($id) {

        $base = new BaseDAL();
        $sql = "select am.*,i.original_src as src,o.original_src as srcS "
                . "from " . $base->table_name("art_music") . " as am , " . $base->table_name("image") . " as i , " . $base->table_name("image") . " as o "
                . "where am.media_id=i.id and am.media_id_s=o.id and am.`delete`=0 and i.`delete`=0 and o.`delete`=0 and am.id=" . $id . " "
                . "limit 1;";
        $data = $base->getFetchRow($sql);
        $sql = "select m.* from " . $base->table_name("album_music") . " as am , " . $base->table_name("media") . " as m where am.media_id=m.id and art_music_id=" . $id . " ;";
        $subData = $base->getFetchAll($sql);
        $data['music'] = $subData;
        $long = 0;
        if (!empty($subData)) {
            foreach ($subData as $k => $v) {
                $arr = explode(":", $v['duration']);
                $long += $arr[0];
            }
        }
        $data['long'] = $long;
        return ['data' => $data];
    }

    /** 获取行程 */
    public function GetNotice($currentPage, $pagesize, $year, $month) {

        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $sql = "select * from " . $base->table_name("article") . "  where `delete`=0 and `type`='notice' and `year`='" . $year . "' and `month`='" . $month . "' order by `day` desc,add_time desc limit " . $limit_start . "," . $limit_end . ";";
        $data = $base->getFetchAll($sql);
        return ['data' => $data];
    }

    /** 获取最新行程id */
    public function GetNewNoticeId() {

        $base = new BaseDAL();
        $sql = "select id from " . $base->table_name("article") . "  where `delete`=0 and `type`='notice' and `year`>='" . date("Y") . "' and `month`>='" . date("m") . "' and `day`>='" . date("d") . "' order by `day` asc limit 1;";
        $data = $base->getFetchRow($sql);
        return $data['id'];
    }

    /** 获取行程数量 */
    public function GetNoticeTotal($year, $month) {

        $base = new BaseDAL();
        $sql = "select count(1) as total from " . $base->table_name("article") . "  where `delete`=0 and `type`='notice' and `year`='" . $year . "' and `month`='" . $month . "' ;";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取行程日期 */
    public function GetNoticeDate($year) {
        $res = ['year' => array(), 'month' => array()];
        $base = new BaseDAL();
        $sql = "select `year` from " . $base->table_name("article") . " where `type`='notice' and `year`<>'' GROUP BY `year` ORDER BY `year` DESC; ";
        $res['year'] = $base->getFetchAll($sql);
        $sql = "select `month` from " . $base->table_name("article") . " where `type`='notice' and `year`<>'' and `year`='" . $year . "' GROUP BY `month` ORDER BY `month` ASC; ";
        $res['month'] = $base->getFetchAll($sql);
        //print_r($res);die;
        return $res;
    }

    /** 获取活动 */
    public function GetArticle($currentPage, $pagesize) {

        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $sql = "select a.*,i.original_src as src from " . $base->table_name("article") . " as a , " . $base->table_name("image") . " as i where a.media_id=i.id and a.`delete`=0 and i.`delete`=0 and a.`type`='article' order by a.year desc,a.month desc,a.day desc,a.add_time desc limit " . $limit_start . "," . $limit_end . ";";
        $data = $base->getFetchAll($sql);
        return ['data' => $data];
    }

    /** 获取活动数量 */
    public function GetArticleTotal() {

        $base = new BaseDAL();
        $sql = "select count(1) as total from " . $base->table_name("article") . "  where `delete`=0 and `type`='article' ;";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取单个活动 */
    public function GetArticleOne($id) {

        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("article") . "  where`delete`=0 and `id`='" . $id . "';";
        $data = $base->getFetchRow($sql);
        return ['data' => $data];
    }

    /** 获取单个活动的底部菜单 */
    public function GetArticleButtonMenu($id) {

        $base = new BaseDAL();
        $sql = "select id from " . $base->table_name("article") . "  where `type`='article' and `delete`=0 and `id`<'" . $id . "' order by id desc limit 1;";
        $data['right'] = $base->getFetchRow($sql);
        $sql = "select id from " . $base->table_name("article") . "  where `type`='article' and `delete`=0 and `id`>'" . $id . "' order by id asc limit 1;";
        $data['left'] = $base->getFetchRow($sql);
        return ['data' => $data];
    }

    /** 阅读量 */
    public function AddAccess($id, $type) {

        $base = new BaseDAL();
        if ($type == "article") {
            $sql = "update " . $base->table_name("article") . " set `access`=`access`+1 where id='" . $id . "'";
        } else if ($type == "video") {
            $sql = "update " . $base->table_name("art_video") . " set `access`=`access`+1 where id='" . $id . "'";
        }
        //print_r($sql);die;
        $base->query($sql);
    }

    /** 获取视频 */
    public function GetVideo($currentPage, $pagesize, $type) {

        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $sql = "select a.*,i.original_src as src from " . $base->table_name("art_video") . " as a , " . $base->table_name("image") . " as i where a.`type` in('" . $type . "') and  a.image_id=i.id and a.`delete`=0 and i.`delete`=0 order by a.order_by DESC,a.add_time desc limit " . $limit_start . "," . $limit_end . ";";
        //print_r($sql);die;
        $data = $base->getFetchAll($sql);
        return ['data' => $data];
    }

    /** 获取视频数量 */
    public function GetVideoTotal($type) {

        $base = new BaseDAL();
        $sql = "select count(1) as total from " . $base->table_name("art_video") . "  where `type` in('" . $type . "') and `delete`=0 ;";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取视频 */
    public function GetVideoOne($id) {

        $base = new BaseDAL();
        $sql = "select a.*,i.src as src "
                . "from " . $base->table_name("art_video") . " as a , " . $base->table_name("media") . " as i "
                . "where a.id=" . $id . " and  a.media_id=i.id and a.`delete`=0 and i.`delete`=0 "
                . "limit 1;";
        //print_r($sql);die;
        $data = $base->getFetchRow($sql);
        return ['data' => $data];
    }

    /** 获取照片 */
    public function GetPhoto($currentPage, $pagesize) {

        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $sql = "select a.*,i.`original_src` as src,j.`original_src` as src_min "
                . "from " . $base->table_name("art_image") . " as a , " . $base->table_name("image") . " as i, " . $base->table_name("image") . " as j  "
                . "where a.`image_id`=i.`id` and a.`image_id_min`=j.`id` and a.`delete`=0 and i.`delete`=0  and j.`delete`=0 "
                . "order by a.`name` desc "
                . "limit " . $limit_start . "," . $limit_end . ";";
        //echo $sql;
        $data = $base->getFetchAll($sql);
        //\mod\common::pr($data);
        return ['data' => $data];
    }

    /** 获取照片数量 */
    public function GetPhotoTotal() {

        $base = new BaseDAL();
        $sql = "select count(1) as total  "
                . "from " . $base->table_name("art_image") . " as a , " . $base->table_name("image") . " as i, " . $base->table_name("image") . " as j  "
                . "where a.`image_id`=i.`id` and a.`image_id_min`=j.`id` and a.`delete`=0 and i.`delete`=0  and j.`delete`=0 ;";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取works */
    public function GetWorks($currentPage, $pagesize, $type) {

        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $where = '';
        if (!empty($type)) {
            $where .= " and a.type = '" . $type . "' ";
        }
        $orderBy = '';
        if ($type == "album" || $type = "film") {
            $orderBy = "order by a.`overview` desc,a.edit_time desc ";
        } else {
            $orderBy = "order by a.`year` desc,a.`month` desc,a.`day` desc,a.edit_time desc ";
        }
        $sql = "select a.*,i.`original_src` as src from " . $base->table_name("article") . " as a," . $base->table_name("image") . " as i "
                . "where a.`delete`=0 and i.`delete`=0 and a.`media_id`=i.`id` " . $where . " "
                . $orderBy
                . "limit " . $limit_start . "," . $limit_end . " ;";
        //print_r($sql);die;
        $data = $base->getFetchAll($sql);
        return ['data' => $data];
    }

    /** 获取works正则了部分数据 */
    public function GetWorksReplace($currentPage, $pagesize, $type) {
        $data = $this->GetWorks($currentPage, $pagesize, $type);
        if (!empty($data['data'])) {
            foreach ($data['data'] as $k => $v) {
                if (!empty($v['link'])) {
                    preg_match_all("/\d+/", $v['link'], $subject);
                    $data['data'][$k]['linkId'] = $subject[0][0];
                } else {
                    $data['data'][$k]['linkId'] = null;
                }
            }
        }
        return $data;
    }

    /** 获取worksTotal */
    public static function GetWorksTotal($type) {
        $base = new BaseDAL();
        $where = "";
        if (!empty($type)) {
            $where .= " and a.type = '" . $type . "' ";
        }
        $sql = "select count(1) as total from " . $base->table_name("article") . " as a," . $base->table_name("image") . " as i "
                . "where a.`delete`=0 and i.`delete`=0 and a.`media_id`=i.`id` " . $where . " "
                . "limit 1 ;";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取活动 */
    public function GetShare($currentPage, $pagesize) {

        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $sql = "select a.*,i.original_src as src from " . $base->table_name("article") . " as a , " . $base->table_name("image") . " as i where a.media_id=i.id and a.`delete`=0 and i.`delete`=0 and a.`type`='share' order by a.add_time desc limit " . $limit_start . "," . $limit_end . ";";
        $data = $base->getFetchAll($sql);
        return ['data' => $data];
    }

    /** 获取活动数量 */
    public function GetShareTotal() {

        $base = new BaseDAL();
        $sql = "select count(1) as total from " . $base->table_name("article") . "  where `delete`=0 and `type`='share' ;";
        return $base->getFetchRow($sql)['total'];
    }

}
