function taobao_set_country (code) {
    $("#search_country").val(code);
    $('.cuselText').text($('#cusel-scroll-search_country span[val=' + code + ']').text());
    return code;
}

jQuery(function($){
    jQuery.cookie('country', '');
    clientIP = false;
    if(!$.cookie('country') && clientIP) {
        $.get("http://api.hostip.info/country.php?ip="+clientIP.toString(), function(data) {
            if(data && data != 'XX') {
                taobao_set_country(data);
                $.cookie('country', data);
            }
        })
    } else {
        if (!$.cookie('country')) {
            $.cookie('country', taobao_set_country($('#search_country').val()));
        } else {
            taobao_set_country($.cookie('country'));
        }
    }
})