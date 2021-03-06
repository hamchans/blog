function start_date() {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var date = now.getDate();
    var i;
    var html = '';
    
    html += '<select name=\"start_year\">';
    for (i=year; i<=year+10; i++) {
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
    
    html += '<select name=\"start_month\">';
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
    
    html += '<select name=\"start_date\">';
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

function end_date() {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var date = now.getDate();
    var i;
    var html = '';
    
    html += '<select name=\"end_year\">';
    for (i=year; i<=year+10; i++) {
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
    
    html += '<select name=\"end_month\">';
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
    
    html += '<select name=\"end_date\">';
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