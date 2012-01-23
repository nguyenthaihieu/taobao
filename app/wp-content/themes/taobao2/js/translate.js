function translate_bing(text, sl, tl, success, complete){
    if(typeof(complete) != 'function')
        complete = function(){};
    jQuery.ajax({
        url: 'http://api.bing.net/json.aspx?JsonCallback=?',
        dataType: 'jsonp',
        data: {
            'AppId' : 'F3A5B8832ED2798D80A77717B631E18229AD3A84',
            'Query': text.substr(0, 5000),
            'Sources': 'Translation',
            'Version': '2.2',
            'Translation.SourceLanguage': sl,
            'Translation.TargetLanguage': tl,
            'JsonType':'callback'
        },
        success: function(response){
            success(response.SearchResponse.Translation.Results[0].TranslatedTerm || '');
        },
        complete: complete
    });
}
$(function(){
$('#do').click(function(){
translate_bing($('#source').val(), 'ru', 'zh-CN', function(dat){$('#target').val(dat)});
})
})