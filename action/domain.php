<?php
/**
* todo 尚未完成 
*/ 
namespace action;

use mod\common as Common;
use TigerDAL;
use TigerDAL\Cms\DomainDAL;
use config\code;

class domain {

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

            self::$data['data'] = DomainDAL::getAll($currentPage, $pagesize, $keywords);
            self::$data['total'] = DomainDAL::getTotal($keywords);

            \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
    }


    function getDomain() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data['data'] = DomainDAL::getOne($id);
            } else {
                self::$data['data'] = null;
            }
            self::$data['class'] = $this->class;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateDomain() {
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

                self::$data = DomainDAL::update($id, $data);
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
                self::$data = $id = DomainDAL::insert($data);
            }
            if ($id) {
                Common::js_redir(Common::getSession($this->class));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_UPDATE], code::SHOW_UPDATE, json_encode($ex));
        }
    }

    function deleteDomain() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                self::$data = DomainDAL::delete($id);
            }
            Common::js_redir(Common::getSession($this->class));
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_DELETE], code::SHOW_DELETE, json_encode($ex));
        }
    }
}
