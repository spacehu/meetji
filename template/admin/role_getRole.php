<?php
$data = \action\role::$data['data'];
$list = \action\role::$data['list'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <title>无标题文档</title>
    </head>

    <body>
        <div class="status r_top">
        </div>
        <div class="content">
            <form name="theForm" id="demo" action="./index.php?a=role&m=updateRole&id=<?php echo isset($data['id']) ? $data['id'] : ""; ?>" method="post" enctype='multipart/form-data'>
                <div class="pathA ">
                    <div class="leftA">
                        <div class="leftAlist" >
                            <span>NAME 角色名</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="name" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>DATA 权限代码</span>
                        </div>
                        <div class="leftAlist" >
                            <?php if (!empty($list) && is_array($list)) { ?>
                                <?php foreach ($list as $k => $v) { ?>
                                    <?php
                                    for ($i = 1; $i <= $v['level']; $i++) {
                                        echo '-';
                                    }
                                    ?>
                                    <input type="checkbox" name="purv_data[]" value="<?php echo $v['code']; ?>" <?php echo in_array($v['code'], $data['list']) ? "checked" : ""; ?> /><?php echo $v['name']; ?>
                                    <br />
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="pathB">
                    <div class="leftA">
                        <input name="" type="submit" id="submit" value="SUBMIT 提交" />
                    </div>
                </div>
            </form>	
        </div>
    </body>
</html>