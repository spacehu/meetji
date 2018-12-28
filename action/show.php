<?php

namespace action;

use mod\common as Common;
use mod\upload as Upload;
use TigerDAL;
use TigerDAL\Cms\ImageDAL;
use TigerDAL\Cms\MediaDAL;
use TigerDAL\Cms\ArtMusicDAL;
use TigerDAL\Cms\ArtVideoDAL;
use TigerDAL\Cms\ArtImageDAL;
use TigerDAL\Cms\ArticleDAL;
use config\code;

class show {

    private $class;
    private $showList = ['article', 'notice', 'share'];
    private $mediaList = ['music', 'video'];
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
            $type = $_GET['type'];
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : \mod\init::$config['page_width'];
            $keywords = isset($_GET['keywords']) ? $_GET['keywords'] : "";

            self::$data['type'] = $type;
            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            self::$data['keywords'] = $keywords;
            self::$data['class'] = $this->class;

            if (in_array($type, $this->showList)) {
                self::$data['data'] = ArticleDAL::getAll($currentPage, $pagesize, $keywords, $type);
                self::$data['total'] = ArticleDAL::getTotal($keywords, $type);
            } else if ($type == 'music') {
                self::$data['data'] = ArtMusicDAL::getAll($currentPage, $pagesize, $keywords);
                self::$data['total'] = ArtMusicDAL::getTotal($keywords);
            } else if ($type == 'video') {
                self::$data['data'] = ArtVideoDAL::getAll($currentPage, $pagesize, $keywords);
                self::$data['total'] = ArtVideoDAL::getTotal($keywords);
            } else if ($type == 'image') {
                self::$data['data'] = ArtImageDAL::getAll($currentPage, $pagesize, $keywords);
                self::$data['total'] = ArtImageDAL::getTotal($keywords);
            } else {
                TigerDAL\CatchDAL::markError(code::$code[code::SHOW_INDEX], code::SHOW_INDEX, json_encode($_GET));
            }
            \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__ . '_' . $type);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_INDEX], code::SHOW_INDEX, json_encode($ex));
        }
    }

    /*     * ************************************************************ */

    function getShow() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        self::$data['type'] = $type;
        try {
            if ($id != null) {
                self::$data['data'] = ArticleDAL::getOne($id);
                self::$data['type'] = self::$data['data']['type'];
            } else {
                self::$data['data'] = null;
            }
            //Common::pr(self::$data['data']);die;
            self::$data['image'] = ImageDAL::getAll(1, 999, "");
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_INDEX], code::SHOW_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateShow() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => isset($_POST['overview']) ? $_POST['overview'] : '',
                    'detail' => isset($_POST['detail']) ? $_POST['detail'] : '',
                    'link' => isset($_POST['link']) ? $_POST['link'] : '',
                    'year' => isset($_POST['year']) ? $_POST['year'] : date("Y"),
                    'month' => isset($_POST['month']) ? $_POST['month'] : date("m"),
                    'day' => isset($_POST['day']) ? $_POST['day'] : date("d"),
                    'address' => isset($_POST['address']) ? $_POST['address'] : '',
                    'source' => isset($_POST['source']) ? $_POST['source'] : '',
                    'media_id' => isset($_POST['media_id']) ? $_POST['media_id'] : 0,
                    'edit_by' => Common::getSession("id"),
                ];
                self::$data = ArticleDAL::update($id, $data);
            } else {
                /** 新增操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => isset($_POST['overview']) ? $_POST['overview'] : '',
                    'detail' => isset($_POST['detail']) ? $_POST['detail'] : '',
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

    function deleteShow() {
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

    function getArtMusic() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        self::$data['type'] = $type;
        try {
            if ($id != null) {
                self::$data['data'] = ArtMusicDAL::getOne($id);
                self::$data['data']['list'] = ArtMusicDAL::getMusics($id);
            } else {
                self::$data['data'] = null;
            }
            self::$data['list'] = MediaDAL::getAll(1, 999, "", "music");
            self::$data['image'] = ImageDAL::getAll(1, 999, "");
            //Common::pr(self::$data['list']);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_INDEX], code::SHOW_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateArtMusic() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $media_ids = $_POST['media_id'];
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'name' => $_POST['name'],
                    'media_id' => $_POST['image_id'],
                    'overview' => $_POST['overview'],
                    'publish_time' => $_POST['publish_time'],
                    'media_id_s' => $_POST['image_id_s'],
                    'minstrel' => $_POST['minstrel'],
                    'style' => $_POST['style'],
                    'edit_by' => Common::getSession("id"),
                ];
                self::$data = ArtMusicDAL::update($id, $data);
            } else {
                /** 新增操作 */
                $data = [
                    'cat_id' => 0,
                    'name' => $_POST['name'],
                    'overview' => $_POST['overview'],
                    'media_id' => $_POST['image_id'],
                    'order_by' => 50,
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                    'publish_time' => $_POST['publish_time'],
                    'media_id_s' => $_POST['image_id_s'],
                    'minstrel' => $_POST['minstrel'],
                    'style' => $_POST['style'],
                ];
                $id = self::$data = ArtMusicDAL::insert($data);
            }
            if (is_array($media_ids)) {
                $medias = array_unique($media_ids);
                ArtMusicDAL::updateAlbum($id, $medias);
            }
            if (self::$data) {

                //Common::pr(Common::getSession($this->class));die;
                //die;
                Common::js_redir(Common::getSession($this->class));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_UPDATE], code::SHOW_UPDATE, json_encode($ex));
        }
    }

    function deleteArtMusic() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = ArtMusicDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_DELETE], code::SHOW_DELETE, json_encode($ex));
        }
    }

    /*     * ************************************************************ */

    function getArtVideo() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        self::$data['type'] = $type;
        try {
            if ($id != null) {
                self::$data['data'] = ArtVideoDAL::getOne($id);
            } else {
                self::$data['data'] = null;
            }
            self::$data['list'] = MediaDAL::getAll(1, 999, "", "video");
            self::$data['image'] = ImageDAL::getAll(1, 999, "");
            //Common::pr(self::$data['list']);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_INDEX], code::SHOW_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateArtVideo() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'name' => $_POST['name'],
                    'order_by' => $_POST['order_by'],
                    'overview' => $_POST['overview'],
                    'media_id' => $_POST['media_id'],
                    'type' => $_POST['type'],
                    'image_id' => $_POST['image_id'],
                    'minstrel' => $_POST['minstrel'],
                    'edit_by' => Common::getSession("id"),
                ];
                self::$data = ArtVideoDAL::update($id, $data);
            } else {
                /** 新增操作 */
                $data = [
                    'cat_id' => 0,
                    'name' => $_POST['name'],
                    'overview' => $_POST['overview'],
                    'media_id' => $_POST['media_id'],
                    'order_by' => $_POST['order_by'],
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                    'type' => $_POST['type'],
                    'image_id' => $_POST['image_id'],
                    'access' => 0,
                    'minstrel' => $_POST['minstrel'],
                ];
                self::$data = ArtVideoDAL::insert($data);
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

    function deleteArtVideo() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = ArtVideoDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_DELETE], code::SHOW_DELETE, json_encode($ex));
        }
    }

    /*     * ************************************************************ */

    function getArtImage() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        self::$data['type'] = $type;
        try {
            if ($id != null) {
                self::$data['data'] = ArtImageDAL::getOne($id);
            } else {
                self::$data['data'] = null;
            }
            self::$data['list'] = ImageDAL::getAll(1, 999, "");
            //Common::pr(self::$data['list']);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_INDEX], code::SHOW_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateArtImage() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'cat_id' => $_POST['cat_id'],
                    'name' => $_POST['name'],
                    'overview' => $_POST['overview'],
                    'image_id' => $_POST['image_id'],
                    'image_id_min' => $_POST['image_id_min'],
                    'edit_by' => Common::getSession("id"),
                ];
                self::$data = ArtImageDAL::update($id, $data);
            } else {
                /** 新增操作 */
                $data = [
                    'cat_id' => $_POST['cat_id'],
                    'name' => $_POST['name'],
                    'overview' => $_POST['overview'],
                    'image_id' => $_POST['image_id'],
                    'order_by' => 50,
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                    'image_id_min' => $_POST['image_id_min'],
                ];
                self::$data = ArtImageDAL::insert($data);
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

    function deleteArtImage() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = ArtImageDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_DELETE], code::SHOW_DELETE, json_encode($ex));
        }
    }

}
