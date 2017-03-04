/**
 * Created by VICTOR on 4.3.2017 г..
 */
$(document).ready(function() {
    var ratingWidth = $(".rating").width();
    $(".rating").mousemove(function(e){
        var parentOffset = $(this).offset();
        var relX = e.pageX - parentOffset.left;
        var ratingFullWidth = 100*(relX/ratingWidth);
        ratingFullWidth = Math.round(ratingFullWidth/20)*20;
        $(this).find(".ratingFull").css("width",ratingFullWidth + "%")
    });
    $(".rating").mouseleave(function (e) {
        rating = $(this).attr("rating");
    })
});