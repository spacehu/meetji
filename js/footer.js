$(function () {
    var _errorCode = new Array(8);
    _errorCode['errorSql'] = '注册失败请联系管理员';
    _errorCode['errorPasswordDifferent'] = '密码与确认密码不同';
    _errorCode['errorPasswordLength'] = '密码长度过短，请超过6位';
    _errorCode['errorSms'] = '手机号码验证失败，可能收到验证码超过15分钟';
    _errorCode['errorUser'] = '已存在的手机号码';
    _errorCode['emptyUser'] = '不存在的用户';
    _errorCode['errorPassword'] = '密码错误';
    _errorCode['emptyUserInfo'] = '用户信息未完善';


    $(".login,.regist").on('click', function () {
        $(".footShadow").show();
        if ($(this).hasClass("login")) {
            show_head("login_window");
            $(".login_window").show();
            $(".regist_window").hide();
        }
        if ($(this).hasClass("regist")) {
            show_head("regist_window");
            $(".regist_window").show();
            $(".login_window").hide();
        }
    });
    $(".get_code").on('click', function () {
        if (_getcode == 1) {
            var _phone = $(".phone").val();
            $.ajax({
                url: "./ApiSms-sendSms-phone-" + _phone + ".htm",
                //url: "./ApiSms-getSms.htm",
                type: "GET",
                dataType: "json",
                success: function (data) {

                },
                complete: function () {
                    _getcode = 0;
                    startSeconds(59);
                }
            });
        }
    });
    $(".do_regist").on('click', function () {
        if (_doregist == 1) {
            _doregist = 0;
            var _string = {};
            var os = 1;
            $(".regist_window .text").each(function () {
                var _name = $(this).attr("name");
                var _value = $.trim($(this).val());
                if (_value == null || _value == '') {
                    alert("请输入完整信息。" + $(this).attr('name'));
                    os = 0;
                    return false;
                }
                _string[_name] = _value;
            });
            console.log(os);
            if (os == 1) {
                $.ajax({
                    url: "./account-regist.htm",
                    type: "POST",
                    data: _string,
                    dataType: "json",
                    success: function (data) {
                        if (isNaN(data)) {
                            alert(_errorCode[data]);
                        } else {
                            alert("恭喜您注册成功");
                            $(".login").click();
                        }
                    },
                    complete: function (res) {
                        _doregist = 1;
                    }
                });
            }
        }
    });
    $(".do_login").on('click', function () {
        if (_dologin == 1) {
            _dologin = 0;
            var _string = {};
            var os = 1;
            $(".login_window .text").each(function () {
                var _name = $(this).attr("name");
                var _value = $.trim($(this).val());
                if (_value == null || _value == '') {
                    alert("请输入完整信息。" + $(this).attr('name'));
                    os = 0;
                    return false;
                }
                _string[_name] = _value;
            });
            console.log(os);
            if (os == 1) {
                $.ajax({
                    url: "./account-login.htm",
                    type: "POST",
                    data: _string,
                    dataType: "json",
                    success: function (data) {
                        if (data.success) {
                            var _successStr = "登录成功";
                            if (data.code == 'emptyUserInfo') {
                                _successStr += "，" + _errorCode[data.code];
                            }
                            alert(_successStr);
                            //登录后跳转
                            window.location.href = './account-center.htm';
                        } else {
                            alert(_errorCode[data.code]);
                        }
                    },
                    complete: function (res) {
                        _dologin = 1;
                    }
                });
            }
        }
    });
    $(".account .menu").on('click', function () {
        $(this).next().show();
    });
});
var show_head = function (_class) {
    var testContTop = ($(window).height() - $("." + _class).height()) / 2; //计算弹出的框距离页面顶部的距离
    var testContWidth = ($(window).width() - $("." + _class).width()) / 2; //计算弹出的框距离页面左边的距离
    $("." + _class).css({
        "top": testContTop-30,
        "left": testContWidth-50
    });
};
var startSeconds = function (_seconds) {
    $(".get_code").html(_seconds + "后可再尝试");
    _seconds--;
    if (_seconds >= 0) {
        setTimeout("startSeconds(" + _seconds + "); ", 1000);
    } else {
        $(".get_code").html("获取短信验证码");
        _getcode = 1;
    }
};
var _getcode = 1;
var _doregist = 1;
var _dologin = 1;