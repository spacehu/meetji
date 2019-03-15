<?php
$class = \action\works::$data['class'];
$data = \action\works::$data['data'];
$brand = \action\works::$data['brand'];
$category = \action\works::$data['category'];
$system = \action\works::$data['system'];
$image = \action\works::$data['image'];
$school = \action\works::$data['school'];
$article_image = \action\works::$data['article_image'];
$article_school = \action\works::$data['article_school'];
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
        <!-- 日历插件 -->
        <link rel="stylesheet" href="./css/mobileSelect.css" />
        <script type="text/javascript" src="./js/mobileSelect.js"></script>
        <script type="text/javascript" src="./js/selectDate.js"></script>
        <!-- 日历插件 end -->
        <title>无标题文档</title>
    </head>

    <body>
        <div class="status r_top">
        </div>
        <div class="content">
            <form name="theForm" id="demo" action="./index.php?a=<?php echo $class; ?>&m=updateWork&id=<?php echo $data['id']; ?>" method="post" enctype='multipart/form-data'>
                <div class="pathA ">
                    <div class="leftA">
                        <div class="leftAlist" >
                            <span>NAME 课程名</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="name" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>OVERVIEW 简述</span>
                        </div>
                        <div class="leftAlist" >
                            <textarea id="TextArea" name="overview"><?php echo isset($data['overview']) ? $data['overview'] : ""; ?></textarea>
                        </div>
                        <div class="leftAlist" >
                            <span>TAGS 标签</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="tags" type="text" value="<?php echo isset($data['tags']) ? $data['tags'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>CATEGORY 分类</span>
                        </div>
                        <div class="leftAlist" >
                            <select name="cat_id">
                                <option value="0">请选择</option>
                                <?php if (is_array($category)) { ?>
                                    <?php foreach ($category as $k => $v) { ?>
                                        <option value="<?php echo $v['id']; ?>"  <?php echo $data['cat_id'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="leftAlist" >
                            <span>BRAND 品牌</span>
                        </div>
                        <div class="leftAlist" >
                            <select name="brand_id">
                                <option value="0">请选择</option>
                                <?php if (is_array($brand)) { ?>
                                    <?php foreach ($brand as $k => $v) { ?>
                                        <option value="<?php echo $v['id']; ?>"  <?php echo $data['brand_id'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="leftAlist" >
                            <span>AGE RANGE 年龄段</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text day" name="age_min" type="text" value="<?php echo isset($data['age_min']) ? $data['age_min'] : ''; ?>" />
                                -
                                <input class="text day" name="age_max" type="text" value="<?php echo isset($data['age_max']) ? $data['age_max'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>SUBJECT CATEGORY 学科分类</span>
                        </div>
                        <div class="leftAlist" >
                            <select name="subject_category">
                                <option value="0">请选择</option>
                                <?php if (is_array($system)) { ?>
                                    <?php foreach ($system as $k => $v) { ?>
                                        <option value="<?php echo $v; ?>"  <?php echo $data['subject_category'] == $v ? 'selected' : ''; ?>><?php echo $v; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
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
                            <span>COVER 封面</span>&nbsp;<a href="javascript:void(0);" class="add_image">+</a>
                        </div>
                        <div class="leftAlist list_image" >
                            <?php if (!empty($article_image)) { ?>
                                <?php foreach ($article_image as $lk => $lv) { ?>
                                    <select name="article_image[]">
                                        <option value="0">请选择</option>
                                        <?php if (is_array($image)) { ?>
                                            <?php foreach ($image as $k => $v) { ?>
                                                <option value="<?php echo $v['id']; ?>"  <?php echo $lv['image_id'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="leftAlist" >
                            <span>SCHOOL 校区</span>&nbsp;<a href="javascript:void(0);" class="add_school">+</a>
                        </div>
                        <div class="leftAlist list_school ">
                            <?php if (!empty($article_school)) { ?>
                                <?php foreach ($article_school as $lk => $lv) { ?>
                                    <select name="article_school[]">
                                        <option value="0">请选择</option>
                                        <?php if (is_array($school)) { ?>
                                            <?php foreach ($school as $k => $v) { ?>
                                                <option value="<?php echo $v['id']; ?>"  <?php echo $lv['school_id'] == $v['id'] ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="leftAlist" >
                            <span>PRAISE 好评数量</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="praise" type="text" value="<?php echo isset($data['praise']) ? $data['praise'] : '0'; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>BOOKED 已定数量</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="booked" type="text" value="<?php echo isset($data['booked']) ? $data['booked'] : '0'; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>DURATION 持续时间</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text day" name="start_time" type="text" id="select_0" value="<?php echo isset($data['start_time']) ? $data['start_time'] : date("Y-m-d", strtotime("+1 day")); ?>" />
                                -
                                <input class="text day" name="end_time" type="text" id="select_1" value="<?php echo isset($data['end_time']) ? $data['end_time'] : date("Y-m-d", strtotime("+1 day")); ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>MARKET PRICE 市场价</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="market_price" type="text" value="<?php echo isset($data['market_price']) ? $data['market_price'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>OUT LINK 外部链接</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="out_link" type="text" value="<?php echo isset($data['out_link']) ? $data['out_link'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>CURRENT PRICE 现价(请不要输入中文，如需‘免费’请输入：0)</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="current_price" type="text" value="<?php echo isset($data['current_price']) ? $data['current_price'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>SOURCE COUNT 资源数量</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <input class="text" name="source_count" type="text" value="<?php echo isset($data['source_count']) ? $data['source_count'] : ''; ?>" />
                            </div>
                        </div>
                        <div class="leftAlist" >
                            <span>NEED HIDE 是否隐藏</span>
                        </div>
                        <div class="leftAlist" >
                            <div class="r_row">
                                <select name="need_hide">
                                    <option value="0" <?php if($data['need_hide']==0){echo 'selected';}?> >显示</option>
                                    <option value="1" <?php if($data['need_hide']==1){echo 'selected';}?> >隐藏</option>
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
        <div class="leftAlist hide mod_image">
            <select name="article_image[]">
                <option value="0">请选择</option>
                <?php if (is_array($image)) { ?>
                    <?php foreach ($image as $k => $v) { ?>
                        <option value="<?php echo $v['id']; ?>" ><?php echo $v['name']; ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
        <div class="leftAlist hide mod_school">
            <select name="article_school[]">
                <option value="0">请选择</option>
                <?php if (is_array($school)) { ?>
                    <?php foreach ($school as $k => $v) { ?>
                        <option value="<?php echo $v['id']; ?>" ><?php echo $v['name']; ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
        <script >
            $(function () {
                $(".add_image").click(function () {
                    $(".mod_image").children().clone().appendTo('.list_image');
                });
                $(".add_school").click(function () {
                    $(".mod_school").children().clone().appendTo('.list_school');
                });
                $.selectYY_MM_DD("#select_0");
                $.selectYY_MM_DD("#select_1");
            });
            /** ueditor ***/
            var ue = UE.getEditor('container');
        </script>
    </body>
</html>