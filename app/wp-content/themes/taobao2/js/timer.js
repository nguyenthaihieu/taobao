function addLeadingZero(i) {
    i = Math.abs(i);
    if ((i < 10) ) {
        if (i < 1) {
            i = '00';
        } else {
            i = "0" + i;
        }
    }
    return i;
}

var dot = ':';

function updateTimer() {
    var clientDate = new Date();
    var clientHours = parseInt(clientDate.getHours());
    var clientMinutes = parseInt(clientDate.getMinutes());

    var clientDayOfWeek = clientDate.getDay();
    var clientMonth = addLeadingZero(clientDate.getMonth()+1);
    var clientDay = addLeadingZero(clientDate.getDate());
    
    var clientCurrentDate = clientDay+'.'+clientMonth;

    var deltaHours = serverHours - clientHours;
    var deltaMinutes = serverMinutes - clientMinutes;

    var newClientHours = clientHours + deltaHours;
    var newClientMinutes = clientMinutes + deltaMinutes;


    if ((newClientHours >= startOfWork) && (newClientHours < endOfWork)) {
        var hoursLeft = (endOfWork - newClientHours) - 1;
        var minutesLeft = 59 - newClientMinutes;
        var str = '<strong><i>Работаем.</i> До конца <br/> рабочего дня осталось:</strong>';
        var cssClass = 'work';
    } else {
        var hoursLeft = (startOfWork - newClientHours) - 1;
        var minutesLeft = 59 - newClientMinutes;
        var str = '<strong><i>Отдыхаем.</i> До начала <br/> рабочего дня осталось:</strong>';
        var cssClass = 'suspend';
    }
    
    var isWorkDay = (workingDays.search(clientDayOfWeek) > -1);
    var isHoliday = (holidays.search(clientCurrentDate) > -1);
     
    minutesLeft = addLeadingZero(minutesLeft);
    hoursLeft = addLeadingZero(hoursLeft);
    
    if(dot==":"){dot=" "}else{dot=":"}
    
    if(isWorkDay && !isHoliday) {
      var hours = "<span class='time'>" + '<span>' + hoursLeft + '</span>'  + '<span class="dot">' + dot + '</span>' + '<span>' + minutesLeft + '</span>' + "</span>";
    } else {
      var hours = "";
      var str = '<strong><i>Отдыхаем.</i> Сегодня у нас выходной, заходите в рабочий день</strong>';
      var cssClass = 'suspend';
    }
    
    $("#alarm").html(str + hours);
    $("#alarm").attr('class', cssClass);
}

$(function(){
    setInterval(updateTimer, 1000);
})