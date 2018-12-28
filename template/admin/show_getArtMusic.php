<?php
$data = \action\show::$data['data'];
$type = \action\show::$data['type'];
$list = \action\show::$data['list'];
$image = \action\show::$data['image'];
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
            <form name="theForm" id="demo" action="./index.php?a=show&m=updateArtMusic&id=<?php echo $data['id']; ?>" method="post" enctype='multipart/form-data'>
                <div class="pathA ">
                    <div class="leftA">
                        <div class="leftAlist" >
                            <span>NAME 专辑名</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="name" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" />
                                <input class="text" name="type" type="hidden" value="<?php echo $type; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>PUBLISH 发行时间</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="publish_time" type="text" value="<?php echo isset($data['publish_time']) ? $data['publish_time'] : '2000-01-01'; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>IMAGE 封面</span>
                        </div>
                        <div class="leftAlist" >
                            <select name="image_id">
                                <option value="0">无图片</option>
                                <?php if (is_array($image)) { ?>
                                    <?php foreach ($image as $k => $v) { ?>
                                        <option value="<?php echo $v['id']; ?>"  <?php echo $data['media_id'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="leftAlist" >
                            <span>BIG IMAGE 大图</span>
                        </div>
                        <div class="leftAlist" >
                            <select name="image_id_s">
                                <option value="0">无图片</option>
                                <?php if (is_array($image)) { ?>
                                    <?php foreach ($image as $k => $v) { ?>
                                        <option value="<?php echo $v['id']; ?>"  <?php echo $data['media_id_s'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="leftAlist" >
                            <span>MINSTREL 歌手</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="minstrel" type="text" value="<?php echo isset($data['minstrel']) ? $data['minstrel'] : '胡彦斌'; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>STYLE 曲风</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="style" type="text" value="<?php echo isset($data['style']) ? $data['style'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>OVERVIEW 简述</span>
                        </div>
                        <div class="leftAlist" >
                            <textarea id="TextArea" name="overview"><?php echo isset($data['overview']) ? $data['overview'] : ""; ?></textarea>
                        </div>
                        <div class="leftAlist" >
                            <span>MUSICS 曲目</span>&nbsp;<a href="javascript:void(0);" class="add_music">+</a>
                        </div>
                        <div class="leftAlist list_music" >
                            <?php if (!empty($data) && !empty($data['list']) && is_array($data['list'])) { ?>
                                <?php foreach ($data['list'] as $lk => $lv) { ?>
                                    <select name="media_id[]">
                                        <option value="0">无音乐</option>
                                        <?php if (is_array($list)) { ?>
                                            <?php foreach ($list as $k => $v) { ?>
                                                <option value="<?php echo $v['id']; ?>"  <?php echo $lv['media_id'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
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
        <div class="leftAlist hide mod_music">
            <select name="media_id[]">
                <option value="0">无音乐</option>
                <?php if (is_array($list)) { ?>
                    <?php foreach ($list as $k => $v) { ?>
                        <option value="<?php echo $v['id']; ?>" ><?php echo $v['name']; ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
        <script >
            $(function () {
                $(".add_music").click(function () {
                    $(".mod_music").children().clone().appendTo('.list_music');
                });
            });
        </script>
    </body>
</html>