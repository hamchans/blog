function start_time() {
    var now = new Date();
    
    var hour = now.getHours();
    var minuite = now.getMinutes();
    var i;
    var html = '';
    
    html += '<select name=\"start_hour\">';
    for (i=0; i<=23; i++) {
        var num = zeroPadding(i, 2);
        if (i == hour) {
            html += '<option value=\"' + num +  '\" selected>';
            html += i;
            html += '</option>';
        } else {
            html += '<option value=\"' + num +  '\">';
            html += i;
            html += '</option>';
        }
    }
    html += '</select>時';
    
    html += '<select name=\"start_minute\">';
    for (i=0; i<=59; i++) {
        var num = zeroPadding(i, 2);
        if (i == minuite) {
            html += '<option value=\"' + num +  '\" selected>';
            html += i;
            html += '</option>';
        } else {
            html += '<option value=\"' + num +  '\">';
            html += i;
            html += '</option>';
        }
    }
    html += '</select>分';
    
    document.write(html);
}

function end_time() {
    var now = new Date();
    
    var hour = now.getHours();
    var minuite = now.getMinutes();
    var i;
    var html = '';
    
    html += '<select name=\"end_hour\">';
    for (i=0; i<=23; i++) {
        var num = zeroPadding(i, 2);
        if (i == hour) {
            html += '<option value=\"' + num +  '\" selected>';
            html += i;
            html += '</option>';
        } else {
            html += '<option value=\"' + num +  '\">';
            html += i;
            html += '</option>';
        }
    }
    html += '</select>時';
    
    html += '<select name=\"end_minute\">';
    for (i=0; i<=59; i++) {
        var num = zeroPadding(i, 2);
        if (i == minuite) {
            html += '<option value=\"' + num +  '\" selected>';
            html += i;
            html += '</option>';
        } else {
            html += '<option value=\"' + num +  '\">';
            html += i;
            html += '</option>';
        }
    }
    html += '</select>分';
    
    document.write(html);
}

function zeroPadding(num, length){
    return ('0000' + num).slice(-length);
}