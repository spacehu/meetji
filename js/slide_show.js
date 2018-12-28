$(function () {
    console.log(1);
    /*SlideShow*/
    $(".slide_show .point .a").on("click", function () {
        var _key = $(".point .a").index($(this));
        //console.log(_key);
        $(".slide_show .bg").attr("src", $(".slide_show .img").eq(_key).attr("src"));
        $(".slide_show .img").animate({opacity: 'hide'}, 1000).eq(_key).animate({opacity: 'show'}, 1000);
    });

    var _index = $(".slide_show .point .a").size() - 1;
    var i = 0;
    start(i, _index);

});
var start = function (i, _index) {
    console.log(i);
    $(".slide_show .point .a").eq(i).click();
    if (i < _index) {
        i++;
    } else {
        i = 0;
    }
    timeoutId = setTimeout("start(" + i + "," + _index + ")", 4000);
    //console.log(timeoutId);
};