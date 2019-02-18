$.extend({
    selectYY_MM_DD: function(g, a, k) {
        var d, e, b;
        b = new Date;
        var starYear = b.getFullYear() - 55;
        var maxYear = b.getFullYear() + 5;
        d = starYear;
        e = maxYear;
        b = [10, 0, 0];
        var dateVal = $(g).val();
        if (dateVal != undefined && dateVal != "") {
            dateVal = dateVal.split("-");
            dateVal && 3 == dateVal.length ? b = [dateVal[0] - starYear, dateVal[1] - 1, dateVal[2] - 1] : b = b;
        }
        new MobileSelect({
            trigger: g,
            title: '选择时间',
            wheels: function(a, b) {
                for (var d = [{
                    data: []
                }]; a <= b; a++) {
                    for (var e = {
                        id: a,
                        value: a,
                        childs: []
                    }, c = 1; 12 >= c; c++) {
                        for (var h = [], g = (1 == c || 3 == c || 5 == c || 7 == c || 8 == c || 10 == c || 12 == c) ? 31 : 2 == c ? 0 == a % 4 && 0 != a % 100 ? 29 : 0 == a % 400 ? 29 : 28 : 30, f = 1; f <= g; f++)
                            h.push({
                                id: f < 10 ? '0' + f : f,
                                value: f < 10 ? '0' + f : f
                            });
                        e.childs.push({
                            id: c < 10 ? '0' + c : c,
                            value: c < 10 ? '0' + c : c,
                            childs: h < 10 ? '0' + h : h
                        })
                    }
                    d[0].data.push(e)
                }
                return d
            }(d, e),
            position: b,
            callback: function(a, b) {
                if (k != undefined) {
                    k({
                        year: b[0].id,
                        month: b[1].id,
                        day: b[2].id
                    })
                }
            }
        })
    },
    selectDate_YM: function(el, cbFn) {
        var createDateData = function(info) {
            var dateData = [{
                data: []
            }];
            var childData = [];
            for (var j = 1; j <= 12; j++) {
                if (j < 10) {
                    childData.push({
                        id: '0' + j,
                        value: '0' + j
                    });
                } else {
                    childData.push({
                        id: j,
                        value: j
                    });
                }
            }
            for (var i = info.startYear; i <= info.maxYear; i++) {
                dateData[0].data.push({
                    id: i,
                    value: i,
                    childs: childData
                });
            }
            return dateData;
        };
        var info = {}
          , now = new Date();
        info.nowYear = now.getFullYear();
        info.nowMonth = (now.getMonth() + 1);
        info.startYear = info.nowYear - 60;
        info.maxYear = info.nowYear + 3;
        var dateVal = $(el).val();
        var tempos = [10, 0];
        if (dateVal != undefined && dateVal != "") {
            dateVal = dateVal.split("-");
            dateVal && 2 == dateVal.length ? tempos = [dateVal[0] - info.startYear, dateVal[1] - 1] : tempos = tempos;
        }
        var selectDate_YM = new MobileSelect({
            trigger: el,
            title: '选择年月',
            wheels: createDateData(info),
            position: tempos,
            callback: function(item, data) {
                if (data.length > 1) {
                    var dateInfo = {
                        year: data[0].id,
                        month: data[1].id,
                    };
                } else {
                    var dateInfo = {
                        year: data[0].id,
                    };
                }
                cbFn && cbFn(dateInfo);
            }
        });
    },
    selectDate_YM_END: function(el, cbFn) {
        var createDateData = function(info) {
            var dateData = [{
                data: []
            }];
            var childData = [];
            for (var j = 1; j <= 12; j++) {
                if (j < 10) {
                    childData.push({
                        id: '0' + j,
                        value: '0' + j
                    });
                } else {
                    childData.push({
                        id: j,
                        value: j
                    });
                }
            }
            for (var i = info.startYear; i <= info.maxYear; i++) {
                dateData[0].data.push({
                    id: i,
                    value: i,
                    childs: childData
                });
            }
            if ($(el).data("type") == "end")
                dateData[0].data.push({
                    id: info.maxYear + 1,
                    value: "至今"
                });
            return dateData;
        };
        var info = {}
          , now = new Date();
        info.nowYear = now.getFullYear();
        info.nowMonth = (now.getMonth() + 1);
        info.startYear = info.nowYear - 60;
        info.maxYear = info.nowYear;
        var dateVal = $(el).val();
        var tempos = [10, 0];
        if (dateVal != undefined && dateVal != "") {
            if (dateVal == "至今") {
                tempos = [info.maxYear - info.startYear + 1];
            } else {
                dateVal = dateVal.split("-");
                dateVal && 2 == dateVal.length ? tempos = [dateVal[0] - info.startYear, dateVal[1] - 1] : tempos = tempos;
            }
        }
        var selectDate_YM_END = new MobileSelect({
            trigger: el,
            title: '选择年月',
            wheels: createDateData(info),
            position: tempos,
            callback: function(item, data) {
                if (data.length > 1) {
                    var dateInfo = {
                        year: data[0].id,
                        month: data[1].id,
                    };
                } else {
                    var dateInfo = {
                        year: data[0].id,
                    };
                }
                cbFn && cbFn(dateInfo);
            }
        });
    },
    selectDate_Y: function(el, cbFn) {
        var createDateData = function(info) {
            var dateData = [{
                data: []
            }];
            for (var i = info.startYear; i <= info.maxYear; i++) {
                dateData[0].data.push({
                    id: i,
                    value: i
                });
            }
            return dateData;
        };
        var info = {}
          , now = new Date();
        info.nowYear = now.getFullYear();
        info.nowMonth = (now.getMonth() + 1);
        info.startYear = info.nowYear - 60;
        info.maxYear = info.nowYear;
        var dateVal = $(el).val();
        var tempos = [info.maxYear - info.startYear, 0];
        if (dateVal != undefined && dateVal != "") {
            dateVal = dateVal.split("-");
            dateVal && 1 == dateVal.length ? tempos = [dateVal[0] - info.startYear] : tempos = tempos;
        }
        var selectDate_Y = new MobileSelect({
            trigger: el,
            title: '选择年份',
            wheels: createDateData(info),
            position: tempos,
            callback: function(item, data) {
                if (data.length > 1) {
                    var dateInfo = {
                        year: data[0].id,
                    };
                } else {
                    var dateInfo = {
                        year: data[0].id,
                    };
                }
                cbFn && cbFn(dateInfo);
            }
        });
    },
    select_HH_MM: function(el, cbFn) {
        var createDateData = function(info) {
            var dateData = [{
                data: []
            }];
            var childData = [];
            for (var j = 0; j <= 59; j++) {
                if (j < 10) {
                    childData.push({
                        id: '0' + j,
                        value: '0' + j
                    });
                } else {
                    childData.push({
                        id: j,
                        value: j
                    });
                }
            }
            for (var i = info.startHour; i <= info.maxHour; i++) {
                var pra = i < 10 ? '0' + i : i
                dateData[0].data.push({
                    id: pra,
                    value: pra,
                    childs: childData
                });
            }
            return dateData;
        };
        var info = {};
        info.startHour = 0;
        info.maxHour = 23;
        info.startMinute = 0;
        info.maxMinute = 59;
        var designTimeVal = $(el).val();
        var tempos = [0, 0];
        if (designTimeVal != undefined && designTimeVal != "") {
            designTimeVal = designTimeVal.split(":");
            designTimeVal && 2 == designTimeVal.length ? tempos = [designTimeVal[0] - info.startHour, designTimeVal[1]] : tempos = tempos;
        }
        var select_HH_MM = new MobileSelect({
            trigger: el,
            title: '选择时分',
            connector: ':',
            wheels: createDateData(info),
            position: tempos,
            callback: function(item, data) {
                if (data.length > 1) {
                    var dateInfo = {
                        year: data[0].id,
                        month: data[1].id,
                    };
                } else {
                    var dateInfo = {
                        year: data[0].id,
                    };
                }
                cbFn && cbFn(dateInfo);
            }
        });
    },
    select_HH_MM_SS: function(el, cbFn) {
        var createDateData = function(info) {
            var dateData = [{
                data: []
            }];
            var childData = []
              , childDatass = [];
            for (var j = 0; j <= 59; j++) {
                if (j < 10) {
                    childDatass.push({
                        id: '0' + j,
                        value: '0' + j
                    });
                } else {
                    childDatass.push({
                        id: j,
                        value: j
                    });
                }
            }
            for (var j = 0; j <= 59; j++) {
                if (j < 10) {
                    childData.push({
                        id: '0' + j,
                        value: '0' + j,
                        childs: childDatass
                    });
                } else {
                    childData.push({
                        id: j,
                        value: j,
                        childs: childDatass
                    });
                }
            }
            for (var i = info.startHour; i <= info.maxHour; i++) {
                var pra = i < 10 ? '0' + i : i
                dateData[0].data.push({
                    id: pra,
                    value: pra,
                    childs: childData
                });
            }
            return dateData;
        };
        var info = {};
        info.startHour = 0;
        info.maxHour = 23;
        info.startMinute = 0;
        info.maxMinute = 59;
        var designTimeVal = $(el).val();
        var tempos = [0, 0, 0];
        if (designTimeVal != undefined && designTimeVal != "") {
            designTimeVal = designTimeVal.split(":");
            designTimeVal && 3 == designTimeVal.length ? tempos = [designTimeVal[0] - info.startHour, designTimeVal[1], designTimeVal[2]] : tempos = tempos;
        }
        var select_HH_MM = new MobileSelect({
            trigger: el,
            title: '选择时分秒',
            connector: ':',
            wheels: createDateData(info),
            position: tempos,
            callback: function(item, data) {
                if (data.length > 1) {
                    var dateInfo = {
                        year: data[0].id,
                        month: data[1].id,
                    };
                } else {
                    var dateInfo = {
                        year: data[0].id,
                    };
                }
                cbFn && cbFn(dateInfo);
            }
        });
    }
});
