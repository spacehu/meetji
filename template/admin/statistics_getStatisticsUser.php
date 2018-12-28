<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18/2/28
 * Time: 12:09
 */
$data = \action\statistics::$data['data'];
$sex=\action\statistics::$data['data']['sex'];
$age=\action\statistics::$data['data']['age'];
$region=\action\statistics::$data['data']['region'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title><?php echo mod\init::$config['shop_name']; ?>-CMS</title>
    <script type="text/javascript" src="js/jquery.js" ></script>
    <script type="application/javascript" src="js/chart/Chart.min.js"></script>
</head>

<body>
<div class="wrapperlogin">
    <div id="sexnum" data-sexnum="<?php
    $n=count($sex);
    for($i=0;$i<$n;$i++){
        if($i==($n-1)){
            echo $sex[$i]['num'];
        }
        else{
            echo $sex[$i]['num'].',';
        }
    }
    ?>"></div>
    <div id="sex" data-sex="<?php
    $n=count($sex);
    for($i=0;$i<$n;$i++){
        if($i==($n-1)){
            echo $sex[$i]['sex'];
        }
        else{
            echo $sex[$i]['sex'].',';
        }
    }
    ?>"></div>
    <div id="agelist" data-age="<?php
    $n=count($age);
    for($i=0;$i<$n;$i++){
        if($i==($n-1)){
            echo $age[$i]['nld'];
        }
        else{
            echo $age[$i]['nld'].',';
        }
    }
    ?>"></div>
    <div id="agenum" data-agenum="<?php
    $n=count($age);
    for($i=0;$i<$n;$i++){
        if($i==($n-1)){
            echo $age[$i]['num'];
        }
        else{
            echo $age[$i]['num'].',';
        }
    }
    ?>"></div>
    <div id="regionlist" data-regionlist="<?php
    $n=count($region);
    for($i=0;$i<$n;$i++){
        if($i==($n-1)){
            echo $region[$i]['name'];
        }
        else{
            echo $region[$i]['name'].',';
        }
    }
    ?>"></div>
    <div id="regionnum" data-regionnum="<?php
    $n=count($region);
    for($i=0;$i<$n;$i++){
        if($i==($n-1)){
            echo $region[$i]['num'];
        }
        else{
            echo $region[$i]['num'].',';
        }
    }
    ?>"></div>
    <p style="text-align: center;">性别</p><canvas id="sexlist" width="200" height="200"></canvas>
    <p style="text-align: center;">年龄</p><canvas id="age" width="200" height="200"></canvas>
    <canvas id="region" width="200" height="200"></canvas>
</div>
<script type="text/javascript">
    var sexnum=$("#sexnum").data("sexnum").split(',');
    var sex=$("#sex").data("sex").split(',');
    for(var a=0;a<sex.length;a++){
        if(sex[a]==""){
            sex[a]="未定义";
        }
        else if(sex[a]=="gentleman"){
            sex[a]="男";
        }
        else if(sex[a]=="lady"){
            sex[a]="女";
        }
    }
    var agelist=$("#agelist").data("age").split(',');
    var agelist1=[]
    for(var i=0;i<agelist.length;i++){
        if(agelist[i]=='c1'){
            agelist1.push("<18");
        }
        else if(agelist[i]=='c2'){
            agelist1.push("19--24");
        }
        else if(agelist[i]=='c3'){
            agelist1.push("25--30");
        }
        else if(agelist[i]=='c4'){
            agelist1.push("31--40");
        }
        else if(agelist[i]=='c5'){
            agelist1.push(">40");
        }
        else if(agelist[i]=='c0'){
            agelist1.push("未定义");
        }
    }
    var agenum=$("#agenum").data("agenum").split(',');
    var regionnum=$("#regionnum").data("regionnum").split(',');
    var regionlist=$("#regionlist").data("regionlist").split(',');
    var ctx = document.getElementById("sexlist").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: sexnum,
                backgroundColor: [
                    'rgba(153, 102, 255, 1)',
                    'rgba(120, 120, 120, 1)',
                    'rgba(255, 159, 64, 0.2)'
                ]
            }],


            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels:sex
        },
        options: {}
    });
    var ctx1 = document.getElementById("age").getContext('2d');
    var myChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            datasets: [{
                data: agenum,
                backgroundColor: [
                    'rgba(255, 0, 0, 1)',
                    'rgba(0, 255, 0, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(0, 0,255, 1)',
                    'rgba(120, 120, 120, 1)',
                    'rgba(80, 0, 120, 1)'

                ]
            }],


            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels:agelist1
        },
        options: {}
    });
    var ctx2=document.getElementById("region").getContext('2d');
    var myBarChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels:regionlist,
            datasets:[
                {
                     label: "地区分布",
                    data: regionnum,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(154, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(154, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(154, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(154, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }
            ]
        },
        options:  {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>
