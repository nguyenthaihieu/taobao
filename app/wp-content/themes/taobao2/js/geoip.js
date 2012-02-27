function taobao_set_country (code) {
    $("#search_country").val(code);
    $('.cuselText').text($('#cusel-scroll-search_country span[val=' + code + ']').text());
    return code;
}

function countryCallback(data) {
            if(data.countryCode) {
                taobao_set_country(data.countryCode);
                $.cookie('country', data.countryCode);
            }
}

