var chart;
$(function() {
	$('#container4').highcharts({
		chart: {
			zoomType: 'xy'
		},
		title: {
			text: '各版本需求满足度&延期关系图'
		},
		xAxis: [{
			categories: ['1.1.0', '1.1.1', '1.1.2', '1.1.3', '1.2.0']
		}],
		yAxis: [{ // Primary yAxis
			labels: {
				formatter: function() {
					return this.value + '%';
				},
				style: {
					color: '#89A54E'
				}
			},
			title: {
				text: '计划延期比率',
				style: {
					color: '#89A54E'
				}
			}
		}, { // Secondary yAxis
			title: {
				text: '版本需求满足度',
				style: {
					color: '#4572A7'
				}
			},
			labels: {
				formatter: function() {
					return this.value + ' %';
				},
				style: {
					color: '#4572A7'
				}
			},
			opposite: true
		}],

		tooltip: {
			shared: true
		},

		series: [{
			name: '版本需求满足度',
			color: '#4572A7',
			type: 'column',
			yAxis: 1,
			data: [49.9, 71.5, 100.4, 99.2, 30.0],
			tooltip: {
				pointFormat: '<span style="font-weight: bold; color: {series.color}">{series.name}</span>: <b>{point.y:.1f} %</b> '
			}
		},  {
			name: '计划延期比率',
			color: '#89A54E',
			type: 'spline',
			data: [7.0, 6.9, 13.5, 15, 31.2],
			tooltip: {
				pointFormat: '<span style="font-weight: bold; color: {series.color}">{series.name}</span>: <b>{point.y:.1f}%</b> '
			}
		
		}]
	});
});				