$(function () {
    $('#container6').highcharts({
        title: {
            text: '缺陷发现趋势',
            x: -20 //center
        },
        subtitle: {
            text: '分项目缺陷发现趋势图',
            x: -20
        },
        xAxis: {
            categories: ['星期一', '星期二', '星期三', '星期四', '星期五', '星期六','星期日']
        },
        yAxis: {
            title: {
                text: '新增缺陷数'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '个'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: '天龙八部',
            data: [7, 6, 1, 14, 18, 21, 26]
        }, {
            name: '17173媒体',
            data: [ 22.0, 24.8, 24.1, 20.1, 24.1, 29.6, 31.5]
        }, {
            name: '游戏工具',
            data: [0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6]
        }, {
            name: 'BI',
            data: [3.9, 4.2, 5.7, 0.2, 10.3, 1.6, 1.8]
        }]
    });
});
				