<?php
$data = \action\book::$data['data'];
$Total = \action\book::$data['total'];
$currentPage = \action\book::$data['currentPage'];
$pagesize = \action\book::$data['pagesize'];
$keywords = \action\book::$data['keywords'];
$class = \action\book::$data['class'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script type="text/javascript" src="js/jquery.js" ></script>
        <title>无标题文档</title>
        <!-- 日历插件 -->
        <link rel="stylesheet" href="./css/mobileSelect.css" />
        <script type="text/javascript" src="./js/mobileSelect.js"></script>
        <script type="text/javascript" src="./js/selectDate.js"></script>
        <!-- 日历插件 end -->
        <script>
            $(function () {
                $('.button_find').click(function () {
                    window.location.href = 'index.php?a=<?php echo $class; ?>&m=index&keywords=' + $('.keywords').val() + '';
                });
                $('.button_export').click(function () {
                    window.location.href = 'index.php?a=<?php echo $class; ?>&m=export&startdate=' + $('.select_0').val() + '&enddate=' + $('.select_1').val() + '';
                });
                $.selectYY_MM_DD("#select_0");
                $.selectYY_MM_DD("#select_1");
            });
        </script>
    </head>

    <body>
        <div class="menu">
            <input type="text" name="keywords" class="keywords" value="<?php echo isset($keywords) ? $keywords : ""; ?>" />
            <a class="button_find " href="javascript:void(0);">查找</a>
        </div>
        <div class="menu">
            <input type="text" class="select_0" id="select_0" readonly value="<?php echo date("Y-m-d",strtotime("-1 day"));?>" />
            -
            <input type="text" class="select_1" id="select_1" readonly value="<?php echo date("Y-m-d",strtotime("-1 day"));?>" />
            <a class="button_export " href="javascript:void(0);">导出</a>
        </div>
        <div class="content">
            <table class="mytable" cellspacing="0" >
                <tr bgcolor="#656565" style=" font-weight:bold; color:#FFFFFF;">
                    <td class="td1" >昵称</td>
                    <td class="td1" width="20%">状态</td>
                    <td class="td1" width="20%">记录增加时间</td>
                    <td class="td1" width="20%">操作</td>
                </tr>
                <?php
                $sum_i = 1;
                if (!empty($data)) {
                    foreach ($data as $v) {
                        ?>
                        <tr<?php if ($sum_i % 2 != 1) { ?>  class="tr2"<?php } ?>>
                            <td class="td1"><?php echo $v['name']; ?></td>
                            <td class="td1"><?php echo $v['status']; ?></td>
                            <td class="td1"><?php echo $v['add_time']; ?></td>

                            <td class="td1">
                                <a href="index.php?a=<?php echo $class; ?>&m=getBook&id=<?php echo $v['id']; ?>">编辑</a>
                            </td>
                        </tr>
                        <?php
                        $sum_i++;
                    }
                }
                ?>
            </table>
            <div class="num_bar">
                总数<b><?php echo $Total; ?></b>
            </div>
            <?php
            $url = 'index.php?a=' . $class . '&m=index&keywords=' . $keywords;
            $Totalpage = ceil($Total / mod\init::$config['page_width']);
            include_once 'page.php';
            ?>
        </div>
    </body>
</html>
