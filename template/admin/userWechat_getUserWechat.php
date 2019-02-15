<?php
$data = \action\userWechat::$data['data'];
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
            <p>微信信息</p>
        </div>
        <div class="content">
            <div class="pathA ">
                <div class="leftA">
                    <div class="leftAlist" >
                        <span>NAME 用户名</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['nickname']) ? $data['nickname'] : ''; ?>
                        </div>
                    </div>
                    <div class="leftAlist" >
                        <span>SEX 性别</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['sex']) ? $data['sex'] : ''; ?>
                        </div>
                    </div>
                    <div class="leftAlist" >
                        <span>LANGUAGE 语言</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['language']) ? $data['language'] : ''; ?>
                        </div>
                    </div>
                    <div class="leftAlist" >
                        <span>CITY 城市</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['city']) ? $data['city'] : ''; ?>
                        </div>
                    </div>
                    <div class="leftAlist" >
                        <span>PROVINCE 省</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['province']) ? $data['province'] : ''; ?>
                        </div>
                    </div>
                    <div class="leftAlist" >
                        <span>COUNTRY 国家</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['country']) ? $data['country'] : ''; ?>
                        </div>
                    </div>
                    <div class="leftAlist" >
                        <span>AUTHORIZATION TIME 授权时间</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['add_time']) ? $data['add_time'] : "****-**-** **:**:**"; ?>
                        </div>
                    </div>
                    <div class="leftAlist" >
                        <span>PHONE 手机</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['phone']) ? $data['phone'] : ''; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="status r_top">
            <p>用户信息</p>
        </div>
        <div class="content">
            <div class="pathA ">
                <div class="leftA">
                    <div class="leftAlist" >
                        <span>NAME 姓名</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['subinfo']['name']) ? $data['subinfo']['name'] : ''; ?>
                        </div>
                    </div>
                    <div class="leftAlist" >
                        <span>PHONE 手机</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['subinfo']['phone']) ? $data['subinfo']['phone'] : ''; ?>
                        </div>
                    </div>
                    <div class="leftAlist" >
                        <span>BRITHDAY 生日</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['subinfo']['brithday']) ? $data['subinfo']['brithday'] : ''; ?>
                        </div>
                    </div>
                    <div class="leftAlist" >
                        <span>SEX 性别</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['subinfo']['sex']) ? $data['subinfo']['sex'] : ''; ?>
                        </div>
                    </div>
                    <div class="leftAlist" >
                        <span>EMAIL 电子邮件地址</span>
                    </div>
                    <div class="leftAlist" >
                        <div class="r_row">
                            <?php echo isset($data['subinfo']['email']) ? $data['subinfo']['email'] : ''; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>