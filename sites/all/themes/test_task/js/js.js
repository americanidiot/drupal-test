jQuery(document).ready(function() {
    jQuery('#mycarouseltop').jcarousel({
        wrap: 'circular',
        scroll: 1
    });
});
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        wrap: 'circular',
        scroll: 1
    });
});

jQuery(document).ready(function() {
    jQuery('#mycarousel2').jcarousel({
        wrap: 'circular',
        scroll: 1
    });
});

jQuery(document).ready(function() {
    jQuery('#mycarousel3').jcarousel({
        wrap: 'circular',
        scroll: 1
    });
});

jQuery(document).ready(function() {
    jQuery('#mycarousel4').jcarousel({
        wrap: 'circular',
        scroll: 1
    });
});

(function($) {
    $(function() {

        $('ul.tabs').delegate('li:not(.current)', 'click', function() {
            var lang = $(this).parents('ul.tabs').data('lang');
            $(this).addClass('current').siblings().removeClass('current');
            $('div#'+lang+'-lang.section-tabs').find('div.tab').eq($(this).index()).fadeIn(150).siblings('div.tab').hide();
        });
        $('#slides').slides({
            preload: true,
            generateNextPrev: true,
            play: 6000,
            effect: 'slide'
        });
    });

})(jQuery);


$(document).ready(function(){

    $(".rounded-img").load(function() {
        $(this).wrap(function(){
            return '<span class="' + $(this).attr('class') + '" style="background:url(' + $(this).attr('src') + ') no-repeat center center; width: ' + $(this).width() + 'px; height: ' + $(this).height() + 'px;" />';
        });
        $(this).css("opacity","0");
    });

});

$(function(){
    $('.reklama').css({'position':'relative'}).attr('target','_blank').hover(function(){
            var id=$(this).attr('id');
            var src='http://charivne.info/reklama_baner/'+id;
            var pos=$(this).position();
            $(this).append('<img class="widthImg" style="position:absolute; top: 15px; z-index:100; max-width:400px; " src='+src+' />');
            var WI=$('.widthImg').width();
            var MB=$('.container-main').width();
            MB=parseInt(MB);
            var toEnd=MB-pos.left;
            var toStart=pos.left;
            WI=parseInt(WI);
            toEnd=parseInt(toEnd);
            toStart=parseInt(toStart);

            if (WI>toEnd && WI>toStart)
                $('.widthImg').css({'left':'0'});
            else if (WI>toEnd)
                $('.widthImg').css({'right':'0'});
            else
                $('.widthImg').css({'left':'0'});

        },function(){
            $('.reklama img').hide();
        }
    )


    $('.minJsFoto a').mouseover(function(){
        var aHref=$(this).attr('href');
        var imgSrc=$(this).attr('nameForLink')
        var imgTitle=$(this).attr('nameForTitle')
        $('.mainJsFoto img').attr('src',imgSrc);
        $('.mainJsFoto a').attr('href',aHref);
        $('.mainJsFoto .TitleHover').text(imgTitle);
    })


    $('.minJsVideo a').mouseover(function(){
        var aHref=$(this).attr('href');
        var imgSrc=$(this).attr('nameForLink')
        var imgTitle=$(this).attr('nameForTitle')
        $('.mainJsVideo img').attr('src',imgSrc);
        $('.mainJsVideo a').attr('href',aHref);
        $('.mainJsVideo .TitleHover').text(imgTitle);
    })



})

jQuery(document).ready(function() {
    jQuery('#mycarousels').jcarousel({
        vertical: true,
        scroll: 5
    });
});

