$(function() {
    $(document).on('change', '.seltNumb', function(event) {
        var obj = $(this);
        var _val = obj.val();
        var _id = obj.parent().find('.seltVal').data("id");
        obj.parent().find('.seltVal').html(_val);
        // var ck = obj.parent().find('.wineIs');
        // ck.val(_id + "," + _val);
        // if (_val > 0) {
        //     ck.prop({
        //         "checked": true
        //     });
        // } else {
        //     ck.prop({
        //         "checked": false
        //     });
        // }

        var total = 0;
        $(".seltVal").each(function(index, el) {
            var unit = $(el).data('price');
            var numb = $(el).parent().find('.seltNumb').val();
            var el_total = floatCount(numb, unit, "mull");
            //console.log("el_total:",numb,"*",unit,"=",el_total);
            total = floatCount(el_total, total, "add");
            //console.log("total:",el_total,"+",total,"=",total);
            if ($(".seltVal").length == index + 1) {
                $("#TotalVal").children('em').html(total.toFixed(2));
                $("#Total").val(total.toFixed(2));
            }
        });

    });
	$(document).on('focus', '.mailRow .txt', function(event) {
		$(this).removeClass('error');
	});
});

//显示提示信息
function addTips(_form, tips) {
    if ($("#Tips").length <= 0) {
        var style = "";
        if (_form.height() <= 100) {
            style = "top:10px;";
        }
        var tips = '<div id="Tips" class="error" style=' + style + '><span>' + tips + '</span></div>';
        _form.append(tips);
    }
}
//隐藏提示信息
function hideTips() {
    setTimeout(function () { if ($("#Tips").length > 0) { $("#Tips").animate({ "opacity": "hide" }, 800, function () { $(this).remove(); error = ""; }) } }, 1000);
}
function checkForm(_form, obj) {
    var _val = obj.val();
    var verify = obj.data("verify");
    var type = obj.data("type");
    type = type == undefined || type == null ? "" : type;
    if (_val.length <= 0) {//验证不能为空
        //if (_val.length <= 0) {
        tips ="'"+ type +"' Can`t be empty";
        addTips(_form, tips)
        return false;
        //}
    } else {
        if (verify == "passnum") {//密码长度验证
            var exper = fromexper("passnum", "", obj);
            if (!exper) {
                tips = "密码长度只能为6-20位！";
                //addTips(_form, tips)
                return false;
            } else {
                return true;
            }
        } else if (verify == "RePassword") {
            var cPassword = $("#CPassword").val();
            var rePassword = $("#RePassword").val();
            if (rePassword.length <= 0) {
                tips = '请再次确认新密码';
                //addTips(_form, tips)
                return false;
            } else if (cPassword != rePassword) {
                tips = '新密码不一致，请确认';
                //addTips(_form, tips)
                return false;
            }

        }
        else {//其他验证
            var exper = fromexper("replace", verify, obj);
            if (!exper) {
                tips = "Please enter the correct '" + type + "'";
                addTips(_form, tips)
                return false;
            } else {
                return true;
            }
        }
    }
}
//表单提交
function formPost(obj, form) {
    var obj = $(obj);
    var _form = obj.closest("form");
    if (_form[0] == undefined) {
        if (form != "" && form != null && form != undefined) {
            _form = $("#" + form);
        } else {
            _form = $(".pageBox").find("form");
        }
    }
    var url = _form.attr("action");
    var error = "";
    var tips = '';
    var form_type = _form.data("form-type");

    //遍历验证
    _form.find(".txt").each(function (k, t) {
        var _val = $(t).val();
        var verify = $(t).data("verify");
        var type = $(t).data("type");
        if (verify != undefined && verify != null) {
            var check = checkForm(_form, $(t));
            if (!check) { $(t).addClass('error'); return false;}
        }
    });
    var _loading = 'Is submitting...';
    var txt = obj.find("span").html();
    if ($(".error").length <= 0 && error == "") {
        //验证通过
        var data = _form.serialize();
        if (form_type == undefined || form_type == "" || form_type == null) {//无form_type，则ajax跳转
            /**** Ajax ****/
            if (!obj.hasClass("isLoading")) {
                obj.addClass("isLoading");
                obj.find("span").html(_loading);
                $.post(url, data, function (result) {
                    obj.removeClass("isLoading");
                    obj.find("span").html(txt);
                    var arr = result.split('|');
                    if (arr[0] == 0) {
                        tips = arr[1];
                        addTips(_form, tips)
                        hideTips();
                    } else if (arr[0] == 1) {
                        tips = arr[1];
                        addTips(_form, tips);
                        if (arr.length == 3) {
                            if (arr[2] == "reload") {
                                setTimeout(function () { window.location.reload(); }, 1500);
                            } else if (arr[2] == "goback") {
                                setTimeout(function () { history.go(-1); }, 1500);
                            } else {
                                setTimeout(function () { location.href = arr[2]; }, 1500);
                            }
                            hideTips();
                        }
                    }
                });
            }
        } else {
        		console.log(data);
            obj.addClass("isLoading");
            obj.find("span").html(_loading);
            /**** 页面跳转 ****/
            _form.submit();
        }
    }
    hideTips();
}
/**
type:验证类型
obj:验证数据
**/
var regexEnum = {
    "nonumber": "^([a-zA-Z\u4E00-\u9FA5].*$)|(^.*[a-zA-Z\u4E00-\u9FA5]$)",
    "intenum": "^[0-9]\\d*$",
    "email": "^\\w+((-\\w+)|(\\.\\w+))*\\@[A-Za-z0-9]+((\\.|-)[A-Za-z0-9]+)*\\.[A-Za-z0-9]+$",
    "url": "^http[s]?:\\/\\/([\\w-]+\\.)+[\\w-]+([\\w-./?%&=]*)?$",
    "mobile": "^(\\+86)?(1[0-9]{10})$",
    "phone": "^(\\+86|0|17951)?(13[0-9]|15[0-9]|18[0-9]|14[0-9])[0-9]{8}$",
    "notempty": "^\\S+$",
    "date": "^\\d{4}(\\-|\\/|.)\\d{1,2}\\1\\d{1,2}$",
    "qq": "^[1-9]*[1-9][0-9]*$",
    "tel": "^(([0\\+]\\d{2,3}-)?(0\\d{2,3})-)?(\\d{7,8})(-(\\d{3,}))?$",
    "username": "^\\w+$",
    "idcard": "^[1-9]([0-9]{14}|[0-9]{17}|[0-9]{16}(X|x))$",
    "not_email": "^((?!@).)+$",
    "order": "^(kx|KX)\\d+-\\d+$"
};
function fromexper(type, type2, obj, obj2) {
    var val = obj.val().replace(/(^\s*)|(\s*$)/g, "");
    //console.log(val)
    var i = true;
    switch (type) {
        case 'passWord':
            var val2 = obj2.val().trim();
            if (val != val2) { i = false; };
            break;
        case 'passnum':
            if (val.length > 20 || val.length < 6) { i = false; };
            break;
        case 'replace':
            if (type2 == "notempty") {
                if (val.length <= 0) { i = false; };
            } else {
                var reg = new RegExp(regexEnum[type2]);
                i = reg.test(val);
            }
            break;

    }
    return i;
}

