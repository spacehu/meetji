$(window).load(function () {
    //videoShow();
    if (window.innerWidth >= 800) {
        $("#main_css").attr("href", "./css/singlePC.css");
        $("#img").attr("src", "./img/" + _src + "PC.jpg");
    } else {
        $("#main_css").attr("href", "./css/single.css");
        $("#img").attr("src", "./img/" + _src + ".jpg");
    }
});
$(window).resize(function () {
    //videoShow();
    if (window.innerWidth >= 800) {
        $("#main_css").attr("href", "./css/singlePC.css");
        $("#img").attr("src", "./img/" + _src + "PC.jpg");
    } else {
        $("#main_css").attr("href", "./css/single.css");
        $("#img").attr("src", "./img/" + _src + ".jpg");
    }
});