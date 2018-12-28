<?php
$data = \action\material::$data['data'];
$Total = \action\material::$data['total'];
$type = \action\material::$data['type'];
$currentPage = \action\material::$data['currentPage'];
$pagesize = \action\material::$data['pagesize'];
$keywords = \action\material::$data['keywords'];
$class = \action\material::$data['class'];
//$imgsrc=\action\material::$data['imgsrc'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script type="text/javascript" src="js/jquery.js" ></script>
        <title>无标题文档</title>
        <script id="hoverscript">
            $(function () {
                $('.button_find').click(function () {
                    window.location.href = 'index.php?a=<?php echo $class; ?>&m=index&keywords=' + $('.keywords').val() + '&type=<?php echo $type; ?>';
                });

            });
        </script>
        <style>

            .hovershow{
                display: block;
                position: absolute;
                z-index: 100;
                width: 100%;
                text-align: center;
                bottom: 0;
                height: 100%;
                line-height: 30px;
                background-color: black;
                opacity: 0;

            }
            .hovershow:hover{
                display: block;
                position: absolute;
                z-index: 100;
                width: 100%;
                text-align: center;
                bottom: 0;
                height: 100%;
                line-height: 30px;
                background-color: black;
                opacity: 0.8;

            }

            .border{
                position: relative;
            }
            .border:hover{
                box-shadow: 10px 10px 5px #888888;
            }

            .hovershow span{
                text-align: center;
                display: block;
                top: 50%;
                color: #EDEDED;
                position: relative;
                height: 30px;
                line-height: 30px;
                /*font-weight: 700;*/
                font-family: "Microsoft YaHei", YaHei, "微软雅黑", SimHei, "黑体";
                font-size: 0.3rem;
            }
            .hovershow a:hover{
                color: red;
            }
            .hovershow a{
                text-align: center;
                display: block;
                color: white;
                position: relative;
                width: 40%;
                margin:0 5%;
                height: 0.1rem;
                line-height: 0.1rem;
                float: left;
                padding: 10px 0;
                font-weight: 700;
                font-family: "Microsoft YaHei", YaHei, "微软雅黑", SimHei, "黑体";
                text-decoration: none;
                font-size: 0.9rem;
            }

        </style>
    </head>

    <body>
        <div class="menu" >
            <input type="text" name="keywords" class="keywords" value="<?php echo isset($keywords) ? $keywords : ""; ?>" />
            <a class="button_find " href="javascript:void(0);">查找</a>
            <a href="javascript:void(0);" class="updateButton"  onclick="javascript:parent.mainFrame.location.href = 'index.php?a=<?php echo $class; ?>&m=getImage'">添加新素材</a>
        </div>
        <div class="content" style="padding-top: 10px;">
<!--            <table class="mytable" cellspacing="0" >-->
<!--                <tr bgcolor="#656565" style=" font-weight:bold; color:#FFFFFF;">-->
<!--                    <td class="td1" >缩略图</td>-->
<!--                    <td class="td1" >素材名</td>-->
<!--                    <td class="td1" width="10%">属于</td>-->
<!--                    <td class="td1" width="20%">操作</td>-->
<!--                </tr>-->
<!--                --><?php
//                $sum_i = 1;
//                if (!empty($data)) {
//                    foreach ($data as $v) {
//                        ?>
<!--                        <tr--><?php //if ($sum_i % 2 != 1) { ?><!--  class="tr2"--><?php //} ?>
<!--                            <td class="td1">-->
<!--                                <img style="height: 100px;width: 100px" class="r_row_img" src=".--><?php //echo $v['original_src']; ?><!--" />-->
<!--                            </td>-->
<!--                            <td class="td1">--><?php //echo $v['name']; ?><!--</td>-->
<!--                            <td class="td1">--><?php //echo $v['add_by']; ?><!--</td>-->
<!---->
<!--                            <td class="td1">-->
<!--                                <a href="index.php?a=--><?php //echo $class; ?><!--&m=getImage&id=--><?php //echo $v['id']; ?><!--">编辑</a>-->
<!--                                <a href="index.php?a=--><?php //echo $class; ?><!--&m=deleteImage&id=--><?php //echo $v['id']; ?><!--" onclick="return confirm('确定将此素材删除?')">删除</a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        --><?php
//                        $sum_i++;
//                    }
//                }
//                ?>
<!--            </table>-->

