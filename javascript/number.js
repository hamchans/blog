function select_num_1to5() {
    var i;
    var html = '';
    
    html += '<select name=\"num\">';
    for (i=5; i>0; i--) {
        if (i == 5) {
            html += '<option value=\"' + i +  '\" selected>';
            html += i;
            html += '</option>';
        } else {
            html += '<option value=\"' + i +  '\">';
            html += i;
            html += '</option>';
        }
    }
    html += '</select>';
    
    document.write(html);
}