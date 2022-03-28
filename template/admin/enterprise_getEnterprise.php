<?php
$data = \action\enterprise::$data['data'];
$class = \action\enterprise::$data['class'];
$list = \action\enterprise::$data['list'];
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
            <form name="theForm" id="demo" action="./index.php?a=<?php echo $class; ?>&m=updateEnterprise&id=<?php echo isset($data['id']) ? $data['id'] : ""; ?>" method="post" enctype='multipart/form-data'>
                <div class="pathA ">
                    <div class="leftA">
                        <div class="leftAlist" >
                            <span>NAME 企业名</span>
                        </div>
                        <div class="leftAlist" >
                            <input class="text" name="name" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ""; ?>" />
                        </div>
                        <div class="leftAlist" >
                            <span>CODE 系统识别码（请不要随意变更）</span>
                        </div>
                        <div class="leftAlist" >
                            <input class="text" name="code" type="text" value="<?php echo isset($data['code']) ? $data['code'] : ""; ?>" />
                        </div>
                        <div class="leftAlist" >
                            <span>USERNAME 联系人</span>
                        </div>
                        <div class="leftAlist" >
                            <input class="text" name="username" type="text" value="<?php echo isset($data['username']) ? $data['username'] : ""; ?>" /><span class="red"> * </span>
                        </div>
                        <div class="leftAlist" >
                            <span>USERCODE 密码</span>
                        </div>
                        <div class="leftAlist" >
                            <input class="text" name="usercode" type="text" value="<?php echo isset($data['usercode']) ? $data['usercode'] : ""; ?>" /><span class="red"> * </span>
                        </div>
                        <div class="leftAlist" >
                            <span>PHONE 联系人电话</span>
                        </div>
                        <div class="leftAlist" >
                            <input class="text" name="phone" type="text" value="<?php echo isset($data['phone']) ? $data['phone'] : ""; ?>" /><span class="red"> * </span>
                        </div>
                        <div class="leftAlist" >
                            <span>ADDRESS 企业地址</span>
                        </div>
                        <div class="leftAlist" >
                            <input class="text" name="address" type="text" value="<?php echo isset($data['address']) ? $data['address'] : ""; ?>" /><span class="red"> * </span>
                        </div>
                        <div class="leftAlist" >
                            <span>APPID 微信APPID</span>
                        </div>
                        <div class="leftAlist" >
                            <input class="text" name="appid" type="text" value="<?php echo isset($data['appid']) ? $data['appid'] : ""; ?>" /><span class="red"> * </span>
                        </div>
                        <div class="leftAlist" >
                            <span>SECRET 微信SECRET</span>
                        </div>
                        <div class="leftAlist" >
                            <input class="text" name="secret" type="text" value="<?php echo isset($data['secret']) ? $data['secret'] : ""; ?>" /><span class="red"> * </span>
                        </div>
                        <div class="leftAlist" >
                            <span>CLI STATUS 进程状态</span>
                        </div>
                        <div class="leftAlist" >
                            <input class="text" name="cli_status" type="text" value="<?php echo isset($data['cli_status']) ? $data['cli_status'] : "0"; ?>" /><span class="red"> * </span>
                        </div>
                        <div class="leftAlist" >
                            <span>CLI CONFIG 进程配置{"data_sleep":"3","cli_sleep":"5"}</span>
                        </div>
                        <div class="leftAlist" >
                            <textarea class="text" name="cli_config" ><?php echo isset($data['cli_config']) ? $data['cli_config'] : ""; ?></textarea><span class="red"> * </span>
                        </div>
                        <div class="leftAlist" >
                            <span>USER 绑定用户</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <select name="user_id" >
                                    <option value="0" >无用户</option>
                                    <?php if (!empty($list) && is_array($list)) { ?>
                                        <?php foreach ($list as $k => $v) { ?>
                                            <option value="<?php echo $v['id']; ?>" <?php echo $data['user_id'] == $v['id'] ? "selected" : ""; ?> ><?php echo $v['name']; ?></option>
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