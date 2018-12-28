<?php

namespace action;

use mod\common as Common;
use TigerDAL;
use TigerDAL\Cms\ImageDAL;
use TigerDAL\Cms\SlideShowDAL;
use config\code;

class slideShow {

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

            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            self::$data['class'] = $this->class;

            self::$data['data'] = SlideShowDAL::getAll($currentPage, $pagesize);
            self::$data['total'] = SlideShowDAL::getTotal();

            \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SYSTEM_INDEX], code::SYSTEM_INDEX, json_encode($ex));
        }
    }

    function getSlideShow() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data['data'] = SlideShowDAL::getOne($id);
            } else {
                self::$data['data'] = null;
            }
            self::$data['list'] = ImageDAL::getAll(1, 999, '');
            //Common::pr(self::$data['list']);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SYSTEM_INDEX], code::SYSTEM_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateSlideShow() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'image_id' => $_POST['image_id'],
                    'link' => $_POST['link'],
                    'order_by' => isset($_POST['order_by']) ? $_POST['order_by'] : 50,
                    'edit_by' => Common::getSession("id"),
                ];
                self::$data = SlideShowDAL::update($id, $data);
            } else {
                $data = [
                    'image_id' => $_POST['image_id'],
                    'link' => $_POST['link'],
                    'order_by' => isset($_POST['order_by']) ? $_POST['order_by'] : 50,
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                ];
                self::$data = SlideShowDAL::insert($data);
            }
            if (self::$data) {
                //Common::pr(Common::getSession($this->class));die;
                Common::js_redir(Common::getSession($this->class));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SYSTEM_UPDATE], code::SYSTEM_UPDATE, json_encode($ex));
        }
    }

    function deleteSlideShow() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = SlideShowDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SYSTEM_DELETE], code::SYSTEM_DELETE, json_encode($ex));
        }
    }

}
