
<?php
session_start();
require_once "checkstatus.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>质量部</title>
	

	<style>.file-input-wrapper { overflow: hidden; position: relative; cursor: pointer; z-index: 1; }
	.file-input-wrapper input[type=file], .file-input-wrapper input[type=file]:focus, 
	.file-input-wrapper input[type=file]:hover { position: absolute; top: 0; left: 0; cursor: pointer; opacity: 0; filter: alpha(opacity=0); z-index: 99; outline: 0; }
	.file-input-name { margin-left: 8px; }
	#modal{
		modal
		z-index:1000;
	}
	.mail_input{
		padding:5px;
		margin:10px;
		border:2px solid #0099CC;
		font-size:14;
		border-radius:3px;
	}
	
	#snap_img{
		max-height:300px;
		overflow:scroll;
		padding:5px;
		border-radius:3px;
		margin:10px;
	}
	#send_mail{
		background-color:#00A65A;
		color:#FFF;
		padding:5px 20px;
	}
	</style>
	<link rel="stylesheet" href="js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css" id="style-resource-1">
	<link rel="stylesheet" href="css/font-icons/entypo/css/entypo.css" id="style-resource-2">
	<link rel="stylesheet" href="css/bootstrap-min.css" id="style-resource-4">
	<link rel="stylesheet" href="css/neon-core-min.css" id="style-resource-5">
	<link rel="stylesheet" href="css/neon-theme-min.css" id="style-resource-6">
	<link rel="stylesheet" href="css/neon-forms-min.css" id="style-resource-7">
	<link rel="stylesheet" href="css/custom-min.css" id="style-resource-8">
	<link rel="stylesheet" href="css/mycss/scrum.css" id="style-resource-11">
	
	<script type=text/javascript src="js/jquery-2.1.0.min.js"></script>
 
</head>
<?php
require_once "class.ui.Tiles.php";
require_once "class.ui.Panels.php";
require_once "class.bean.Mail.php";
?>
<body class="page-body loaded" >
<div class="page-container <?php if(isset($_GET["snap"])){ echo $_GET["snap"]; } ?>">
	<?php require_once "slider.php"; ?>
	<div style="min-height: 1442px;" class="main-content">
	<?php require_once "titlerow.php"; 
	if(!isset($_GET["page"])){ 
	?>
	<div class="row">
    	<div class="col-sm-3" onclick=abc();>
    	<?php $h=new StatsTile();
			$h->icon ="entypo-clock";
			$h->color ="tile-red";
			$h->title="工时";
			$h->introduce ="持续投入的测试人力成本（本月）";
			$h->datashow=396;
			$h->show() ?>
		</div>
		<div class="col-sm-3">
    	<?php $h=new StatsTile();
			$h->data=array("title"=>"SVN版本","introduce"=>"各项目的SVN版本总数（本月）","dataend"=>9,"color"=>"tile-green","icon"=>"entypo-github");
			$h->setValues();
			$h->show() ?>
		</div>
		<div class="col-sm-3">
    	<?php $h=new StatsTile();
			$h->data=array("title"=>"CI构建","introduce"=>"项目持续集成构建总次数（本月）","dataend"=>23,"color"=>"tile-green","icon"=>"entypo-record");
			$h->setValues();
			$h->show(); ?>
		</div>
		<div class="col-sm-3">
    	<?php $h=new StatsTile();
			$h->data=array("title"=>"BUG量","introduce"=>"各项目BUG总数（本月","dataend"=>56,"color"=>"tile-blue","icon"=>"entypo-eye");
			$h->setValues();
			$h->show() ;?>
		</div>
	</div>
	
	<div class="row">
    	<div class="col-sm-12">
    		<?php $panel=new Panel();
    		$panel->data=array("title"=>"~");
    		$content="<div id='line-example'  style='height: 400px;width: auto'></div>";
    		$panel->show($content); ?>
    	</div>
    </div>
    <div class="row">
    	<div class="col-sm-12">
    		<?php $panel=new Panel();
    		$panel->data=array("title"=>"~");
    		$content="<div id='bar-example'  style='height: 400px;width: auto'></div>";
    		$panel->show($content); ?>
    	</div>
    </div>
    <?php }else if($_GET["page"]=="bug"){ ?>
    <div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
	    		<div class="panel-heading">
					<div class="panel-title">产品质量</div>
	   			 </div>
				<div class='panel-body'>
	   			<table  id="DataTable" style="text-align: center;border-collapse:collapse;background-color: #f5f5f6" border="1px solid #ebebeb" cellspacing="0px" bordercolor='#ebebeb'>
					<thead >
		    		<tr >
                    	<!-- <th style="text-align: center">产品名称</th> -->
                    	<th style="text-align: center">项目名称</th>
                    	<th style="text-align: center">BUG数</th>
                	</tr>
            		</thead>
        		</table>
        		</div>
			</div>

   		 </div>

	</div>
	<?php } ?>
