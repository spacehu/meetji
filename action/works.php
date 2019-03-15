<?php

namespace action;

use mod\common as Common;
use mod\upload as Upload;
use TigerDAL;
use TigerDAL\Cms\ImageDAL;
use TigerDAL\Cms\SchoolDAL;
use TigerDAL\Cms\ArticleImageDAL;
use TigerDAL\Cms\ArticleSchoolDAL;
use TigerDAL\Cms\ArticleDAL;
use TigerDAL\Cms\SystemDAL;
use TigerDAL\Cms\CategoryDAL;
use TigerDAL\Cms\BrandDAL;
use config\code;

class works {

    private $class;
    public static $data;

    function __construct() {
        $this->class = str_replace('action\\', '', __CLASS__);
    }

    function staticPage() {
        Common::isset_cookie();
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function index() {
        Common::isset_cookie();
        Common::writeSession($_SERVER['REQUEST_URI'], $this->class);
        try {
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : \mod\init::$config['page_width'];
            $keywords = isset($_GET['keywords']) ? $_GET['keywords'] : "";

            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            self::$data['keywords'] = $keywords;
            self::$data['class'] = $this->class;

            self::$data['data'] = ArticleDAL::getAll($currentPage, $pagesize, $keywords);
            self::$data['total'] = ArticleDAL::getTotal($keywords);

            \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
    }

    /*     * ************************************************************ */

    function getWork() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        self::$data['type'] = $type;
        try {
            if ($id != null) {
                self::$data['data'] = ArticleDAL::getOne($id);
                self::$data['article_image'] = ArticleImageDAL::getAll($id);
                self::$data['article_school'] = ArticleSchoolDAL::getAll($id);
            } else {
                self::$data['data'] = null;
                self::$data['article_image'] = null;
                self::$data['article_school'] = null;
            }
            self::$data['class'] = $this->class;
            self::$data['image'] = ImageDAL::getAll(1, 999, "");
            self::$data['school'] = SchoolDAL::getAll(1, 999, "");
            $_subjectCategory = SystemDAL::getConfig("subject_category");
            self::$data['system'] = (array) json_decode($_subjectCategory['value']);
            self::$data['category'] = CategoryDAL::getAll(1, 999, "");
            self::$data['brand'] = BrandDAL::getAll(1, 999, "");
            //print_r(self::$data['article_image']);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateWork() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => $_POST['overview'],
                    'tags' => $_POST['tags'],
                    'detail' => $_POST['detail'],
                    'age_min' => $_POST['age_min'],
                    'age_max' => $_POST['age_max'],
                    'subject_category' => $_POST['subject_category'],
                    'cat_id' => $_POST['cat_id'],
                    'brand_id' => $_POST['brand_id'],
                    'edit_by' => Common::getSession("id"),
                    'source' => isset($_POST['source']) ? $_POST['source'] : '',
                    'praise' => isset($_POST['praise']) ? $_POST['praise'] : '',
                    'start_time' => isset($_POST['start_time']) ? $_POST['start_time'] : date("Y-m-d"),
                    'end_time' => isset($_POST['end_time']) ? $_POST['end_time'] : date("Y-m-d"),
                    'market_price' => isset($_POST['market_price']) ? $_POST['market_price'] : '',
                    'out_link' => isset($_POST['out_link']) ? $_POST['out_link'] : '',
                    'current_price' => isset($_POST['current_price']) ? $_POST['current_price'] : '',
                    'source_count' => isset($_POST['source_count']) ? $_POST['source_count'] : 0,
                    'booked' => isset($_POST['booked']) ? $_POST['booked'] : 0,
                    'need_hide' => isset($_POST['need_hide']) ? $_POST['need_hide'] : 0,
                ];

                self::$data = ArticleDAL::update($id, $data);
            } else {
                /** 新增操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => $_POST['overview'],
                    'tags' => $_POST['tags'],
                    'detail' => $_POST['detail'],
                    'age_min' => $_POST['age_min'],
                    'age_max' => $_POST['age_max'],
                    'subject_category' => $_POST['subject_category'],
                    'cat_id' => $_POST['cat_id'],
                    'brand_id' => $_POST['brand_id'],
                    'order_by' => 50,
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                    'access' => isset($_POST['access']) ? $_POST['access'] : 0,
                    'source' => isset($_POST['source']) ? $_POST['source'] : '',
                    'praise' => isset($_POST['praise']) ? $_POST['praise'] : '',
                    'start_time' => isset($_POST['start_time']) ? $_POST['start_time'] : date("Y-m-d"),
                    'end_time' => isset($_POST['end_time']) ? $_POST['end_time'] : date("Y-m-d"),
                    'market_price' => isset($_POST['market_price']) ? $_POST['market_price'] : '',
                    'out_link' => isset($_POST['out_link']) ? $_POST['out_link'] : '',
                    'current_price' => isset($_POST['current_price']) ? $_POST['current_price'] : '',
                    'source_count' => isset($_POST['source_count']) ? $_POST['source_count'] : 0,
                    'booked' => isset($_POST['booked']) ? $_POST['booked'] : 0,
                    'need_hide' => isset($_POST['need_hide']) ? $_POST['need_hide'] : 0,
                ];
                self::$data = ArticleDAL::insert($data);
                $id = self::$data;
            }
            if (self::$data) {
                $_data = [
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                ];
                if (!empty($_POST['article_image'])) {
                    ArticleImageDAL::save(array_unique($_POST['article_image']), $id, $_data);
                }
                if (!empty($_POST['article_school'])) {
                    ArticleSchoolDAL::save(array_unique($_POST['article_school']), $id, $_data);
                }
                //Common::pr(Common::getSession($this->class));die;
                Common::js_redir(Common::getSession($this->class));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_UPDATE], code::SHOW_UPDATE, json_encode($ex));
        }
    }

    function deleteWork() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = ArticleDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_DELETE], code::SHOW_DELETE, json_encode($ex));
        }
    }

    /*     * ************************************************************ */

    function getConcert() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        self::$data['type'] = $type;
        try {
            if ($id != null) {
                self::$data['data'] = ArticleDAL::getOne($id);
            } else {
                self::$data['data'] = null;
            }
            //Common::pr(self::$data['data']);die;
            self::$data['image'] = ImageDAL::getAll(1, 999, "");
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateConcert() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => isset($_POST['overview']) ? $_POST['overview'] : '',
                    'detail' => isset($_POST['detail']) ? $_POST['detail'] : '',
                    'media_id' => isset($_POST['media_id']) ? $_POST['media_id'] : 0,
                    'link' => isset($_POST['link']) ? $_POST['link'] : '',
                    'edit_by' => Common::getSession("id"),
                ];

                self::$data = ArticleDAL::update($id, $data);
            } else {
                /** 新增操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => $_POST['overview'],
                    'detail' => $_POST['detail'],
                    'type' => $_POST['type'],
                    'cat_id' => 0,
                    'order_by' => 50,
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                    'link' => isset($_POST['link']) ? $_POST['link'] : '',
                    'year' => isset($_POST['year']) ? $_POST['year'] : date("Y"),
                    'month' => isset($_POST['month']) ? $_POST['month'] : date("m"),
                    'day' => isset($_POST['day']) ? $_POST['day'] : date("d"),
                    'address' => isset($_POST['address']) ? $_POST['address'] : '',
                    'access' => isset($_POST['access']) ? $_POST['access'] : 0,
                    'source' => isset($_POST['source']) ? $_POST['source'] : '',
                    'media_id' => isset($_POST['media_id']) ? $_POST['media_id'] : '',
                ];
                self::$data = ArticleDAL::insert($data);
            }
            if (self::$data) {
                //Common::pr(Common::getSession($this->class));die;
                Common::js_redir(Common::getSession($this->class));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_UPDATE], code::SHOW_UPDATE, json_encode($ex));
        }
    }

    function deleteConcert() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = ArticleDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_DELETE], code::SHOW_DELETE, json_encode($ex));
        }
    }

    /*     * ************************************************************ */

    function getFilm() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        self::$data['type'] = $type;
        try {
            if ($id != null) {
                self::$data['data'] = ArticleDAL::getOne($id);
            } else {
                self::$data['data'] = null;
            }
            //Common::pr(self::$data['data']);die;
            self::$data['image'] = ImageDAL::getAll(1, 999, "");
            self::$data['albumList'] = ArtMusicDAL::getAll(1, 999, "");
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateFilm() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => isset($_POST['overview']) ? $_POST['overview'] : '',
                    'detail' => isset($_POST['detail']) ? $_POST['detail'] : '',
                    'media_id' => isset($_POST['media_id']) ? $_POST['media_id'] : 0,
                    'link' => isset($_POST['link']) ? $_POST['link'] : '',
                    'edit_by' => Common::getSession("id"),
                ];

                self::$data = ArticleDAL::update($id, $data);
            } else {
                /** 新增操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => $_POST['overview'],
                    'detail' => $_POST['detail'],
                    'type' => $_POST['type'],
                    'cat_id' => 0,
                    'order_by' => 50,
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                    'link' => isset($_POST['link']) ? $_POST['link'] : '',
                    'year' => isset($_POST['year']) ? $_POST['year'] : date("Y"),
                    'month' => isset($_POST['month']) ? $_POST['month'] : date("m"),
                    'day' => isset($_POST['day']) ? $_POST['day'] : date("d"),
                    'address' => isset($_POST['address']) ? $_POST['address'] : '',
                    'access' => isset($_POST['access']) ? $_POST['access'] : 0,
                    'source' => isset($_POST['source']) ? $_POST['source'] : '',
                    'media_id' => isset($_POST['media_id']) ? $_POST['media_id'] : '',
                ];
                self::$data = ArticleDAL::insert($data);
            }
            if (self::$data) {
                //Common::pr(Common::getSession($this->class));die;
                Common::js_redir(Common::getSession($this->class));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_UPDATE], code::SHOW_UPDATE, json_encode($ex));
        }
    }

    function deleteFilm() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = ArticleDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_DELETE], code::SHOW_DELETE, json_encode($ex));
        }
    }

    /*     * ************************************************************ */

    function getVaritey() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        self::$data['type'] = $type;
        try {
            if ($id != null) {
                self::$data['data'] = ArticleDAL::getOne($id);
            } else {
                self::$data['data'] = null;
            }
            //Common::pr(self::$data['data']);die;
            self::$data['image'] = ImageDAL::getAll(1, 999, "");
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateVaritey() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => isset($_POST['overview']) ? $_POST['overview'] : '',
                    'detail' => isset($_POST['detail']) ? $_POST['detail'] : '',
                    'media_id' => isset($_POST['media_id']) ? $_POST['media_id'] : 0,
                    'link' => isset($_POST['link']) ? $_POST['link'] : '',
                    'edit_by' => Common::getSession("id"),
                ];

                self::$data = ArticleDAL::update($id, $data);
            } else {
                /** 新增操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => $_POST['overview'],
                    'detail' => $_POST['detail'],
                    'type' => $_POST['type'],
                    'cat_id' => 0,
                    'order_by' => 50,
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                    'link' => isset($_POST['link']) ? $_POST['link'] : '',
                    'year' => isset($_POST['year']) ? $_POST['year'] : date("Y"),
                    'month' => isset($_POST['month']) ? $_POST['month'] : date("m"),
                    'day' => isset($_POST['day']) ? $_POST['day'] : date("d"),
                    'address' => isset($_POST['address']) ? $_POST['address'] : '',
                    'access' => isset($_POST['access']) ? $_POST['access'] : 0,
                    'source' => isset($_POST['source']) ? $_POST['source'] : '',
                    'media_id' => isset($_POST['media_id']) ? $_POST['media_id'] : '',
                ];
                self::$data = ArticleDAL::insert($data);
            }
            if (self::$data) {
                //Common::pr(Common::getSession($this->class));die;
                Common::js_redir(Common::getSession($this->class));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_UPDATE], code::SHOW_UPDATE, json_encode($ex));
        }
    }

    function deleteVaritey() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = ArticleDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_DELETE], code::SHOW_DELETE, json_encode($ex));
        }
    }

    /*     * ************************************************************ */

    function getAwards() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        self::$data['type'] = $type;
        try {
            if ($id != null) {
                self::$data['data'] = ArticleDAL::getOne($id);
            } else {
                self::$data['data'] = null;
            }
            //Common::pr(self::$data['data']);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateAwards() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => $_POST['overview'],
                    'detail' => $_POST['detail'],
                    'year' => isset($_POST['year']) ? $_POST['year'] : date("Y"),
                    'edit_by' => Common::getSession("id"),
                ];

                self::$data = ArticleDAL::update($id, $data);
            } else {
                /** 新增操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => isset($_POST['overview']) ? $_POST['overview'] : "",
                    'detail' => isset($_POST['detail']) ? $_POST['detail'] : "",
                    'type' => $_POST['type'],
                    'cat_id' => 0,
                    'order_by' => 50,
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                    'link' => isset($_POST['link']) ? $_POST['link'] : '',
                    'year' => isset($_POST['year']) ? $_POST['year'] : date("Y"),
                    'month' => isset($_POST['month']) ? $_POST['month'] : date("m"),
                    'day' => isset($_POST['day']) ? $_POST['day'] : date("d"),
                    'address' => isset($_POST['address']) ? $_POST['address'] : '',
                    'access' => isset($_POST['access']) ? $_POST['access'] : 0,
                    'source' => isset($_POST['source']) ? $_POST['source'] : '',
                    'media_id' => isset($_POST['media_id']) ? $_POST['media_id'] : 0,
                ];
                self::$data = ArticleDAL::insert($data);
            }
            if (self::$data) {
                //Common::pr(Common::getSession($this->class));die;
                Common::js_redir(Common::getSession($this->class));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_UPDATE], code::SHOW_UPDATE, json_encode($ex));
        }
    }

    function deleteAwards() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = ArticleDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_DELETE], code::SHOW_DELETE, json_encode($ex));
        }
    }

}
