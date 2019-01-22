<?php
$data = \action\school::$data['data'];
$region = \action\school::$data['region'];
$class = \action\school::$data['class'];
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
            <form name="theForm" id="demo" action="./index.php?a=<?php echo $class; ?>&m=updateSchool&id=<?php echo isset($data['id']) ? $data['id'] : ""; ?>" method="post" enctype='multipart/form-data'>
                <div class="pathA ">
                    <div class="leftA">
                        <div class="leftAlist" >
                            <span>NAME 名称</span>
                        </div>
                        <div class="leftAlist" >
                            <input class="text" name="name" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ""; ?>" />
                        </div>
                        <div class="leftAlist" >
                            <span>PHONE 联系电话</span>
                        </div>
                        <div class="leftAlist" >
                            <input class="text" name="phone" type="text" value="<?php echo isset($data['phone']) ? $data['phone'] : ""; ?>" />
                        </div>
                        <div class="leftAlist" >
                            <span>REGION 地域</span>
                        </div>
                        <div class="leftAlist" >
                            <select name="tempA" id="tempA">
                                <option value="0">请选择</option>
                            </select>
                            <select name="tempB" id="tempB">
                                <option value="0">请选择</option>
                            </select>
                            <select name="tempC" id="tempC">
                                <option value="0">请选择</option>
                            </select>
                            <input type="hidden" name="region_id" id="region_id" value="<?php echo isset($data['region_id']) ? $data['region_id'] : 0; ?>" />
                            <input type="hidden" name="region_name" id="region_name" value="<?php echo isset($data['region_name']) ? $data['region_name'] : ""; ?>" />
                        </div>
                        <div class="leftAlist" >
                            <span>ADDRESS 详细地址</span>
                        </div>
                        <div class="leftAlist" >
                            <input class="text" name="address" type="text" value="<?php echo isset($data['address']) ? $data['address'] : ""; ?>" />
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
        <script>
            var _selectA =<?php echo isset($region['1'])?$region['1']:0; ?>;
            var _selectB =<?php echo isset($region['2'])?$region['2']:0; ?>;
            var _selectC =<?php echo isset($region['3'])?$region['3']:0; ?>;
            $(function () {
                var getRegionList = function (id) {
                    var regionlist;
                    $.ajax({
                        async: false,
                        url: "./v2/ApiEnum-getRegion.htm?id=" + id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            regionlist = data.data.list;
                        },
                        complete: function () {
                        }
                    });
                    return regionlist;
                };
                var setRegionInfo = function (id, name) {
                    $("#region_id").val(id);
                    $("#region_name").val(name);
                };
                var mkOption = function (obj, id) {
                    var html = '<option value="0">请选择</option>';
                    $.each(obj, function (i, n) {
                        var selected = '';
                        if (id == n.id) {
                            selected = 'selected';
                        }
                        html += '<option value="' + n.id + '" ' + selected + '>' + n.name + '</option>';
                    });
                    return html;
                };

                //loading
                $("#tempA").html(mkOption(getRegionList(0), _selectA));
                $("#tempB").html(mkOption(getRegionList(_selectA), _selectB));
                $("#tempC").html(mkOption(getRegionList(_selectB), _selectC));
                //click
                $("#tempA").on('change', function () {
                    $("#tempB").html(mkOption(getRegionList(this.value), 0));
                    $("#tempC").html(mkOption(getRegionList(0), 0));
                    setRegionInfo(this.value, this.options[this.selectedIndex ].text);
                });
                $("#tempB").on('change', function () {
                    $("#tempC").html(mkOption(getRegionList(this.value), 0));
                    setRegionInfo(this.value, this.options[this.selectedIndex ].text);
                });
                $("#tempC").on('change', function () {
                    setRegionInfo(this.value, this.options[this.selectedIndex ].text);
                });
            });
        </script>
    </body>
</html>