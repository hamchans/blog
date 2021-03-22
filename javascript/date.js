function date() {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var date = now.getDate();
    var i;
    var html = '';
    
    html += '<select name=\"year\">';
    for (i=1900; i<=year; i++) {
        if (i == year) {
            html += '<option value=\"' + i +  '\" selected>';
            html += i;
            html += '</option>';
        } else {
            html += '<option value=\"' + i +  '\">';
            html += i;
            html += '</option>';
        }
    }
    html += '</select>年';
    
    html += '<select name=\"month\">';
    for (i=1; i<=12; i++) {
        var num = zeroPadding(i, 2);
        if (i == month) {
            html += '<option value=\"' + num +  '\" selected>';
            html += i;
            html += '</option>';
        } else {
            html += '<option value=\"' + num +  '\">';
            html += i;
            html += '</option>';
        }
    }
    html += '</select>月';
    
    html += '<select name=\"date\">';
    for (i=1; i<=31; i++) {
        var num = zeroPadding(i, 2);
        if (i == date) {
            html += '<option value=\"' + num +  '\" selected>';
            html += i;
            html += '</option>日';
        } else {
            html += '<option value=\"' + num +  '\">';
            html += i;
            html += '</option>日';
        }
    }
    html += '</select>';
    
    document.write(html);
}

function zeroPadding(num, length){
    return ('0000000000' + num).slice(-length);
}