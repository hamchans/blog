function calendar() {
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    var mdays = [[31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31], [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]];

    function isLeap(y) {
        return y % 4 == 0 && y % 100 != 0 || y % 400 == 0;
    }

    function dayOfWeek(y, m, d) {
        if (m == 1 || m == 2) {
            y--;
            m += 12
        }
        return (y + Math.floor(y / 4) - Math.floor(y / 100) + Math.floor(y / 400) + Math.floor((13 * m + 8) / 5) + d) % 7;
    }

    function dayOfMonth(y, m) {
        return mdays[isLeap(y) ? 1 : 0][m-1];
    }

    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var date = now.getDate();

    var firstDay = dayOfWeek(year, month,  1);
    document.write(months[month-1] + "\b" + year);
    document.write("<br>");

    var d = 1;
    var endDate = dayOfMonth(year, month);
    var i = firstDay;

    var calendarHtml =  '';
    calendarHtml += '<h5>' + months[month-1]  + ' ' + year + '</h5>';
    calendarHtml += '<table>';
    for (var i = 0; i < 7; i++) { calendarHtml += '<td>' + days[i] + '</td>'; }
    for (var w = 0; w < 6; w++) {
        calendarHtml += '<tr>';
        for (var f = 0; f < 7; f++) {
            if (w == 0 && f < firstDay) { calendarHtml += '<td></td>'; }
            else if (d > endDate) { calendarHtml += '<td></td>'; }
            else {
                if (d == date) { calendarHtml += '<td class=\"today\"><strong>' + d + '</strong></td>'; d++; }
                else { calendarHtml += '<td>' + d + '</td>'; d++; }
            }
        }
        calendarHtml += '</tr>';
    }
    calendarHtml += '</table>';

    document.querySelector('#calendar').innerHTML = calendarHtml;
}