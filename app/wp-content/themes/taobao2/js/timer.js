var date = new Date();
var hours = clientHoursMinusServerHours(date);
var minutes = clientMinutesMinusServerMinutes(date);
var dot;
var interval = setInterval("getCurrentTime(date,hours,minutes)", 1000);

function clientHoursMinusServerHours(date) {
    var client = date;
    var clientHours = client.getHours();
    clientHours = parseInt(clientHours.toString());
    var differenceHours = serverHours - clientHours;
    return differenceHours;
}

function clientMinutesMinusServerMinutes(date) {
    var client = date;
    var clientMinutes = client.getMinutes();
    clientMinutes = parseInt(clientMinutes.toString());
    var differenceMinutes = serverMinutes - clientMinutes;
    return differenceMinutes;
}

function getCurrentTime(date,differenceHours, differenceMinutes) {
    var client = new Date();
    var clientHours = client.getHours();
    var clientMinutes = client.getMinutes();
    var clientHours = parseInt(clientHours.toString());
    var clientMinutes = parseInt(clientMinutes.toString());
    var newClientHours = clientHours + differenceHours;
    var newClientMinutes = clientMinutes + differenceMinutes;
    timer2(newClientHours, newClientMinutes, 10, 19);
}

function appZero(i) {
    if ((i < 10) ) {

        if (i == 0) {
            i = '0'+1;
        } else {
            i = "0" + i;
        }
    }
    return i;
}

function timer2(newClientHours, newClientMinutes, startOfWork, endOfWork) {
    if ((newClientHours > startOfWork) && (newClientHours < endOfWork)) {
        var hoursLeft = endOfWork - newClientHours - 1;
        var minutesLeft = 59 - newClientMinutes;
        var str = '<strong><i>Работаем.</i> До конца <br/> рабочего дня осталось:</strong>';
        var cssClass = 'work';
    }
    if((newClientHours<startOfWork)) {
        var hoursLeft = startOfWork - newClientHours - 1;
        var minutesLeft = 59 - newClientMinutes;
        var str = '<strong><i>Отдыхаем.</i> До начала <br/> рабочего дня осталось:</strong>';
        var cssClass = 'suspend';
            }
    if(newClientHours>= endOfWork) {
        var hoursLeft = 23 - newClientHours + startOfWork;
        var minutesLeft = 59 - newClientMinutes;
        var str = '<strong><i>Отдыхаем.</i> До начала <br/> рабочего дня осталось:</strong>';
        var cssClass = 'suspend';

    }

    minutesLeft = appZero(minutesLeft);
    hoursLeft = appZero(hoursLeft);
    if(dot==":"){dot=" "}else{dot=":"}
    var hours = "<span class='time'>" + hoursLeft + dot + minutesLeft + "</span>";
    $("#alarm").html(str + hours);
    $("#alarm").attr('class', cssClass);
}