<?php
$data = \action\item::$data['data'];
$Total = \action\item::$data['total'];
$currentPage = \action\item::$data['currentPage'];
$pagesize = \action\item::$data['pagesize'];
$type = \action\item::$data['type'];
$keywords = \action\item::$data['keywords'];
$class = \action\item::$data['class'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script type="text/javascript" src="js/jquery.js" ></script>
        <title>无标题文档</title>
        <script>
            $(function () {
                $('.button_find').click(function () {
                    window.location.href = 'index.php?a=<?php echo $class; ?>&m=index&type=<?php echo $type;?>&keywords=' + $('.keywords').val() + '';
                });
                $('.getqrcode').click(function(){
                    $.ajax({
                        url: "index.php?a=<?php echo $class; ?>&m=getQrcode&data="+$(this).attr('data'),
                        type: "Get",
                        data: [],
                        dataType: "json",
                        success: function (data) {
                            $('.showqrcode').html(data);
                        }
                    });
                });
            });
        </script>
    </head>

    <body>
        <div class="menu">
            <input type="text" name="keywords" class="keywords" value="<?php echo isset($keywords) ? $keywords : ""; ?>" />
            <a class="button_find " href="javascript:void(0);">查找</a>
            <a href="javascript:void(0);" class="updateButton"  onclick="javascript:parent.mainFrame.location.href = 'index.php?a=<?php echo $class; ?>&m=getItem'">添加新课程</a>
        </div>
        <div class="content">
            <table class="mytable" cellspacing="0" >
                <tr bgcolor="#656565" style=" font-weight:bold; color:#FFFFFF;">
                    <td class="td1" >Name 名称</td>
                    <td class="td1" >Url 浏览地址</td>
                    <td class="td1" >QRcode 二维码</td>
                    <td class="td1" width="">Last Update Time上次编辑时间</td>
                    <td class="td1" width="20%">Do Something 操作</td>
                </tr>
                <?php
                $sum_i = 1;
                if (!empty($data)) {
                    foreach ($data as $v) {
                        ?>
                        <tr<?php if ($sum_i % 2 != 1) { ?>  class="tr2"<?php } ?>>
                            <td class="td1"><?php echo $v['name']; ?></td>
                            <td class="td1">expo.bdmartech.com?id=<?php echo $v['id']; ?></td>
                            <td class="td1"><a href="javascript:void(0);" data="<?php echo $v['id']; ?>" class="getqrcode">getqrcode 获取二维码</a></td>
                            <td class="td1"><?php echo $v['edit_time']; ?></td>

                            <td class="td1">
                                <a href="index.php?a=<?php echo $class; ?>&m=getItem&id=<?php echo $v['id']; ?>">编辑</a>
                                <a href="index.php?a=<?php echo $class; ?>&m=deleteItem&id=<?php echo $v['id']; ?>" onclick="return confirm('确定将此项目删除?')">删除</a>
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
        <div class="showqrcode">

        </div>
    </body>
</html>
