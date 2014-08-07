
    $(function () {
    $('#container2').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: '需求提出和解决趋势'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            labels: {
                formatter: function() {
                    return this.value; // clean, unformatted number for year
                }
            }
        },
        yAxis: {
            title: {
                text: '需求数'
            },
            labels: {
                formatter: function() {
                    return this.value / 1000 +'个';
                }
            }
        },
        tooltip: {
            pointFormat: '团队 {series.name} <b>个</b><br>在第 {point.x}天'
        },
        plotOptions: {
            area: {
                pointStart: 1,
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            name: '提出需求',
            data: [null, null, null, null, null, 6 , 11, 32, 110, 235, 369, 640,1005, 1436,
                    2063, 3057, 4618, 6444, 9822, 15468, 20434, 24126,27387, 29459, 31056, 31982,
                    32040, 31233, 29224, 27342, 26662,26956, 27912, 28999, 28965, 27826, 25579,
                    25722, 24826, 24605,24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344,
                    23586,22380, 25504, 37287, 34747, 43076, 42555, 52144, 51009, 61950,
                63871, 64824, 70577, 71527, 73475, 74521, 78358, 80295, 81104 
            ]
        }, {
            name: '解决需求',
            data: [null, null, null, null, null, null, null , null , null ,null,5, 25, 50,
                120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,4238, 5221, 6129,
                7089, 8339, 9399, 10538, 11643, 13092, 14478,15915, 17385, 19055, 21205,
                23044, 25393, 27935, 30062, 32049,33952, 35804, 37431, 39197, 45000, 43000,
                41000, 39000, 37000,35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000,
                22000,21000, 20000, 19000, 18000, 18000, 17000, 16000
            ]
        }]
    });
 });
