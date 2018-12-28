<?php
$data = \action\user::$data['data'];
$list = \action\user::$data['list'];
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
            <form name="theForm" id="demo" action="./index.php?a=user&m=updateUser&id=<?php echo $data['id']; ?>" method="post" enctype='multipart/form-data'>
                <div class="pathA ">
                    <div class="leftA">
                        <div class="leftAlist" >
                            <span>NAME 用户名</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <?php echo isset($data['name']) ? $data['name'] : '<input class="text" name="name" type="text" value="" />'; ?>
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>REGISTRATION TIME 注册时间</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <?php echo isset($data['add_time']) ? $data['add_time'] : "****-**-** **:**:**"; ?>
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>ROLE 角色</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <select name="role_id" >
                                    <option value="0" >无角色</option>
                                    <?php if (!empty($list) && is_array($list)) { ?>
                                        <?php foreach ($list as $k => $v) { ?>
                                            <option value="<?php echo $v['id']; ?>" <?php echo $data['role_id'] == $v['id'] ? "selected" : ""; ?> ><?php echo $v['name']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
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