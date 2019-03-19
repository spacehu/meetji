<?php
$class = \action\book::$data['class'];
$data = \action\book::$data['data'];
$article = \action\book::$data['article'];
$school = \action\book::$data['school'];
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
            <form name="theForm" id="demo" action="./index.php?a=<?php echo $class; ?>&m=updateBook&id=<?php echo $data['id']; ?>" method="post" enctype='multipart/form-data'>
                <div class="pathA ">
                    <div class="leftA">
                        <div class="leftAlist" >
                            <span>NICKNAME 昵称</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="name" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>PHONE 手机</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="phone" type="text" value="<?php echo isset($data['phone']) ? $data['phone'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>AGE 年龄</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="age" type="text" value="<?php echo isset($data['age']) ? $data['age'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>AGE RANGE 年龄段</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <?php echo isset($data['age_range']) ? $data['age_range'] : ''; ?>
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>SEX 性别</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="sex" type="text" value="<?php echo isset($data['sex']) ? $data['sex'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>ARRIVE TIME 预计抵达时间</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="arrive_time" type="text" value="<?php echo isset($data['arrive_time']) ? $data['arrive_time'] : ''; ?>" />
                            </div>
                        </div>

                        <div class="leftAlist" >
                            <span>COURSE 课程</span
                        </div>
                        <div class="leftAlist list_image" >
                            <select name="article_id">
                                <option value="0">请选择</option>
                                <?php if (is_array($article)) { ?>
                                    <?php foreach ($article as $k => $v) { ?>
                                        <option value="<?php echo $v['id']; ?>"  <?php echo $data['article_id'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="leftAlist" >
                            <span>SCHOOL 校区</span
                        </div>
                        <div class="leftAlist list_image" >
                            <select name="school">
                                <option value="0">请选择</option>
                                <?php if (is_array($school)) { ?>
                                    <?php foreach ($school as $k => $v) { ?>
                                        <option value="<?php echo $v['id']; ?>"  <?php echo $data['school'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="leftAlist" >
                            <span>STATUS 状态</span>
                        </div>
                        <div class="leftAlist" >
                            <select name="status">
                                <option value="0" <?php
                                if ($data['status'] == 0) {
                                    echo 'selected';
                                }
                                ?>>未确认</option>
                                <option value="1" <?php
                                if ($data['status'] == 1) {
                                    echo 'selected';
                                }
                                ?>>确认</option>
                                <option value="2" <?php
                                if ($data['status'] == 2) {
                                    echo 'selected';
                                }
                                ?>>作废</option>
                            </select>
                        </div>
                        <div class="leftAlist" >
                            <span>OPENID 微信关联id</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <?php echo isset($data['openid']) ? $data['openid'] : ''; ?>
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>EMAIL 电子邮箱</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <?php echo isset($data['email']) ? $data['email'] : ''; ?>
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>CHANNEL 渠道来源</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <?php echo isset($data['channel_type']) ? $data['channel_type'] : ''; ?>
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