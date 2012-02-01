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
     
    minutesLeft = addLeadingZero(minutesLeft);
    hoursLeft = addLeadingZero(hoursLeft);
    
    if(dot==":"){dot=" "}else{dot=":"}
    
    var hours = "<span class='time'>" + '<span>' + hoursLeft + '</span>'  + '<span class="dot">' + dot + '</span>' + '<span>' + minutesLeft + '</span>' + "</span>";
    
    $("#alarm").html(str + hours);
    $("#alarm").attr('class', cssClass);
}

$(function(){
    setInterval(updateTimer, 1000);
})