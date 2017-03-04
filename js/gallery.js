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
            ratingFullWidth = Math.ceil(ratingFullWidth / 20) * 20;
            if(ratingFullWidth < 20){ratingFullWidth = 20}
            $(this).find(".ratingFull").css("width", ratingFullWidth + "%")
            $(this).find(".inputrating").val(ratingFullWidth/20);
        });
        $(".rating").mouseleave(function () {
            var This = $(this);
            rating = This.attr("rating")
            This.find(".ratingFull").width(rating * 20 + "%");
        })
        $(".rating").click(function () {
            $(this).find("form").submit();
        })
    }
});