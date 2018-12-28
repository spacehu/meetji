$(function () {
    var _province = ['110000', '120000', '310000', '500000'];
    console.log(1);
    $("#province ,#city").on("change", function () {
        var id = $(this).find("option:selected").attr("data-value");
        var region = '<option value="">请选择</option>';
        if (id != null && id != '') {
            region = getRegion(id);
            if ($(this).hasClass('province')) {
                $("#city").html(region);
                if ($.inArray(id, _province) > -1) {
                    if ($("#district").hasClass('text')) {
                        $("#district").removeClass('text');
                        $("#district").addClass('hide');
                    }
                } else {
                    if (!$("#district").hasClass('text')) {
                        $("#district").addClass('text');
                        $("#district").removeClass('hide');
                    }
                }
            } else if ($(this).hasClass('city')) {
                $("#district").html(region);
            }
        } else {
            if ($(this).hasClass('province')) {
                $("#city").html(region);
            }
            $("#district").html(region);
        }
    });
    $(".save_user_info").click(function () {
        if (_dosave == 1) {
            _dosave = 0;
            var _string = {};
            var os = 1;
            $(".list .text").each(function () {
                var _name = $(this).attr("name");
                var _value = $.trim($(this).val());
                if (_value == null || _value == '') {
                    alert("请输入完整信息。" + $(this).attr('name'));
                    os = 0;
                    return false;
                }
                _string[_name] = _value;
            });
            $(".list .radio").each(function () {
                var _name = $(this).attr("name");
                var _value = $.trim($(this).val());
                if ($(this).is(':checked')) {
                    console.log(_value);
                    _string[_name] = _value;
                }
            });
            console.log(os);
            if (os == 1) {
                $.ajax({
                    url: "./account-save_user_info.htm",
                    type: "POST",
                    data: _string,
                    dataType: "json",
                    success: function (data) {
                        alert("记录成功");
                    },
                    complete: function (res) {
                        _dosave = 1;
                    }
                });
            }
        }
        _dosave = 1;
    });
    $(".photo_form").on("change", function () {
        if (_dosave == 0) {
            alert("文件正在上传中，请稍候");
            return false;
        }
        $('.check_photo').val(1);
        $.ajax({
            url: "./account-upload_photo.htm",
            type: "POST",
            cache: false,
            data: new FormData($('#uploadPhoto')[0]),
            processData: false,
            contentType: false,
            dataType: "json",
            beforeSend: function () {
                _dosave = 0;
            },
            success: function (data) {
                $(".photo_value").attr('src', data.data);
            },
            complete: function (res) {
                _dosave = 1;
            }
        });
    });
    $(".save_photo").click(function () {
        if ($('.check_photo').val() == 0) {
            return false;
        }
        if (_dosave == 1) {
            _dosave = 0;
            var _string = {};
            _string["photo"] = $(".photo_value").attr("src");
            $.ajax({
                url: "./account-save_photo.htm",
                type: "POST",
                data: _string,
                dataType: "json",
                success: function (data) {
                    alert("记录成功");
                },
                complete: function (res) {
                    _dosave = 1;
                }
            });
        }
        _dosave = 1;
    });
    $("#brithday").on('click', function () {
        $("#schedule-box").show();
    });
});
var getRegion = function (id) {
    var res = '<option value="">请选择</option>';
    $.ajax({
        async: false,
        url: "./ApiEnum-getRegion-id-" + id + ".htm",
        type: "GET",
        data: {},
        dataType: "json",
        success: function (obj) {
            var _data = obj.data.data;
            for (var i = 0; i < _data.length; i++) {
                res += '<option value="' + _data[i]['id'] + '" data-value="' + _data[i]['id'] + '">' + _data[i]['name'] + '</option>';
            }
        }
    }).done(function (msg) {
        //console.log(msg);
    });
    return res;
};
var _dosave = 1;
var mySchedule = new Schedule({
    el: '#schedule-box',
    //date: '2018-9-20',
    clickCb: function (y, m, d) {
        document.querySelector('#brithday').value = '' + y + '/' + m + '/' + d;
        $("#schedule-box").hide();
    },
    nextMonthCb: function (y, m, d) {
        document.querySelector('#brithday').value = '' + y + '/' + m + '/' + d;
    },
    nextYeayCb: function (y, m, d) {
        document.querySelector('#brithday').value = '' + y + '/' + m + '/' + d;
    },
    prevMonthCb: function (y, m, d) {
        document.querySelector('#brithday').value = '' + y + '/' + m + '/' + d;
    },
    prevYearCb: function (y, m, d) {
        document.querySelector('#brithday').value = '' + y + '/' + m + '/' + d;
    }
});