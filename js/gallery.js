/**
 * Created by VICTOR on 4.3.2017 г..
 */
$(document).ready(function() {
    if ($('#container').attr('ratingallowed') == 1) {
        var ratingWidth = $(".rating").width();
        $(".rating").mousemove(function (e) {
            var parentOffset = $(this).offset();
            var relX = e.pageX - parentOffset.left;
            var ratingFullWidth = 100 * (relX / ratingWidth);
            ratingFullWidth = Math.round(ratingFullWidth / 20) * 20;
            $(this).find(".ratingFull").css("width", ratingFullWidth + "%")
        });
        $(".rating").mouseleave(function (e) {
            var This = $(this);
            rating = This.attr("rating");
            This.find(".ratingFull").width(rating * 20 + "%");
        })
    }
});