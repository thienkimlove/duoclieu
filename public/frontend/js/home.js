function bannerAdsSide() {
    var $banner = $(".banner-ads"), $window = $(window), $topDefault = parseFloat($banner.css("top"), 10);
    $window.on("scroll", function () {
        var $top = $(this).scrollTop();
        $banner.stop().animate({top: $top + $topDefault}, 100, "easeOutCirc")
    })
}
function clickChangeVideo(btnClick, posShowvideo) {
    $(btnClick).off("click"), $(btnClick).click(function () {
        var src = $(this).data("src");
        $(posShowvideo).find("iframe").attr("src", src)
    })
}
function clickShowPopupVideo(btnClick, popupName) {
    $(btnClick).off("click"), $(btnClick).click(function () {
        var src = $(this).data("src");
        $(popupName).fadeIn(), $(popupName).find("iframe").attr("src", src), $(".close-popup").click(function () {
            $(popupName).fadeOut()
        })
    })
}
function showPopup(btnOpen, popupName, btnClose) {
    $(btnOpen).off("click"), $(btnOpen).click(function () {
        $(popupName).fadeIn(), $(popupName).children().attr("src", src)
    }), $(btnClose).click(function () {
        $(popupName).fadeOut()
    })
}
function changeContentTab(btnClick) {
    $(btnClick).off("click"), $(btnClick).click(function () {
        var char = $(this).data("content");
        $(this).siblings().removeClass("active"), $(this).addClass("active"), $(char).siblings().removeClass("active"), $(char).addClass("active")
    })
}
function menu(btnClick) {
    $(btnClick).off("click");
    var click = 0;
    $(btnClick).click(function () {
        var menu = $(this).data("menu");
        0 == click ? ($(menu).addClass("transX0"), $(this).css({background: 'url("http://lmhtgosu.besaba.com/dist/images/menu-close.png")'}), click++) : ($(menu).removeClass("transX0"), $(this).css({background: 'url("http://lmhtgosu.besaba.com/dist/images/menu-open.png")'}), click--)
    })
}
function closeHotline(btnClick) {
    var click = 0;
    $(btnClick).click(function () {
        var menu = $(this).data("close");
        0 == click ? ($(menu).addClass("transY94"), click++) : ($(menu).removeClass("transY94"), click--)
    })
}
$(document).ready(function () {
    $("#slider-2").owlCarousel({navigation: !0, pagination: !0, autoPlay: !0, autoPlaySpeed: 2e3});
    var owl = $("#slider-1");
    owl.owlCarousel({
        navigation: !0,
        paginationSpeed: 400,
        singleItem: !0,
        autoHeight: !0,
        responsive: !0,
        autoPlay: !0,
        autoPlaySpeed: 2e3,
        afterMove: function (element) {
            var length = owl.find(".owl-item").length, current = this.currentItem;
            current == length - 1 && (current = -1);
            var next = element.find(".owl-item").eq(current + 1).find("img").attr("src");
            $("#slide-preview img").attr("src", next)
        }
    }), changeContentTab(".tabs .tab"), menu(".open-top-nav"), menu(".open-main-nav"), clickChangeVideo(".video-group .tabs a", ".video-group .content"), clickShowPopupVideo(".thumb-video a", ".popup-video"), closeHotline("#close-hotline"), bannerAdsSide()
}), $(".parentMenu>a").on("click", function () {
    var parentMenu = $(this).parent();
    parentMenu.find(".submenu").toggle()
});