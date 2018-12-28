$(function () {
    console.log(1);
    /*SlideShow*/
    $(".videoRight .point .a").on("click", function () {
        var _key = $(".point .a").index($(this));
        var _top = '-' + (_key * 204) + 'px';
        console.log(_top);
        $(".innerOverview").attr({style: "top:" + _top});
    });

    $(".rowImage img").on("click", function () {
        $(".shadle").show();
        var _src = $(this).next().attr("src");
        $(".photo_overview .photo").attr("src", _src);
        openDiv("photo_overview");

    });
    $(".close,.shadle").on("click", function () {
        $(".shadle").hide();
        closeDiv("photo_overview");
    });
});

function openDiv(obj) {
    if (!document.getElementById(obj))
        return false;
    var d = document.getElementById(obj);
    d.style.visibility = 'visible';
    d.style.display = 'block';
    var wd = window.top.document.documentElement.clientWidth - d.offsetWidth;
    var ht = window.top.document.documentElement.clientHeight + d.offsetHeight;
    d.style.left = (wd / 2) + 'px';
    d.style.top = (ht / 2) + 'px';
    window.onresize = function () {
        openDiv(obj);
    };
}
//关闭弹出层
function closeDiv(obj) {
    var d = document.getElementById(obj);
    d.style.visibility = 'hidden';
    d.style.display = 'none';
}