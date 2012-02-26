function taobao_set_country (code) {
    $("#search_country").val(code);
    $('.cuselText').text($('#cusel-scroll-search_country span[val=' + code + ']').text());
    return code;
}

jQuery(function($){
    if(!$.cookie('country') && clientIP) {
        $.getJSON(       "http://api.ipinfodb.com/v3/ip-country/?key=e4f0f83a5d2fb23efda0b1765d51e28bb84ad0320f8fb3bbded5dfecdb63cd6c&ip="+clientIP.toString()+"&format=json", function(data) {
            if(data.countryCode) {
                taobao_set_country(data.countryCode);
                $.cookie('country', data.countryCode);
            }
        })
    }
})
