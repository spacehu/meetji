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
            <form name="theForm" id="demo" action="./index.php?a=show&m=updateArtVideo&id=<?php echo $data['id']; ?>" method="post" enctype='multipart/form-data'>
                <div class="pathA ">
                    <div class="leftA">
                        <div class="leftAlist" >
                            <span>NAME 视频名</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="name" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" />
                                <input class="text" name="type" type="hidden" value="<?php echo $type; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>ORDER 排序</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="order_by" type="text" value="<?php echo isset($data['order_by']) ? $data['order_by'] : '50'; ?>" />
                            </div>
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
                            <span>TYPE 视频类型</span>
                        </div>
                        <div class="leftAlist" >
                            <select name="type">
                                <option value="0">无视频</option>
                                <option value="mv"  <?php echo $data['type'] == 'mv' ? 'selected' : ''; ?>>MV</option>
                                <option value="concert"  <?php echo $data['type'] == 'concert' ? 'selected' : ''; ?>>演唱会</option>
                                <option value="live"  <?php echo $data['type'] == 'live' ? 'selected' : ''; ?>>现场LIVE</option>
                                <option value="joker"  <?php echo $data['type'] == 'joker' ? 'selected' : ''; ?>>太牛樂</option>
                            </select>
                        </div>
                        <div class="leftAlist" >
                            <span>COVER 封面</span>
                        </div>
                        <div class="leftAlist list_music" >
                            <select name="image_id">
                                <option value="0">无封面</option>
                                <?php if (is_array($image)) { ?>
                                    <?php foreach ($image as $k => $v) { ?>
                                        <option value="<?php echo $v['id']; ?>"  <?php echo $data['image_id'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
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
                            <span>SRC 视频路径</span>
                        </div>
                        <div class="leftAlist list_music" >
                            <select name="media_id">
                                <option value="0">无视频</option>
                                <?php if (is_array($list)) { ?>
                                    <?php foreach ($list as $k => $v) { ?>
                                        <option value="<?php echo $v['id']; ?>"  <?php echo $data['media_id'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
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