<!--            拼图模式-->
            <div class="left" style="float: left;width: 33%;">
                <?php
                if(!empty($data)) {
                foreach ($data as $k=>$v) {
                if($k%3==0){
                ?>
                <div id="<?php echo $v['id']?>" class="border" style="margin: 0 10px 30px">
                    <img style="width: 100%;" class="" src=".<?php
                    echo $v['original_src'];
                    ?>"/>

                    <div class="hovershow">
                        <span class="name"><?php echo $v['name']?></span>
                        <a href="index.php?a=<?php echo $class; ?>&m=getImage&id=<?php echo $v['id']; ?>">编辑</a>
                        <a href="index.php?a=<?php echo $class; ?>&m=deleteImage&id=<?php echo $v['id']; ?>" onclick="return confirm('确定将此素材删除?')">删除</a></div>

                </div>
                <?php }}}?>
            </div>
            <div class="middle" style="float: left;width: 33%;">
                <?php
                if(!empty($data)) {
                    foreach ($data as $k=>$v) {
                        if($k%3==1){
                            ?>
                            <div id="<?php echo $v['id']?>" class="border" style="margin: 0 10px 30px">
                                <img style="width: 100%;" class="" src=".<?php
                                echo $v['original_src'];
                                ?>"/>

                                <div class="hovershow">
                                    <span class="name"><?php echo $v['name']?></span>
                                    <a href="index.php?a=<?php echo $class; ?>&m=getImage&id=<?php echo $v['id']; ?>">编辑</a>
                                    <a href="index.php?a=<?php echo $class; ?>&m=deleteImage&id=<?php echo $v['id']; ?>" onclick="return confirm('确定将此素材删除?')">删除</a></div>

                            </div>
                        <?php }}}?>
            </div>
            <div class="right" style="width: 33%;float: right;">
                <?php
                if(!empty($data)) {
                    foreach ($data as $k=>$v) {
                        if($k%3==2){
                            ?>
                            <div id="<?php echo $v['id']?>" class="border" style="margin: 0 10px 30px">
                                <img style="width: 100%;" src=".<?php
                                echo $v['original_src'];
                                ?>"/>
                                <div class="hovershow">
                                    <span class="name"><?php echo $v['name']?></span>
                                    <a href="index.php?a=<?php echo $class; ?>&m=getImage&id=<?php echo $v['id']; ?>">编辑</a>
                                    <a href="index.php?a=<?php echo $class; ?>&m=deleteImage&id=<?php echo $v['id']; ?>" onclick="return confirm('确定将此素材删除?')">删除</a></div>

                            </div>
                        <?php }}}?>
            </div>
            <div class="clear">
            </div>
            <script>
                var currentpage=1;
                $(document).ready(function () {
                    if(window.innerHeight>=document.body.offsetHeight){
                        currentpage++;
                        $.ajax({
                            type:"get",
                            url:'./index.php?a=<?php echo $class; ?>&m=getIndexList&keywords=' + $('.keywords').val() + '&type=<?php echo $type; ?>&keywords=' + $('.keywords').val() +'&currentPage='+currentpage+'&pagesize=9',
                            contentType:"application/json",
                            dataType:'json',
                            success:function(json) {
                                var data=json.data;
                                if(data){
                                    var num=data.length
                                    for(var i=0;i<num;i++){
                                        if(i%3==0){
                                            setTimeout(addhtml(data[i].id,data[i].original_src,data[i].name,json.class,"left"),0)
                                        }
                                        if(i%3==1){
                                            setTimeout(addhtml(data[i].id,data[i].original_src,data[i].name,json.class,"middle"),0)
                                        }
                                        if(i%3==2){
                                            setTimeout(addhtml(data[i].id,data[i].original_src,data[i].name,json.class,"right"),0)
                                        }

                                    }

                                }

                            }
                        })
                    }
                })
                $(document).scroll(function(){
                    var scrollT = $(this).scrollTop(),
                        winH = window.innerHeight,
                        documentH = $(this).height();
                    if(scrollT + winH == documentH||scrollT==documentH){
                        currentpage++;
                        $.ajax({
                            type:"get",
                            url:'./index.php?a=<?php echo $class; ?>&m=getIndexList&keywords=' + $('.keywords').val() + '&type=<?php echo $type; ?>&keywords=' + $('.keywords').val() +'&currentPage='+currentpage+'&pagesize=9',
                            contentType:"application/json",
                            dataType:'json',
                            success:function(json) {
                                var data=json.data;
                                if(data){
                                    var num=data.length
                                    for(var i=0;i<num;i++){
                                        if(i%3==0){
                                            setTimeout(addhtml(data[i].id,data[i].original_src,data[i].name,json.class,"left"),0)
                                        }
                                        if(i%3==1){
                                            setTimeout(addhtml(data[i].id,data[i].original_src,data[i].name,json.class,"middle"),0)
                                        }
                                        if(i%3==2){
                                            setTimeout(addhtml(data[i].id,data[i].original_src,data[i].name,json.class,"right"),0)
                                        }

                                    }

                                }

                            }
                        })
                    }
                });
                function addhtml(id,src,name,cls,div) {
                    html='<div id="'+id+'" class="border" style="margin: 0 10px 30px">' +
                        ' <img style="width: 100%;" src=".'+src+'"  />' +
                        '<div class="hovershow">' +
                        '<span class="name">'+name+'</span>' +
                        '<a href="index.php?a='+cls+'&m=getImage&id='+id+'">编辑</a>' +
                        '<a href="index.php?a='+cls+'&m=deleteImage&id='+id+'" onclick="return confirm(\'确定将此素材删除?\')">删除</a></div>' +
                        '</div>'
                    $("."+div).append(html)
                }
                function addscript(id) {
                    script1=document.getElementById("hoverscript")

                    scripttext='$(function(){$("#'+id+'").hover(function () {' +
                        '$("#'+id+'.hovershow").toggle();' +
                        ' });})';
                    var t=document.createTextNode(scripttext);
                    script1.appendChild(t);
                }

            </script>
<!--            <div class="num_bar">-->
<!--                总数<b>--><?php //echo $Total; ?><!--</b>-->
<!--            </div>-->
<!--            --><?php
//            $url = 'index.php?a=' . $class . '&m=index&keywords=' . $keywords . '&type=' . $type;
//            $Totalpage = ceil($Total / mod\init::$config['page_width']);
//            include_once 'page.php';
//            ?>
        </div>
    </body>
</html>

