$(function() {
    $('.fade').on('inview', function(event, isInView){
        if (isInView) {
            $(this).addClass('fade-in');
        } else {
            $(this).removeClass('fade-in');
        }
    });
    
    $('.slideIn_ltr').on('inview', function(event, isInView){
        if (isInView) {
            $(this).addClass('slideIn_ltr-in');
        } else {
            $(this).removeClass('slideIn_ltr-in');
        }
    });
    
    $('.slideIn_rtl').on('inview', function(event, isInView){
        if (isInView) {
            $(this).addClass('slideIn_rtl-in');
        } else {
            $(this).removeClass('slideIn_rtl-in');
        }
    });
    
    $('.slideIn_dtu').on('inview', function(event, isInView){
        if (isInView) {
            $(this).addClass('slideIn_dtu-in');
        } else {
            $(this).removeClass('slideIn_dtu-in');
        }
    });
    $('.animation').on('inview', function(event, isInView) {
        if (isInView) {
        $(this).addClass('animate__animated animate__rubberBand');
        } else {
        $(this).removeClass('animate__animated animate__rubberBand');
        }
    });
});//最初のfunction部分の終了(消さない！)