/**
 ** 浮点数加、减、乘、除
 ** arg1、arg2 两个计算数
 ** type:计算类型add,sub,mul,div
 **/
function floatCount(arg1, arg2, type) {
    if (type == "add" || type == "sub") {
        var r1, r2, m, c;
        try {
            r1 = arg1.toString().split(".")[1].length;
        } catch (e) {
            r1 = 0;
        }
        try {
            r2 = arg2.toString().split(".")[1].length;
        } catch (e) {
            r2 = 0;
        }
        if (type == "add") { //加
            c = Math.abs(r1 - r2);
            m = Math.pow(10, Math.max(r1, r2));
            if (c > 0) {
                var cm = Math.pow(10, c);
                if (r1 > r2) {
                    arg1 = Number(arg1.toString().replace(".", ""));
                    arg2 = Number(arg2.toString().replace(".", "")) * cm;
                } else {
                    arg1 = Number(arg1.toString().replace(".", "")) * cm;
                    arg2 = Number(arg2.toString().replace(".", ""));
                }
            } else {
                arg1 = Number(arg1.toString().replace(".", ""));
                arg2 = Number(arg2.toString().replace(".", ""));
            }
            var numb = (arg1 + arg2) / m;
            return numb; //.toFixed(2);
        } else { //减
            m = Math.pow(10, Math.max(r1, r2)); //last modify by deeka //动态控制精度长度
            c = (r1 >= r2) ? r1 : r2;
            var numb = ((arg1 * m - arg2 * m) / m); //.toFixed(c);
            return numb;
        }
    } else if (type == "mull") { //乘
        var m = 0,
            s1 = arg1.toString(),
            s2 = arg2.toString();
        try {
            m += s1.split(".")[1].length;
        } catch (e) {}
        try {
            m += s2.split(".")[1].length;
        } catch (e) {}
        var numb = Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m);
        return numb; //.toFixed(2);
    } else if (type == "div") { //除
        var t1 = 0,
            t2 = 0,
            r1, r2;
        try {
            t1 = arg1.toString().split(".")[1].length;
        } catch (e) {}
        try {
            t2 = arg2.toString().split(".")[1].length;
        } catch (e) {}
        with(Math) {
            r1 = Number(arg1.toString().replace(".", ""));
            r2 = Number(arg2.toString().replace(".", ""));
            var numb = (r1 / r2) * pow(10, t2 - t1);
            return numb; //.toFixed(2);
        }
    } ////3279/30*产假天数，3000补贴
}
