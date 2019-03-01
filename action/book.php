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
use TigerDAL\Cms\BookDAL;
use config\code;

class book {

    private $class;
    public static $data;

    function __construct() {
        $this->class = str_replace('action\\', '', __CLASS__);
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

            self::$data['data'] = BookDAL::getAll($currentPage, $pagesize, $keywords);
            self::$data['total'] = BookDAL::getTotal($keywords);

            \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
    }

    /*     * ************************************************************ */

    function getBook() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        self::$data['type'] = $type;
        try {
            if ($id != null) {
                self::$data['data'] = BookDAL::getOne($id);
            }
            self::$data['article'] = ArticleDAL::getAll(1, 99, '');
            self::$data['school'] = SchoolDAL::getAll(1, 999, "");
            self::$data['class'] = $this->class;
            //print_r(self::$data['article_image']);die;
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
        \mod\init::getTemplate('admin', $this->class . '_' . __FUNCTION__);
    }

    function updateBook() {
        Common::isset_cookie();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        try {
            if ($id != null) {
                /** 更新操作 */
                $data = [
                    'name' => $_POST['name'],
                    'phone' => $_POST['phone'],
                    'age' => $_POST['age'],
                    'sex' => $_POST['sex'],
                    'school' => $_POST['school'],
                    'arrive_time' => $_POST['arrive_time'],
                    'article_id' => $_POST['article_id'],
                    'status' => $_POST['status'],
                ];

                self::$data = BookDAL::update($id, $data);
            }
            if (self::$data) {
                Common::js_redir(Common::getSession($this->class));
            } else {
                Common::js_alert('修改失败，请联系系统管理员');
            }
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::SHOW_UPDATE], code::SHOW_UPDATE, json_encode($ex));
        }
    }

    function export() {
        Common::isset_cookie();
        Common::writeSession($_SERVER['REQUEST_URI'], $this->class);
        try {
            $_startdate = isset($_GET['startdate']) ? $_GET['startdate'] : date("Y-m-d", strtotime("-1 day"));
            $_enddate = isset($_GET['enddate']) ? $_GET['enddate'] : date("Y-m-d", strtotime("-1 day"));
            $_keywords = isset($_GET['keywords']) ? $_GET['keywords'] : null;

            $_data = BookDAL::getAllByDate($_startdate, $_enddate);
            //Common::pr($_data);
            //$header_data = ["姓名", "电话", "预约课程", "所属区域", "性别", "年龄", "创建时间", "可预约时间"];
            $header_data = ["姓名", "邮箱", "手机号码", "性别", "年龄段", "预约课程", "预约时间", "城市", "校区"];
            $this->export_csv_1($_data, $header_data, "export_" . date("YmdHis") . ".csv");
        } catch (Exception $ex) {
            TigerDAL\CatchDAL::markError(code::$code[code::WORKS_INDEX], code::WORKS_INDEX, json_encode($ex));
        }
    }

    /**
     * 导出CSV文件
     * @param array $data        数据
     * @param array $header_data 首行数据
     * @param string $file_name  文件名称
     * @return string
     */
    public function export_csv_1($data = [], $header_data = [], $file_name = '') {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $file_name);
        if (!empty($header_data)) {
            echo iconv('utf-8', 'gbk//TRANSLIT', '"' . implode('","', $header_data) . '"' . "\n");
        }
        foreach ($data as $key => $value) {
            $output = array();
            $output[] = $value['name'];
            $output[] = $value['email'];
            $output[] = $value['phone'];
            $output[] = $value['sex'];
            $output[] = $value['age_range'];
            $output[] = $value['subjectName'];
            $output[] = $value['arrive_time'];
            $output[] = $value['schoolRegion'];
            $output[] = $value['schoolName'];
            echo iconv('utf-8', 'gbk//TRANSLIT', '"' . implode('","', $output) . "\"\n");
        }
    }

}
