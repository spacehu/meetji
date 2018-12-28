<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18/2/28
 * Time: 12:09
 */
$data = \action\statistics::$data['data'];
$source=\action\statistics::$data['source'];
$sources=\action\statistics::$data['sources'];
$startTime=\action\statistics::$data['startTime'];
$endTime=\action\statistics::$data['endTime'];
$total=\action\statistics::$data['total'];
$pagesize=\action\statistics::$data['pagesize'];
$currentpage=\action\statistics::$data['currentPage'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/page.css" />
    <title><?php echo mod\init::$config['shop_name']; ?>-CMS</title>
    <script type="text/javascript" src="js/jquery.js" ></script>
    <script type="application/javascript" src="js/chart/Chart.min.js"></script>
    <script type="application/javascript" src="lib/laydate/laydate.js"></script>
    <script type="application/javascript" src="js/page.js"></script>
<!--    <script type="application/javascript" src="js/artTemplate.js"></script>-->
</head>

<body>
<div id="pagelist" data-total="<?php echo $total?>" data-pagesize="<?php echo $pagesize?>" data-currentpage="<?php echo $currentpage?>" data-source="<?php echo $source?>"></div>
<div class="wrapperlogin">

    <div>
        <div id="source" data-source="<?php $source?>"></div>
        <input type="text" placeholder="请选择时间..." value="<?php echo $startTime.' - '.$endTime?>"  id="test1">

        <select id="updata">
            <option value="">——请选择抽奖活动——</option>
            <?php
                $n=count($sources);
                for($i=0;$i<$n;$i++) {

                    ?>
                    <option value="<?php echo $sources[$i]['source'] ?>"><?php echo $sources[$i]['source'] ?></option>
                    <?php
                }?>
        </select>
        <input id="search" type="button" value="查找">
        <p style="text-align: center;">当前统计活动：<?php echo $source?>&nbsp;&nbsp;&nbsp;起止时间：<?php echo $startTime.'----'.$endTime?></p>
        <p style="text-align: center;">参与人数：<?php
//            if($data){
//            echo count($data);}
//            else{
//                echo 0;
//            }
            echo $total;?>
        <table>
            <tr>
                <th style="width: 100px">昵称</th>
                <th style="width: 100px">电话</th>
                <th style="width: 100px">注册时间</th>
                <th style="width: 100px">省份</th>
                <th style="width: 100px">城市</th>
                <th style="width: 100px">地区</th>
                <th style="width: 100px">兑换码</th>
                <th style="width: 100px">是否已兑换</th>
            </tr>

                <?php
                $num=count($data);
                for($i=0;$i<$num;$i++){
                    if($data[$i]['code']!=""&&$data[$i]['code']!=null&&$data[$i]['code']!="0"){
                        if($data[$i]['code_used']==0){
                    ?>

            <tr>
                <td style="width: 100px;text-align: center;color: red"><?php echo $data[$i]['name']?></td>
                <td style="width: 100px;text-align: center;color: red"><?php echo $data[$i]['phone']?></td>
                <td style="width: 100px;text-align: center;color: red"><?php echo $data[$i]['add-time']?></td>
                <td style="width: 100px;text-align: center;color: red"><?php echo $data[$i]['province']?></td>
                <td style="width: 100px;text-align: center;color: red"><?php echo $data[$i]['city']?></td>
                <td style="width: 100px;text-align: center;color: red"><?php echo $data[$i]['district']?></td>
                <td style="width: 100px;text-align: center;color: red"><?php echo $data[$i]['code']?></td>
                <td style="width: 100px;text-align: center;color: red">否</td>
            </tr>
                <?php }
                else{
                            ?>
                    <tr>
                        <td style="width: 100px;text-align: center;color: green"><?php echo $data[$i]['name']?></td>
                        <td style="width: 100px;text-align: center;color: green"><?php echo $data[$i]['phone']?></td>
                        <td style="width: 100px;text-align: center;color: green"><?php echo $data[$i]['add-time']?></td>
                        <td style="width: 100px;text-align: center;color: green"><?php echo $data[$i]['province']?></td>
                        <td style="width: 100px;text-align: center;color: green"><?php echo $data[$i]['city']?></td>
                        <td style="width: 100px;text-align: center;color: green"><?php echo $data[$i]['district']?></td>
                        <td style="width: 100px;text-align: center;color: green">是</td>
                    </tr>

                    <?php
                }
                    }
                else if($data){
                ?>
                    <tr>
                        <td style="width: 100px;text-align: center;"><?php echo $data[$i]['name']?></td>
                        <td style="width: 100px;text-align: center;"><?php echo $data[$i]['phone']?></td>
                        <td style="width: 100px;text-align: center;"><?php echo $data[$i]['add-time']?></td>
                        <td style="width: 100px;text-align: center;"><?php echo $data[$i]['province']?></td>
                        <td style="width: 100px;text-align: center;"><?php echo $data[$i]['city']?></td>
                        <td style="width: 100px;text-align: center;"><?php echo $data[$i]['district']?></td>
                        <td style="width: 100px;text-align: center;">未中奖</td>
                        <td style="width: 100px;text-align: center;"></td>
                    </tr>
                <?php }}?>
        </table>
    </div>
    <div id="pagination1" style="float: right;"></div>
</div>
<script type="text/javascript">
    //日期范围Provisional
    laydate.render({
        elem: '#test1'
        ,range: true
    });
$("#search").click(function () {
    var updatatxt=$("#updata").val();
    // console.log(pagedefault);
    var test=$("input#test1").val();
    var text=test.replace(' - ', '&endTime=');
if(updatatxt!=null&&updatatxt!=""){
    parent.mainFrame.location.href = 'index.php?a=statistics&m=getBonus&startTime='+text+'&source='+updatatxt;}
else{
    parent.mainFrame.location.href = 'index.php?a=statistics&m=getBonus&startTime='+text;
}
})
function addstyle() {
    $("td").css({"border":"1px solid black"})
}
setTimeout(addstyle(),1000)
    var currentpage1=$("#pagelist").data('currentpage');
    var total=$("#pagelist").data('total');
    var pagesize=$("#pagelist").data('pagesize');
$(function () {
    $("#pagination1").pagination({
        currentPage: currentpage1,
        totalPage: Math.ceil(total/pagesize),
        callback: function(current) {
            var test1=$("input#test1").val();
            var text1=test1.replace(' - ', '&endTime=');
            var source=$("#pagelist").data('source');
            parent.mainFrame.location.href = 'index.php?a=statistics&m=getBonus&startTime='+text1+'&source='+source+'&currentPage='+current;
        }
    });
})
</script>
</body>
</html>
