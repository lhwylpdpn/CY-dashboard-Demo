$(document).ready(function(){
		
    $('#container5').highcharts({
        data: {
            table: document.getElementById('datatable')
        },
        chart: {
            type: 'column'
        },
        title: {
            text: '本周发现缺陷情况'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: '缺陷数'
            }
        },
        tooltip: {
            formatter: function() {
                return '<b>'+ this.series.name +'</b><br/>'+
                    this.y+'个缺陷';
            }
        }
    });
});				