<?php
$data = \action\statistics::$data['data'];
$startTime=\action\statistics::$data['startTime'];
$endTime=\action\statistics::$data['endTime'];
$page=\action\statistics::$data['page'];
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
    <div id="uvtimelist" data-uvtimelist="
<?php $n=count($uv)-1;
    for ($i=0;$i<$n+1;$i++){
        if($i==$n){
            echo $uv[$i]['time'];
        }
        else{echo $uv[$i]['time'].',';}

    }
    ?>
"></div>
    <div id="uvdatalist" data-uvdatalist="<?php $n=count($uv)-1;
    for ($i=0;$i<$n+1;$i++){
        if($i==$n){
            echo $uv[$i]['num'];
        }
        else{echo $uv[$i]['num'].',';}

    }
    ?>"></div>
    <div id="ivtimelist" data-ivtimelist="
<?php $n=count($iv)-1;
    for ($i=0;$i<$n+1;$i++){
        if($i==$n){
            echo $iv[$i]['time'];
        }
        else{echo $iv[$i]['time'].',';}

    }
    ?>
"></div>
    <div id="ivdatalist" data-ivdatalist="<?php $n=count($iv)-1;
    for ($i=0;$i<$n+1;$i++){
        if($i==$n){
            echo $iv[$i]['num'];
        }
        else{echo $iv[$i]['num'].',';}

    }
    ?>"></div>
    <div id="pageURL" data-pageurl="<?php echo $page?>"></div>
    <div>
        <span>当前统计url:<?php echo $page ?></span>
        <input id="pagetxt" type="text"  placeholder="输入页面url" value="<?php echo $page;?>">
    <input type="text" placeholder="请选择时间..." value="<?php echo $startTime.' - '.$endTime?>"  id="test1">
    <input id="search" type="button" value="查找">
    </div>
    <p id="pvalert"></p>
    <canvas id="pv" width="400" height="400"></canvas>
    <p id="uvalert"></p>
    <canvas id="uv" width="400" height="400"></canvas>
    <p id="ivalert"></p>
    <canvas id="iv" width="400" height="400"></canvas>
</div>



<script type="text/javascript">
    //日期范围
    laydate.render({
        elem: '#test1'
        ,range: true
    });
    $("#search").click(function () {
        var pagetxt=$("#pagetxt").val();
        var pagedefault=$("#pageURL").data("pageurl")
        var test=$("input#test1").val();
        var text=test.replace(' - ', '&endTime=');
        if(pagetxt!=""){
            parent.mainFrame.location.href = 'index.php?a=statistics&m=index&type=page&page='+pagetxt+'&startTime='+text;}
        else{
            parent.mainFrame.location.href = 'index.php?a=statistics&m=index&type=page&page='+pagedefault+'&startTime='+text;
        }
    })

    var pvtime=$("#pvtimelist").data("pvtimelist").split(',');
    var pvdata=$("#pvdatalist").data("pvdatalist");
    if(typeof pvdata!="number"){
        var pvnum=pvdata.split(",")
    }
    else{
        var pvnum=[pvdata]
    }
    var ivtime=$("#ivtimelist").data("ivtimelist").split(',');
    var ivdata=$("#ivdatalist").data("ivdatalist");
    if(typeof ivdata!="number"){
        var ivnum=ivdata.split(",")
    }
    else{
        var ivnum=[ivdata]
    }
    var uvtime=$("#uvtimelist").data("uvtimelist").split(',');
    var uvdata=$("#uvdatalist").data("uvdatalist");
    if(typeof uvdata!="number"){
        var uvnum=uvdata.split(",")
    }
    else{
        var uvnum=[uvdata]
    }
    var ctx = document.getElementById("pv").getContext('2d');
    if(pvdata!="") {
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: pvtime,
                datasets: [{
                    label: '<?php echo $actionlist[$action]?>PV统计<?php echo "  起止时间： " . $startTime . "--" . $endTime?>',
                    data: pvnum,
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
    else {
        $("#pvalert").html("该时间段pv无数据");
        $("#pv").hide();
    }
    var ctx1 = document.getElementById("iv").getContext('2d');
    if(ivdata!="") {
        var myChart1 = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ivtime,
                datasets: [{
                    label: '<?php echo $actionlist[$action]?>IV统计<?php echo "  起止时间： " . $startTime . "--" . $endTime?>',
                    data: ivnum,
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
    else {
        $("#ivalert").html("该时间段iv无数据");
        $("#iv").hide();
    }
</script>
<script type="text/javascript">
    var ctx = document.getElementById("uv").getContext('2d');
    if(uvdata!="") {
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: uvtime,
                datasets: [{
                    label: '<?php echo $actionlist[$action]?>UV统计<?php echo "  起止时间： " . $startTime . "--" . $endTime?>',
                    data: uvnum,
                    backgroundColor: [
                        'rgba(255, 89, 245, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
    else {
        $("#uvalert").html("该时间段uv无数据");
        $("#uv").hide();
    }
</script>
</body>
</html>