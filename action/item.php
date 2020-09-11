<?php

namespace action;

use mod\common as Common;
use mod\upload as Upload;
use TigerDAL;
use TigerDAL\Cms\ImageDAL;
use TigerDAL\Cms\ItemImageDAL;
use TigerDAL\Cms\ItemDAL;
use config\code;
include_once "./lib/phpqrcode/qrlib.php";

class item {

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
            $type = isset($_GET['type']) ? $_GET['type'] : "";
            $keywords = isset($_GET['keywords']) ? $_GET['keywords'] : "";

            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            self::$data['type'] = $type;
            self::$data['keywords'] = $keywords;
            self::$data['class'] = $this->class;

            self::$data['data'] = ItemDAL::getAll($currentPage, $pagesize,$type, $keywords);
            self::$data['total'] = ItemDAL::getTotal($type,$keywords);

            \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
    }


    function getItem() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        self::$data['type'] = $type;
        try {
            if ($id != null) {
                self::$data['data'] = ItemDAL::getOne($id);
                self::$data['item_image'] = ItemImageDAL::getAll($id);
            } else {
                self::$data['data'] = null;
                self::$data['item_image'] = null;
            }
            self::$data['class'] = $this->class;
            self::$data['image'] = ImageDAL::getAll(1, 999, "");
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateItem() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'name' => isset($_POST['name'])?$_POST['name']:'',
                    'overview' => isset($_POST['overview'])?$_POST['overview']:'',
                    'tags' => isset($_POST['tags'])?$_POST['tags']:'',
                    'detail' => isset($_POST['detail'])?$_POST['detail']:'',
                    'edit_by' => Common::getSession("id"),
                ];

                self::$data = ItemDAL::update($id, $data);
            } else {
                /** 新增操作 */
                $data = [
                    'name' => isset($_POST['name'])?$_POST['name']:'',
                    'overview' => isset($_POST['overview'])?$_POST['overview']:'',
                    'tags' => isset($_POST['tags'])?$_POST['tags']:'',
                    'detail' => isset($_POST['detail'])?$_POST['detail']:'',
                    'order_by' => 50,
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                ];
                self::$data = $id = ItemDAL::insert($data);
            }
            if ($id) {
                $_data = [
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                ];
                if (!empty($_POST['item_image'])) {
                    ItemImageDAL::save(array_unique($_POST['item_image']), $id, $_data);
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

    function deleteItem() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = ItemDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_DELETE], code::SHOW_DELETE, json_encode($ex));
        }
    }

    function getQrcode(){
        $PNG_TEMP_DIR = dirname(__DIR__).DIRECTORY_SEPARATOR.'data/image_doc/qrcode'.DIRECTORY_SEPARATOR;
        $PNG_WEB_DIR = 'data/image_doc/qrcode/';
        $data="expo.bdmartech.com?id=".$_REQUEST['data'];
        $errorCorrectionLevel= 'M';
        $matrixPointSize=6;
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';

        \QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
        exit(json_encode('<img src="'.$PNG_WEB_DIR.basename($filename).'" />'));  
    }
}
