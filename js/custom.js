jQuery(document).ready(function(){
    enableNavigation=true;
    windowResize();
    //navigate based on z and / press
    jQuery('body').keydown(function(e){
        if(enableNavigation){
            if (e.keyCode) {
                var keycode=e.keyCode;
            }
            else
            {
                keycode=e.which;
            }
            if(keycode==37){
                if(jQuery('#jj-prev-post a').attr('href'))
                document.location.href=jQuery('#jj-prev-post a').attr('href');}
            else if(keycode==39){
                if(jQuery('#jj-next-post a').attr('href'))
                document.location.href=jQuery('#jj-next-post a').attr('href');}
        }
    });
    jQuery('input').focus(function(e){
        enableNavigation=false;
    });
    jQuery('input').blur(function(e){
        enableNavigation=true;
    });
    jQuery(window).resize(function(){
        windowResize();
    });
    jQuery('#jj-prev-post').mouseenter(function(){
        jQuery('#jj-prev-post-title').fadeIn('slow');
    });
    jQuery('#jj-prev-post').mouseleave(function(){
        jQuery('#jj-prev-post-title').fadeOut('slow');
    });
    jQuery('#jj-next-post').mouseenter(function(){
        jQuery('#jj-next-post-title').fadeIn('slow');
    });
    jQuery('#jj-next-post').mouseleave(function(){
        jQuery('#jj-next-post-title').fadeOut('slow');
    });
});
function windowResize()
{
    //position next/prev buttons
    var windowheight=jQuery(window).height();
    var nextprevbuttontop=(windowheight-48)/2;
    jQuery('.jj-nav-post').css({
        'top':nextprevbuttontop+'px'
    });
    jQuery('#jj-prev-post-title').css({
        'top':(nextprevbuttontop-35)+'px'
    });
    jQuery('#jj-next-post-title').css({
        'top':(nextprevbuttontop-33)+'px'
    });
}