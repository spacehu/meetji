<?php
$class = \action\comment::$data['class'];
$data = \action\comment::$data['data'];
$article = \action\comment::$data['article'];
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
            <form name="theForm" id="demo" action="./index.php?a=<?php echo $class; ?>&m=updateComment&id=<?php echo $data['id']; ?>" method="post" enctype='multipart/form-data'>
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
                            <span>COMMENT 评论</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="overview" type="text" value="<?php echo isset($data['overview']) ? $data['overview'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>STAR 打分</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="star" type="text" value="<?php echo isset($data['star']) ? $data['star'] : ''; ?>" />
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
                            <span>STATUS 状态</span>
                        </div>
                        <div class="leftAlist" >
                            <select name="status">
                                <option value="0" <?php if ($data['status'] == 0) {
                                    echo 'selected';
                                } ?>>未通过</option>
                                <option value="1" <?php if ($data['status'] == 1) {
                                    echo 'selected';
                                } ?>>通过</option>
                                <option value="2" <?php if ($data['status'] == 2) {
                                    echo 'selected';
                                } ?>>不通过</option>
                            </select>
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