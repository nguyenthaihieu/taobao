$(function(){
  if(clientIP) {
      $.get("http://api.hostip.info/country.php?ip="+clientIP.toString(), function(data) {
          if(data) {
              $("#search_country").val(data);
              if(!$.cookie('country'))
                $.cookie('country', currentCountry);
          }
      })
  }
})