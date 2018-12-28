<?php

namespace action;

use mod\common as Common;
use mod\upload as Upload;
use TigerDAL;
use TigerDAL\Cms\ImageDAL;
use TigerDAL\Cms\MediaDAL;
use config\code;

class material {

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
            $type = $_GET['type'];
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : \mod\init::$config['page_width'];
            $keywords = isset($_GET['keywords']) ? $_GET['keywords'] : "";

            self::$data['type'] = $type;
            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            self::$data['keywords'] = $keywords;
            self::$data['class'] = $this->class;

            if ($type == 'image') {
                self::$data['total'] = ImageDAL::getTotal($keywords);
                self::$data['data'] = ImageDAL::getAll($currentPage, 9, $keywords);
//                self::$data['imgsrc'] = ImageDAL::getOne(self::$data['data']['id']);
            } else if ($type == 'music' || $type == 'video') {
                self::$data['data'] = MediaDAL::getAll($currentPage, $pagesize, $keywords, $type);
                self::$data['total'] = MediaDAL::getTotal($keywords, $type);
            } else {
                TigerDAL\CatchDAL::markError(code::$code[code::MATERIAL_INDEX], code::MATERIAL_INDEX, json_encode($_GET));
            }
            \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__ . '_' . $type);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::MATERIAL_INDEX], code::MATERIAL_INDEX, json_encode($ex));
        }
    }

    function getImage() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data['data'] = ImageDAL::getOne($id);
            } else {
                self::$data['data'] = null;
            }
            //Common::pr(self::$data['data']);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::MATERIAL_INDEX], code::MATERIAL_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateImage() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $path = "/data/image_doc";
        $upload = new Upload();
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'name' => $_POST['name'],
                    'edit_by' => Common::getSession("id"),
                ];
                if ($_POST['edit_doc'] == 1) {
                    $_backData = $upload->uploaded_file("image", "unique", "file_url", $path, $id);
                    if (!$_backData['success']) {
                        Common::js_alert(code::ALREADY_EXISTING_DATA . " 重复素材为：" . $_backData['data']['name'] . "。");
                        TigerDAL\CatchDAL::markError(code::$code[code::ALREADY_EXISTING_DATA], code::ALREADY_EXISTING_DATA, json_encode($_POST));
                        Common::js_redir(Common::getSession($this->class));
                    } else {
                        $data['original_src'] = $_backData['path'];
                        $data['unique'] = $_backData['md5'];
                    }
                }
                //Common::pr($data);die;
                self::$data = ImageDAL::update($id, $data);
            } else {
                /** 新增操作 */
                if ($_POST['edit_doc'] == 1) {
                    $_backData = $upload->uploaded_file("image", "unique", "file_url", $path, "");
                    //Common::pr($filePath);die;
                    if (!$_backData['success']) {
                        Common::js_alert(code::ALREADY_EXISTING_DATA . " 重复素材为：" . $_backData['data']['name'] . "。");
                        TigerDAL\CatchDAL::markError(code::$code[code::ALREADY_EXISTING_DATA], code::ALREADY_EXISTING_DATA, json_encode($_POST));
                        Common::js_redir(Common::getSession($this->class));
                    } else {
                        $filePath = $_backData['path'];
                        $unique = $_backData['md5'];
                        //Common::pr(UserDAL::getUser($_POST['name']));die;
                        $data = [
                            'name' => $_POST['name'],
                            'original_src' => $filePath,
                            'original_link' => "",
                            'order_by' => 50,
                            'add_by' => Common::getSession("id"),
                            'add_time' => date("Y-m-d H:i:s"),
                            'edit_by' => Common::getSession("id"),
                            'edit_time' => date("Y-m-d H:i:s"),
                            'delete' => 0,
                            'unique' => $unique,
                        ];
                        self::$data = ImageDAL::insert($data);
                    }
                } else {
                    Common::js_alert(code::NULL_DATA . " 原图不能为空。");
                    TigerDAL\CatchDAL::markError(code::$code[code::NULL_DATA], code::NULL_DATA, json_encode($_POST));
                    Common::js_redir(Common::getSession($this->class));
                }
            }
            if (self::$data) {
                //Common::pr(Common::getSession($this->class));die;
                Common::js_redir(Common::getSession($this->class));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::MATERIAL_UPDATE], code::MATERIAL_UPDATE, json_encode($ex));
        }
    }

    function deleteImage() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = ImageDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::MATERIAL_DELETE], code::MATERIAL_DELETE, json_encode($ex));
        }
    }

    function getMedia() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        self::$data['type'] = $type;
        try {
            if ($id != null) {
                self::$data['data'] = MediaDAL::getOne($id);
            } else {
                self::$data['data'] = null;
            }
            //Common::pr(self::$data['data']);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::MATERIAL_INDEX], code::MATERIAL_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateMedia() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => $_POST['overview'],
                    'src' => $_POST['src'],
                    'minstrel' => $_POST['minstrel'],
                    'duration' => $_POST['duration'],
                    'edit_by' => Common::getSession("id"),
                ];

                self::$data = MediaDAL::update($id, $data);
            } else {
                /** 新增操作 */
                $data = [
                    'name' => $_POST['name'],
                    'overview' => $_POST['overview'],
                    'src' => $_POST['src'],
                    'type' => $_POST['type'],
                    'order_by' => 50,
                    'add_by' => Common::getSession("id"),
                    'add_time' => date("Y-m-d H:i:s"),
                    'edit_by' => Common::getSession("id"),
                    'edit_time' => date("Y-m-d H:i:s"),
                    'delete' => 0,
                    'minstrel' => $_POST['minstrel'],
                    'duration' => $_POST['duration'],
                ];
                self::$data = MediaDAL::insert($data);
            }
            if (self::$data) {
                //Common::pr(Common::getSession($this->class));die;
                Common::js_redir(Common::getSession($this->class));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::MATERIAL_UPDATE], code::MATERIAL_UPDATE, json_encode($ex));
        }
    }

    function deleteMedia() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = MediaDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::MATERIAL_DELETE], code::MATERIAL_DELETE, json_encode($ex));
        }
    }

    /** 异步 */
    function saveImage() {
        //Common::isset_cookie();
        try {
            $filePath = $_GET['path'];
            $filePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $filePath);
            $unique = $_GET['md5'];
            //Common::pr(UserDAL::getUser($_POST['name']));die;
            $data = [
                'name' => $_GET['name'],
                'original_src' => $filePath,
                'original_link' => "",
                'order_by' => 50,
                'add_by' => 0,
                'add_time' => date("Y-m-d H:i:s"),
                'edit_by' => 0,
                'edit_time' => date("Y-m-d H:i:s"),
                'delete' => 0,
                'unique' => $unique,
            ];
            self::$data = ImageDAL::insert($data);
            if (self::$data) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => '修改失败，请联系系统管理员']);
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::MATERIAL_UPDATE], code::MATERIAL_UPDATE, json_encode($ex));
            echo json_encode(['success' => false, 'message' => '999']);
        }
    }

    function getIndexList() {
        //Common::isset_cookie();
        try {
            $currentPage = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
            $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : \mod\init::$config['page_width'];
            $keywords = isset($_GET['keywords']) ? $_GET['keywords'] : "";

            self::$data['currentPage'] = $currentPage;
            self::$data['pagesize'] = $pagesize;
            self::$data['keywords'] = $keywords;
            self::$data['class'] = $this->class;

            self::$data['data'] = ImageDAL::getAll($currentPage, $pagesize, $keywords);
            self::$data['total'] = ImageDAL::getTotal($keywords);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::MATERIAL_INDEX], code::MATERIAL_INDEX, json_encode($ex));
        }
        exit(json_encode(self::$data));
    }

}
