function map() {
    google.charts.load('current', {
        'packages':['geochart'],
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
    });
    google.charts.setOnLoadCallback(drawRegionsMap);
    
    function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
            ['Country'],
            ['Japan'],
            ['China'],
            ['Thailand'],
            ['Cambodia'],
            ['Singapore'],
            ['Malaysia'],
            ['Taiwan'],
            ['France'],
            ['Hungary'],
            ['Austria']
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
}