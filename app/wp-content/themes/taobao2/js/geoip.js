
    function initSelect() {
        var currentCountry = $.cookie('country');
        if(currentCountry) {
          $("#search_country").val(currentCountry);
        }
        $("#search_country").live('change', function(){
            var currentCountry = $(this).val();
            $.cookie('country', currentCountry);
        })

        var params = {
            changedEl: "#search_country",
            visRows: 16,
            scrollArrows: true
        }

        cuSel(params);
    }

function capitalize (text) {
    return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
}

function countryCallback(data) {
  if(data.cityName) {
    var cityName = capitalize(data.cityName); 
    translate_bing(cityName, 'en', 'ru', function(dat){
      var cityName = dat;
      var newCity = '<option value="'+data.cityName+'">'+cityName+'</option>';
      $('#search_country').append(newCity);
      $("#search_country").val(data.cityName);
      initSelect();
    });
  } 
  else if(data.countryCode) {
    $("#search_country").val(data.countryCode);
    initSelect();
  }
}

