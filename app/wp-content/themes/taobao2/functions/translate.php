<html>
<head>
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type='text/javascript'>
/**
 * function for translating using Bing's Translator API
 * @param String text - text to be translated
 * @param String sl - source language code (f.e. 'ru')
 * @param String tl - target language code (f.e. 'ru')
 * @param Function success - function to be called when translate is complete 
 *        sucessfully (will be given to a jQuery's ajax success parameter)
 * @param Function complete - function to be called anyway (will be given to a 
 *        jQuery's ajax complete parameter)
 */
 function alertMy(a){
  alert(a);
  return a;
 }
 function alertMe(a){
  alert(a);
  return a;
 }
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
translate_bing("mytext",'en','ru',alertMe,alertMy);
</script>
</head>
</html>