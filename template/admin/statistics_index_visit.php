<?php
$data = \action\statistics::$data['data'];
$startTime=\action\statistics::$data['startTime'];
$endTime=\action\statistics::$data['endTime'];
$pv=\action\statistics::$data['data']['pv'];
$uv=\action\statistics::$data['data']['uv'];
$iv=\action\statistics::$data['data']['iv'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title><?php echo mod\init::$config['shop_name']; ?>-CMS</title>
    <script type="text/javascript" src="js/jquery.js" ></script>
    <script type="application/javascript" src="js/chart/Chart.min.js"></script>
    <script type="application/javascript" src="lib/laydate/laydate.js"></script>
</head>

<body>
<div class="wrapperlogin">
<!--    PV数据-->
    <div id="pvtimelist" data-pvtimelist="<?php $n=count($pv)-1;
    for ($i=0;$i<$n+1;$i++){
        if($i==$n){
            echo $pv[$i]['time'];
        }
        else{echo $pv[$i]['time'].',';}

    }
    ?>"></div>
    <div id="pvdatalist" data-pvdatalist="<?php $n=count($pv)-1;
    for ($i=0;$i<$n+1;$i++){
        if($i==$n){
            echo $pv[$i]['num'];
        }
        else{echo $pv[$i]['num'].',';}

    }
    ?>"></div>
<!--    UV数据-->
    <div id="uvtimelist" data-uvtimelist="<?php $n=count($uv)-1;
    for ($i=0;$i<$n+1;$i++){
        if($i==$n){
            echo $uv[$i]['time'];
        }
        else{echo $uv[$i]['time'].',';}

    }
    ?>"></div>
    <div id="uvdatalist" data-uvdatalist="<?php $n=count($uv)-1;
    for ($i=0;$i<$n+1;$i++){
        if($i==$n){
            echo $uv[$i]['num'];
        }
        else{echo $uv[$i]['num'].',';}

    }
    ?>"></div>
<!--    IV数据-->
    <div id="ivtimelist" data-ivtimelist="<?php $n=count($iv)-1;
    for ($i=0;$i<$n+1;$i++){
        if($i==$n){
            echo $iv[$i]['time'];
        }
        else{echo $iv[$i]['time'].',';}

    }
    ?>"></div>
    <div id="ivdatalist" data-ivdatalist="<?php $n=count($iv)-1;
    for ($i=0;$i<$n+1;$i++){
        if($i==$n){
            echo $iv[$i]['num'];
        }
        else{echo $iv[$i]['num'].',';}

    }
    ?>"></div>
<!--    search框-->
    <input type="text" placeholder="请选择时间..." value="<?php echo $startTime.' - '.$endTime?>" id="test1">
    <input id="search" type="button" value="查找">
<!--    数据显示-->
    <p id="pvalert"></p>
    <canvas id="pv" width="400" height="400"></canvas>
    <p id="ivalert"></p>
    <canvas id="iv" width="400" height="400"></canvas>
    <p id="uvalert"></p>
    <canvas id="uv" width="400" height="400"></canvas>


</div>
<script type="text/javascript">
    //日期范围 layer日期插件配置
    laydate.render({
        elem: '#test1'
        ,range: true
    });
    // var day=new Date();
    // Date.prototype.format = function(format)
    // {
    //     var o = {
    //         "M+" : this.getMonth()+1, //month
    //         "d+" : this.getDate(),    //day
    //         "h+" : this.getHours(),   //hour
    //         "m+" : this.getMinutes(), //minute
    //         "s+" : this.getSeconds(), //second
    //         "q+" : Math.floor((this.getMonth()+3)/3),  //quarter
    //         "S" : this.getMilliseconds() //millisecond
    //     }
    //     if(/(y+)/.test(format)) format=format.replace(RegExp.$1,
    //         (this.getFullYear()+"").substr(4 - RegExp.$1.length));
    //     for(var k in o)if(new RegExp("("+ k +")").test(format))
    //         format = format.replace(RegExp.$1,
    //             RegExp.$1.length==1 ? o[k] :
    //                 ("00"+ o[k]).substr((""+ o[k]).length));
    //     return format;
    // }
    // var today=day.format("yyyy-MM-dd");
    // var now = today.split('-')
    // now = new Date(Number(now['0']),(Number(now['1'])-1),Number(now['2']));
    // now.setDate(now.getDate()-7);
    // var week=now.format("yyyy-MM-dd");
    //
    // now = today.split('-')
    // now = new Date(Number(now['0']),(Number(now['1'])-1),Number(now['2']));
    // now.setDate(now.getDate()-31);
    // var month=now.format("yyyy-MM-dd");
    // $("#dateselect").change(function () {
    //     var time=$("#dateselect").val();
    //     if(time=="today")
    //     {parent.mainFrame.location.href = 'index.php?a=statistics&m=index&type=visit&startTime='+today;
    //         var options = document.getElementById('dateselect').children;
    //         options[0].selected=true;
    //     }
    //     else if(time=="week")
    //     {parent.mainFrame.location.href = 'index.php?a=statistics&m=index&type=visit&startTime='+week;
    //         var options = document.getElementById('dateselect').children;
    //         options[1].selected=true;
    //     }
    //     else if(time=="month")
    //     {parent.mainFrame.location.href = 'index.php?a=statistics&m=index&type=visit&startTime='+month;
    //         var options = document.getElementById('dateselect').children;
    //         options[2].selected=true;
    //     }
    // });

    // 点击搜索
    $("#search").click(function () {
        var test=$("input#test1").val();
        var text=test.replace(' - ', '&endTime=');
        parent.mainFrame.location.href = 'index.php?a=statistics&m=index&type=visit&startTime='+text;
    })
    // pv绘制
    var pvtime=$("#pvtimelist").data("pvtimelist").split(',');
    var pvdata=$("#pvdatalist").data("pvdatalist");
    if(typeof pvdata!="number"){
   var pvnum=pvdata.split(",")
}
    else{
    var pvnum=[pvdata]
}
    var ctx = document.getElementById("pv").getContext('2d');
    if(pvdata!=""){var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: pvtime,
            datasets: [{
                label: 'PV统计<?php echo "  起止时间： ".$startTime."--".$endTime?>',
                data: pvnum,
                backgroundColor: [
                    // 'rgba(255, 99, 132, 0.2)',
                    // 'rgba(54, 162, 235, 0.2)',
                    // 'rgba(255, 206, 86, 0.2)',
                    // 'rgba(75, 192, 192, 0.2)',
                    // 'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    // 'rgba(255,99,132,1)',
                    // 'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)',
                    // 'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });}
    else{
        $("#pvalert").html("该时间段pv无数据");
        $("#pv").hide();
    }
    // UV绘制
    var uvtime=$("#uvtimelist").data("uvtimelist").split(',');
    var uvdata=$("#uvdatalist").data("uvdatalist");
    if(typeof uvdata!="number"){
        var uvnum=uvdata.split(",")
    }
    else{
        var uvnum=[uvdata]
    }
    var ctx2 = document.getElementById("uv").getContext('2d');
    if(uvdata!=""){
        var myChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: uvtime,
                datasets: [{
                    label: 'UV统计<?php echo "  起止时间： ".$startTime."--".$endTime?>',
                    data: uvnum,
                    backgroundColor: [
                        // 'rgba(255, 99, 132, 0.2)',
                        // 'rgba(54, 162, 235, 0.2)',
                        // 'rgba(255, 206, 86, 0.2)',
                        // 'rgba(75, 192, 192, 0.2)',
                        // 'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 89, 245, 0.2)'
                    ],
                    borderColor: [
                        // 'rgba(255,99,132,1)',
                        // 'rgba(54, 162, 235, 1)',
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    }
    else{
        $("#uvalert").html("该时间段uv无数据");
        $("#uv").hide();
    }
    // IV绘制
    var ivtime=$("#ivtimelist").data("ivtimelist").split(',');
    var ivdata=$("#ivdatalist").data("ivdatalist");
    if(typeof ivdata!="number"){
        var ivnum=ivdata.split(",")
    }
    else{
        var ivnum=[ivdata]
    }
    var ctx1 = document.getElementById("iv").getContext('2d');
    if(ivdata!=""){var myChart1 = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ivtime,
            datasets: [{
                label: 'IV统计<?php echo "  起止时间： ".$startTime."--".$endTime?>',
                data: ivnum,
                backgroundColor: [
                    // 'rgba(255, 99, 132, 0.2)',
                    // 'rgba(54, 162, 235, 0.2)',
                    // 'rgba(255, 206, 86, 0.2)',
                    // 'rgba(75, 192, 192, 0.2)',
                    // 'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 255, 64, 0.2)'
                ],
                borderColor: [
                    // 'rgba(255,99,132,1)',
                    // 'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)',
                    // 'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });}
    else{
        $("#ivalert").html("该时间段iv无数据");
        $("#iv").hide();
    }
</script>
</body>
</html>