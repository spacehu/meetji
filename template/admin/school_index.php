<?php
$data = \action\school::$data['data'];
$Total = \action\school::$data['total'];
$class = \action\school::$data['class'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>无标题文档</title>
    </head>

    <body>

        <div class="menu">
            <a href="javascript:void(0);" class="updateButton"  onclick="javascript:parent.mainFrame.location.href = 'index.php?a=<?php echo $class; ?>&m=getSchool'">添加新校区</a>
        </div>
        <div class="content">
            <table class="mytable" cellspacing="0" >
                <tr bgcolor="#656565" style=" font-weight:bold; color:#FFFFFF;">
                    <td class="td1">名称</td>
                    <td class="td1" width="10%">状态</td>
                    <td class="td1" width="20%">操作</td>
                </tr>
                <?php
                $sum_i = 1;
                if (!empty($data)) {
                    foreach ($data as $v) {
                        ?>
                        <tr<?php if ($sum_i % 2 != 1) { ?>  class="tr2"<?php } ?>>
                            <td class="td1"><?php echo $v['name']; ?></td>
                            <td class="td1"><?php
                                if ($v['delete'] == 0) {
                                    echo 'show';
                                } else {
                                    echo 'not show';
                                }
                                ?></td>
                            <td class="td1">
                                <a href="index.php?a=<?php echo $class; ?>&m=getSchool&id=<?php echo $v['id']; ?>">编辑</a>
                                | <a href="index.php?a=<?php echo $class; ?>&m=deleteSchool&id=<?php echo $v['id']; ?>" onclick="return confirm('确定将此校区删除?')">删除</a></td>
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
        </div>
    </body>
</html>
