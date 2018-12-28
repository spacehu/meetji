<?php
$data = \action\show::$data['data'];
$type = \action\show::$data['type'];
$image = \action\show::$data['image'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <!-- 配置文件 -->
        <script type="text/javascript" src="lib/uEditor/ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="lib/uEditor/ueditor.all.js"></script>
        <title>无标题文档</title>
    </head>

    <body>
        <div class="status r_top">
        </div>
        <div class="content">
            <form name="theForm" id="demo" action="./index.php?a=show&m=updateShow&id=<?php echo $data['id']; ?>" method="post" enctype='multipart/form-data'>
                <div class="pathA ">
                    <div class="leftA">
                        <?php if ($type == "notice") { ?>
                            <!--notice-->
                            <div class="leftAlist" >
                                <span>NAME 标题</span>
                            </div>
                            <div class="leftAlist" >
                                <div class="r_row">
                                    <input class="text" name="name" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" />
                                    <input class="text" name="type" type="hidden" value="<?php echo $type; ?>" />
                                </div>
                            </div>
                            <div class="leftAlist" >
                                <span>DATE 时间</span>
                            </div>
                            <div class="leftAlist" >
                                <div class="r_row">
                                    <input class="text year" name="year" type="text" value="<?php echo isset($data['year']) ? $data['year'] : ''; ?>" />
                                    <input class="text month" name="month" type="text" value="<?php echo isset($data['month']) ? $data['month'] : ''; ?>" />
                                    <input class="text day" name="day" type="text" value="<?php echo isset($data['day']) ? $data['day'] : ''; ?>" />
                                </div>
                            </div>
                            <div class="leftAlist" >
                                <span>ADDRESS 地点</span>
                            </div>
                            <div class="leftAlist" >
                                <div class="r_row">
                                    <input class="text" name="address" type="text" value="<?php echo isset($data['address']) ? $data['address'] : ''; ?>" />
                                </div>
                            </div>
                            <div class="leftAlist" >
                                <span>OVERVIEW 简述</span>
                            </div>
                            <div class="leftAlist" >
                                <textarea id="TextArea" name="overview"><?php echo isset($data['overview']) ? $data['overview'] : ""; ?></textarea>
                            </div>
                            <!--notice end-->
                        <?php } else if ($type == "article") { ?>
                            <!--article-->
                            <div class="leftAlist" >
                                <span>NAME 标题</span>
                            </div>
                            <div class="leftAlist" >
                                <div class="r_row">
                                    <input class="text" name="name" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" />
                                    <input class="text" name="type" type="hidden" value="<?php echo $type; ?>" />
                                </div>
                            </div>
                            <div class="leftAlist" >
                                <span>IMAGE 封面</span>
                            </div>
                            <div class="leftAlist" >
                                <select name="media_id">
                                    <option value="0">无图片</option>
                                    <?php if (is_array($image)) { ?>
                                        <?php foreach ($image as $k => $v) { ?>
                                            <option value="<?php echo $v['id']; ?>"  <?php echo $data['media_id'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="leftAlist" >
                                <span>DATE 时间</span>
                            </div>
                            <div class="leftAlist" >
                                <div class="r_row">
                                    <input class="text year" name="year" type="text" value="<?php echo isset($data['year']) ? $data['year'] : ''; ?>" />
                                    <input class="text month" name="month" type="text" value="<?php echo isset($data['month']) ? $data['month'] : ''; ?>" />
                                    <input class="text day" name="day" type="text" value="<?php echo isset($data['day']) ? $data['day'] : ''; ?>" />
                                </div>
                            </div>
                            <div class="leftAlist" >
                                <span>ADDRESS 地点</span>
                            </div>
                            <div class="leftAlist" >
                                <div class="r_row">
                                    <input class="text" name="address" type="text" value="<?php echo isset($data['address']) ? $data['address'] : ''; ?>" />
                                </div>
                            </div>
                            <div class="leftAlist" >
                                <span>OVERVIEW 简述</span>
                            </div>
                            <div class="leftAlist" >
                                <textarea id="TextArea" name="overview"><?php echo isset($data['overview']) ? $data['overview'] : ""; ?></textarea>
                            </div>
                            <div class="leftAlist" >
                                <span>DETAIL 详细</span>
                            </div>
                            <div class="leftAlist" >
                                <script id="container" name="detail" type="text/plain">
    <?php echo isset($data['detail']) ? $data['detail'] : ""; ?>
                                </script>
                            </div>
                            <div class="leftAlist" >
                                <span>LINK 链接</span>
                            </div>
                            <div class="leftAlist" >
                                <div class="r_row">
                                    <input class="text" name="link" type="text" value="<?php echo isset($data['link']) ? $data['link'] : ''; ?>" />
                                </div>
                            </div>
                            <div class="leftAlist" >
                                <span>SOURCE 来源</span>
                            </div>
                            <div class="leftAlist" >
                                <div class="r_row">
                                    <input class="text" name="source" type="text" value="<?php echo isset($data['source']) ? $data['source'] : ''; ?>" />
                                </div>
                            </div>
                            <!--article end-->
                        <?php } else if ($type == "share") { ?>
                            <!--article-->
                            <div class="leftAlist" >
                                <span>NAME 标题</span>
                            </div>
                            <div class="leftAlist" >
                                <div class="r_row">
                                    <input class="text" name="name" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" />
                                    <input class="text" name="type" type="hidden" value="<?php echo $type; ?>" />
                                </div>
                            </div>
                            <div class="leftAlist" >
                                <span>IMAGE 封面</span>
                            </div>
                            <div class="leftAlist" >
                                <select name="media_id">
                                    <option value="0">无图片</option>
                                    <?php if (is_array($image)) { ?>
                                        <?php foreach ($image as $k => $v) { ?>
                                            <option value="<?php echo $v['id']; ?>"  <?php echo $data['media_id'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="leftAlist" >
                                <span>OVERVIEW 简述</span>
                            </div>
                            <div class="leftAlist" >
                                <textarea id="TextArea" name="overview"><?php echo isset($data['overview']) ? $data['overview'] : ""; ?></textarea>
                            </div>
                            <div class="leftAlist" >
                                <span>LINK 链接</span>
                            </div>
                            <div class="leftAlist" >
                                <div class="r_row">
                                    <input class="text" name="link" type="text" value="<?php echo isset($data['link']) ? $data['link'] : ''; ?>" />
                                </div>
                            </div>
                            <!--article end-->
                        <?php } else { ?>

                            <div class="leftAlist" >
                                <span>NAME 标题</span>
                            </div>
                            <div class="leftAlist" >
                                <div class="r_row">
                                    <input class="text" name="name" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" />
                                    <input class="text" name="type" type="hidden" value="<?php echo $type; ?>" />
                                </div>
                            </div>
                            <div class="leftAlist" >
                                <span>OVERVIEW 简述</span>
                            </div>
                            <div class="leftAlist" >
                                <textarea id="TextArea" name="overview"><?php echo isset($data['overview']) ? $data['overview'] : ""; ?></textarea>
                            </div>
                            <div class="leftAlist" >
                                <span>DETAIL 详细</span>
                            </div>
                            <div class="leftAlist" >
                                <script id="container" name="detail" type="text/plain">
    <?php echo isset($data['detail']) ? $data['detail'] : ""; ?>
                                </script>

                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="pathB">
                    <div class="leftA">
                        <input name="" type="submit" id="submit" value="SUBMIT 提交" />
                    </div>
                </div>
            </form>	
        </div>
        <?php if ($type != "notice" && $type != "share") { ?>
            <script type="text/javascript">
    var ue = UE.getEditor('container');
            </script>
        <?php } ?>
    </body>
</html>