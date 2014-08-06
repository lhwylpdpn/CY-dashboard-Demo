$(function () {
    
    var colors = Highcharts.getOptions().colors,
        categories = ['closed', 'fixed', 'new', 'reopen'],
        name = '缺陷分布',
        data = [{
                y: 52,
                color: colors[1],
                drilldown: {
                    name: 'closed',
                    categories: ['张三', '刘丽洁', '王炯'],
                    data: [10, 7, 33, 2],
                    color: colors[1]
                }
            }, {
                y: 19,
                color: colors[2],
                drilldown: {
                    name: 'fixed',
                    categories: ['刘丽洁', '李鹤', '崔玥'],
                    data: [1, 13, 5],
                    color: colors[2]
                }
            }, {
                y: 14,
                color: colors[3],
                drilldown: {
                    name: 'new',
                    categories: ['刘丽洁', '李鹤', '邦之恺', '摆玉', '李畅'],
                    data: [1, 3, 4, 1, 5],
                    color: colors[3]
                }
            }, {
                y: 7,
                color: colors[4],
                drilldown: {
                    name: 'reopen',
                    categories: ['刘丽洁', '李鹤', '邦之恺', '王静'],
                    data: [4,1,1,1],
                    color: colors[4]
                }
            
            }];


    // Build the data arrays
    var browserData = [];
    var versionsData = [];
    for (var i = 0; i < data.length; i++) {

        // add browser data
        browserData.push({
            name: categories[i],
            y: data[i].y,
            color: data[i].color
        });

        // add version data
        for (var j = 0; j < data[i].drilldown.data.length; j++) {
            var brightness = 0.2 - (j / data[i].drilldown.data.length) / 5 ;
            versionsData.push({
                name: data[i].drilldown.categories[j],
                y: data[i].drilldown.data[j],
                color: Highcharts.Color(data[i].color).brighten(brightness).get()
            });
        }
    }

    // Create the chart
    $('#container3').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: '缺陷分布'
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        plotOptions: {
            pie: {
                shadow: false,
                center: ['50%', '50%']
            }
        },
        tooltip: {
    	    valueSuffix: '个'
        },
        series: [{
            name: 'status',
            data: browserData,
            size: '60%',
            dataLabels: {
                formatter: function() {
                    return this.y > 5 ? this.point.name : null;
                },
                color: 'white',
                distance: -30
            }
        }, {
            name: 'num',
            data: versionsData,
            size: '80%',
            innerSize: '60%',
            dataLabels: {
                formatter: function() {
                    // display only if larger than 1
                    return this.y > 1 ? '<b>'+ this.point.name +':</b> '+ this.y +'个'  : null;
                }
            }
        }]
    });
});				