</div>
</div>
<?php
$mm=new Mail();
$modal=new Modal();
$modal->data=array("model_id"=>"editmail","model_title"=>"编辑邮件","content"=>$mm->displayMailForm()."<p id='loadingpic'></p><div id='img_div'></div>");
$modal->show();

$m=new Modal();
$m->data=array("model_id"=>"mail_result","title"=>"邮件发送结果","but_name"=>"知道了","content"=>"<p class='confirm_msg'></p>");
$m->showConfirmModel();

?>
<script src="js/highcharts.js"></script>
<script src="js/gsap/main-gsap.js"></script>
<script src="js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
<script src="js/bootstrap.js"></script>

<script src="js/joinable.js" id="script-resource-4"></script>
<script src="js/resizeable.js"></script>  
<script src="js/neon-api.js" id="script-resource-6"></script>
<script src="js/cookies.min.js" id="script-resource-7"></script>
<script src="js/jquery.validate.min.js" id="script-resource-8"></script>

<script src="js/neon-login.js" id="script-resource-9"></script>
<script src="js/neon-custom.js" id="script-resource-3"></script>
<script src="js/neon-demo.js" id="script-resource-11"></script>
<script src="js/neon-skins.js" id="script-resource-12"></script>

<script src="js/jquery.sparkline.min.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script>

jQuery.noConflict();
(function($){
    	var url="ajax.Dashboard.php?action=chart&chart_id=1";
    	$.getJSON(url,  function(data) {
    		options=data;
        	//$('#line-example').highcharts(options);
   		 });	

    	$.getJSON(url,  function(data) {
    		options=data;
        	//$('#bar-example').highcharts(options);
   		 });
   		 
   		 $('#DataTable').dataTable( {
	        //"processing": true,
	        "serverSide": true,
	        "ajax": "data.php?datafrom=bug",
	         "columns": [
	            { "data": "project_name" },
	            { "data": "bug_num" }
	            
	        ] 
	    });
	    //点击弹出发送邮件表单
	    $("#editmail_a").click(function(){
	    	var url="snap.php";
	    	$("#img_div").html("");
	    	$.get(url, {u:'http://localhost/ladaoba/home.php',img_name:'home'}, function(data) {
        		$("#img_div").append(data);
        		$('#img_name').val('home');
        		$("#loadingpic").html("加载完成.");
   		 	});
   		 	
	    	$("#loadingpic").html("图片加载中...");
	    	$('#editmail').modal('show');
	    });
	    
	    $("#send_mail").click(function(e){
	    	e.preventDefault();
	    	var url="mail.php";
	    	$.get(url, $("#mail_form").serialize(), function(data) {
	    		$("#img_div").html("");
        		$(".confirm_msg").html(data);
        		$('#mail_result').modal('show');
   		 	});
	    });
	    
	     var linedata=[{
                name: '我叫MT',
                data: [24,6,24,14,18,12,16]
            }, {
                name: '人月传说',
                data: [10, 8, 5, 11, 9, 8, 8]
            }, {
                name: 'COC',
                data: [14, 6, 16, 8, 13,22,9]
            }, {
                name: '天龙',
                data: [12,6,12, 13, 11, 15, 0]
            }]
  
        $('#line-example').highcharts({
            title: {
                text: '所有项目平均测试时长',
                x: -20 //center,
                //floating:true
            },
            subtitle: {
                text: '数据来源: 数据库',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul']
            },
            yAxis: {
                title: {
                    text: '测试时长 (h)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
						return this.series.name+'<br />'+''+this.x +': '+ this.y + 'h';
					}
            },
            /*
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            */

            series: linedata
        });
   

      
        $('#bar-example').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: '所有项目每月上线次数'
            },
            subtitle: {
                text: '数据来源: 数据库'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul'  
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: '上线次数 (次)'
                }
            },
            tooltip: {
               // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
               // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
               //     '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
               // footerFormat: '</table>',
               // shared: true,
               // useHTML: true
                formatter: function() {
						return this.series.name+'<br />'+''+this.x +': '+ this.y + '次';
					//(this.series.name == 'Tokyo' ? ' mm' : '°C')+'<br />'+this.series.name;
					}
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: '我叫MT',
                data: [1.1, 3, 3, 1, 4, 0, 1, 0]

            }, {
                name: '人月传说',
                data: [3, 3, 1, 2, 1,1, 0, 1]

            }, {
                name: 'COC',
                data: [1, 1, 1, 1,1, 1, 1, 1]

            }, {
                name: '天龙 ',
                data: [1, 3, 4, 3, 1, 0, 2, 1]

            }]
        });
    
    	
		
})(jQuery);


</script>

</body>

