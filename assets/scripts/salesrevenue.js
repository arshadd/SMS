
var json = (function () {
    //var url = "@Url.Action('SalesChart', 'Dashboard')";
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        //'url': url,
        'url': '../Dashboard/SalesChart/',
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})();
$('#SalesChart').highcharts({
    colors: ["#7cb5ec", "#f7a35c", "#90ee7e", "#7798BF", "#aaeeee", "#eeaaee", "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
    chart: {
        type: 'bar'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: json[0]
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Revenue ($)'
        }
    },
    legend: {
        reversed: true
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.x + '</b><br/>' +
                this.series.name + ': ' + this.y + '<br/>' +
                'Total: ' + this.point.stackTotal;
        }
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'Revenue / Client',
        //data: [5934, 4588, 2392, 1385, 836, 453]
        data: json[1]
    }, {
        name: 'Revenue / Broker',
        //data: [69, 28, 21, 37, 26, 10, 73, 0, 0, 0, 0, 0]
        data: json[2]
    }, {
        name: 'Revenue / Mabnager',
        //data: [69, 28, 21, 37, 26, 10, 73, 0, 0, 0, 0, 0]
        data: json[3]
    }, {
        name: 'Revenue / Branch',
        //data: [69, 28, 21, 37, 26, 10, 73, 0, 0, 0, 0, 0]
        data: json[4]
    }, {
        name: 'Revenue / Desk',
        //data: [69, 28, 21, 37, 26, 10, 73, 0, 0, 0, 0, 0]
        data: json[5]
    }, {
        name: 'Revenue / Product',
        //data: [69, 28, 21, 37, 26, 10, 73, 0, 0, 0, 0, 0]
        data: json[6]
    }]
});

var guageData = (function () {
    //var url = "@Url.Action('GuageChart', 'Dashboard')";
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        //'url': url,
        'url': '../Dashboard/GuageChart/',
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})();
$('#GuageChart').highcharts({
    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Revenue of ' + guageData.GuageText[0]
    },
    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },
    // the value axis
    yAxis: {
        min: guageData.MinValue[0],
        max: guageData.MaxValue[0],

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '<br />' + guageData.GuageText[0] + '<br />$' + guageData.GuageValue[0]
        },
        plotBands: [{
            from: guageData.MinValue[0],
            to: guageData.ToValue[0],
            color: '#55BF3B' // green
        }, {
            from: guageData.ToValue[0],
            to: guageData.FromValue[0],
            color: '#DDDF0D' // yellow
        }, {
            from: guageData.FromValue[0],
            to: guageData.MaxValue[0],
            color: '#DF5353' // red
        }]
    },
    series: [{
        name: '',
        data: [guageData.PointerValue[0]],
    }]
});
$('#GuageChart2').highcharts({
    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Revenue of ' + guageData.GuageText[1]
    },
    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },
    // the value axis
    yAxis: {
        min: guageData.MinValue[1],
        max: guageData.MaxValue[1],

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '<br />' + guageData.GuageText[1] + '<br />$' + guageData.GuageValue[1]
        },
        plotBands: [{
            from: guageData.MinValue[1],
            to: guageData.ToValue[1],
            color: '#55BF3B' // green
        }, {
            from: guageData.ToValue[1],
            to: guageData.FromValue[1],
            color: '#DDDF0D' // yellow
        }, {
            from: guageData.FromValue[1],
            to: guageData.MaxValue[1],
            color: '#DF5353' // red
        }]
    },
    series: [{
        name: '',
        data: [guageData.PointerValue[1]],
    }]
});

var json = (function () {
    //var url = "@Url.Action('RevenuePieChart', 'Dashboard')";
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        //'url': url,
        'url': '../Dashboard/RevenuePieChart/',
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})();
Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
        stops: [
            [0, color],
            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
        ]
    };
});
$('#RevenueChart').highcharts({
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                },
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Revenue',
        //data: json
        data: [
            ['Last Month', json[0]],
            ['Current Month', json[1]],
        ]
    }]
});
