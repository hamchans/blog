function last_update() {
    var day = new Date(document.lastModified);
    var y = day.getFullYear();
    var m = day.getMonth() + 1;
    var d = day.getDate();
    var hour = day.getHours();
    var min = day.getMinutes();

    var week = new Array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
    var w = week[day.getDay()];

    if (m == 1) m = "Jan";
    if (m == 2) m = "Feb";
    if (m == 3) m = "Mar";
    if (m == 4) m = "Apr";
    if (m == 5) m = "May";
    if (m == 6) m = "Jun";
    if (m == 7) m = "Jul";
    if (m == 8) m = "Aug";
    if (m == 9) m = "Sep";
    if (m == 10) m = "Oct";
    if (m == 11) m = "Nov";
    if (m == 12) m = "Dec";

    if (d == 1 | d == 21 | d == 31) d = d + "st"
    else if (d == 2 | d == 22) d = d + "nd"
    else if (d == 3 | d == 23) d = d + "rd"
    else d = d + "th"

    if (hour < 10) hour = "0" + hour;
    if (min < 10) min = "0" + min;

    document.write("Last Update: " + w + ", " + m + " " + d + " " + y + " " + hour + ":"+ min + "(GMT+0900)");
}