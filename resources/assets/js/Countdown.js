jQuery(document).ready(function(){
    var fiveMinutes = new Date().getTime() + (60000 * 5);
    jQuery('.js-countdown').countdown(fiveMinutes, function(event) {
        jQuery(this).html(event.strftime('%M:%S'));
    });
});