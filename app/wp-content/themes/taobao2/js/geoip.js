if(clientIP) {
    $.get("http://ipgeobase.ru:7020/geo?ip="+clientIP.toString(), function(data) {
        var mycity = $(data).find("city").text();
        if(mycity) {
            $("#cusel-scroll-search_country").append('<span val="my">'+mycity+'</span>');
            var params = {
                refreshEl: "#search_country",
                visRows: 16,
                scrollArrows: true
            }
            cuSelRefresh(params);

        }
        return true;
    }, "xml")
}