$(function () {
    $.index_imgnew_opacity();
});
//主页图片新闻遮罩层兼容
(function ($) {
    $.index_imgnew_opacity = function () {
        var $item = $(".portfolio-item"); //模拟hover的div
        $item.children().css({
            "-webkit-transition": "all 0.2s ease-in-out",
            "-moz-transition": "all 0.2s ease-in-out",
            "-o-transition": "all 0.2s ease-in-out",
            "-ms-transition": "all 0.2s ease-in-out",
            "transition": "all 0.2s ease-in-out"
        });
        $item.live("mousemove", function () {
            var $details = $(".portfolio-details", $(this));
            var $p_categories = $("p.portfolio-categories", $(this));
            var $cat_image = $(".portfolio-cat-image", $(this));
            var $hover_details = $(".portfolio-hover-details", $(this));
            var $a_large = $("a.open-portfolio-large", $(this));
            var $a_link = $("a.open-portfolio-link", $(this));
            $details.css({
                "width": "100%",
                "opacity": "0.8",
                "filter": "alpha(opacity=80)",
                "cursor": "pointer"
            });
            $p_categories.css({
                "color": "!important",
                "cursor": "pointer"
            });
            $cat_image.css({
                "opacity": "0",
                "filter": "alpha(opacity=0)"
            });
            $hover_details.css({
                "width": "214px",
                "background": "#000",
                "position": "absolute",
                "z-index": "10",
                "float": "left",
                "opacity": "0.7",
                "filter": "alpha(opacity=70)",
                "z-index": "1",
                "behavior": "url(/Scripts/PIE/PIE.htc)"
            });
            $a_large.css({
                "width": "40px",
                "height": "40px",
                "background": "url(/Image/icons/40px/white/29.png) top center no-repeat",
                "border": "2px solid #ccc",
                "float": "left",
                "margin-right": "10px",
                "margin-top": "0",
                "text-indent": "-9999px",
                "overflow": "hidden",
                "opacity": "1",
                "filter": "alpha(opacity=100)",
                "position": "relative",
                "z-index": "1",
                "behavior": "url(/Scripts/PIE/PIE.htc)"
            });
            $a_link.css({
                "width": "40px",
                "height": "40px",
                "background": "url(/Image/icons/40px/white/27.png) top center no-repeat",
                "border": "2px solid #ccc",
                "float": "left",
                "margin-top": "0",
                "text-indent": "-9999px",
                "overflow": "hidden",
                "opacity": "1",
                "filter": "alpha(opacity=100)",
                "position": "relative",
                "z-index": "1",
                "behavior": "url(/Scripts/PIE/PIE.htc)"
            });
        }).live('mouseleave', function () {
            var $details = $(".portfolio-details", $(this));
            var $p_categories = $("p.portfolio-categories", $(this));
            var $cat_image = $(".portfolio-cat-image", $(this));
            var $hover_details = $(".portfolio-hover-details", $(this));
            var $a_large = $("a.open-portfolio-large", $(this));
            var $a_link = $("a.open-portfolio-link", $(this));
            $details.css({
                "width": "",
                "opacity": "",
                "filter": "",
                "cursor": ""
            });
            $p_categories.css({
                "color": "",
                "cursor": ""
            });
            $cat_image.css({
                "opacity": "",
                "filter": ""
            });
            $hover_details.css({
                "width": "",
                "background": "",
                "position": "",
                "z-index": "",
                "float": "",
                "opacity": "",
                "filter": ""
            });
            $a_large.css({
                "width": "",
                "height": "",
                "background": "",
                "border": "",
                "float": "",
                "margin-right": "",
                "margin-top": "",
                "text-indent": "",
                "overflow": "",
                "opacity": "",
                "filter": ""
            });
            $a_link.css({
                "width": "",
                "height": "",
                "background": "",
                "border": "",
                "float": "",
                "margin-top": "",
                "text-indent": "",
                "overflow": "",
                "opacity": "",
                "filter": ""
            });
        });
    };
}(jQuery));