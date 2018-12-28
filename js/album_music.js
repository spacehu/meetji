var play_list = [];
$(function () {
    console.log(1);
    /*Music*/
    $(".songs").on("click", function () {
        var _key = $(".songs").index($(this));
        $(".songs").removeClass("color");
        $(this).addClass("color");
        start(_key);
    });
    $(".play_all").on("click", function () {
        var _index = $(".songs").size();
        addMusic(_index);
        //alert("comming soon.");
        startPlayList(0);
        $("#myAudio").trigger("paused");
    });
});
var addMusic = function (_index) {
    for (var i = 0; i < _index; i++) {
        play_list[i] = music_list[i].src;
    }
    //console.log(play_list);
};
var start = function (i) {
    console.log(music_list[i].src);
    play(music_list[i].src);
};
var startPlayList = function (i) {
    //console.log(play_list[i]);
    play(play_list[i]);
    i++;
    if (i < play_list.length) {
        var audio = document.getElementById('myAudio');
        audio.addEventListener('ended', function () {
            startPlayList(i);
        }, false);
    }
};
var play = function (i) {
    $("#myAudio").attr("src", i);
    //console.log(i);
    //var audio = document.getElementById("myAudio");
    //audio.play();
    $("#myAudio").trigger("load").trigger("play");
};