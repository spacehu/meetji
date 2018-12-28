<?php
$data = \action\works::$data['data'];
$type = \action\works::$data['type'];
$image = \action\works::$data['image'];
$albumList = \action\works::$data['albumList'];
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
            <form name="theForm" id="demo" action="./index.php?a=works&m=updateFilm&id=<?php echo $data['id']; ?>" method="post" enctype='multipart/form-data'>
                <div class="pathA ">
                    <div class="leftA">
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
                            <span>PUBLISH 发行时间</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="overview" type="text" value="<?php echo isset($data['overview']) ? $data['overview'] : '2000-01-01'; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>ALBUM 关联专辑</span>
                        </div>
                        <div class="leftAlist" >
                            <select name="link">
                                <option value="0">无关联专辑</option>
                                <?php if (is_array($albumList)) { ?>
                                    <?php foreach ($albumList as $k => $v) { ?>
                                        <option value="<?php echo './home-album_music-id-' . $v['id'] . '.htm'; ?>"  <?php echo $data['link'] == ('./home-album_music-id-' . $v['id'] . '.htm') ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
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