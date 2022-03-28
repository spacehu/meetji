<?php
$data = \action\enterprise::$data['data'];
$Total = \action\enterprise::$data['total'];
$currentPage = \action\enterprise::$data['currentPage'];
$pagesize = \action\enterprise::$data['pagesize'];
$keywords = \action\enterprise::$data['keywords'];
$class = \action\enterprise::$data['class'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <title>无标题文档</title>
    </head>

    <body>

        <div class="menu">
            <a href="javascript:void(0);" class="updateButton"  onclick="javascript:parent.mainFrame.location.href = 'index.php?a=<?php echo $class; ?>&m=getEnterprise'">添加新企业</a>
        </div>
        <div class="content">
            <table class="mytable" cellspacing="0" >
                <tr bgcolor="#656565" style=" font-weight:bold; color:#FFFFFF;">
                    <td class="td1">名称</td>
                    <td class="td1" width="10%">状态</td>
                    <td class="td1" width="10%">所属用户</td>
                    <td class="td1" width="20%">操作</td>
                </tr>
                <?php
                $sum_i = 1;
                if (!empty($data)) {
                    foreach ($data as $v) {
                        ?>
                        <tr<?php if ($sum_i % 2 != 1) { ?>  class="tr2"<?php } ?>>
                            <td class="td1"><?php echo $v['name']; ?></td>
                            <td class="td1"><?php echo $v['uname']; ?></td>
                            <td class="td1"><?php
                                if ($v['delete'] == 0) {
                                    echo '使用中';
                                } else {
                                    echo '已删除';
                                }
                                ?></td>
                            <td class="td1">
                                <a href="index.php?a=<?php echo $class; ?>&m=getEnterprise&id=<?php echo $v['id']; ?>">编辑</a>
                                | <a href="index.php?a=<?php echo $class; ?>&m=deleteEnterprise&id=<?php echo $v['id']; ?>" onclick="return confirm('确定将此企业删除?')">删除</a></td>
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
        <script type="text/javascript">
                var start=function(code){
                    var path="./v5/main-socketStart.htm?code="+code;
                    $.ajax({
                        url: path,
                        type: "GET",
                        data: [],
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            alert("已经开启");
                        },
                        complete: function (res) {
                            window.location.href = 'index.php?a=<?php echo $class; ?>&m=index';
                            console.log(res);
                        }
                    });
                }
                var stop=function(code){
                    var path="./v5/main-socketStop.htm?code="+code;
                    $.ajax({
                        url: path,
                        type: "GET",
                        data: [],
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            alert("已经停止");
                        },
                        complete: function (res) {
                            window.location.href = 'index.php?a=<?php echo $class; ?>&m=index';
                            console.log(res);
                        }
                    });
                }
        </script>
    </body>
</html>
