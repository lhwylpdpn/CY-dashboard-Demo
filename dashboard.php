<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>质量部</title>
	<link rel="stylesheet" href="js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css" id="style-resource-1">
	<link rel="stylesheet" href="css/font-icons/entypo/css/entypo.css" id="style-resource-2">
	<link rel="stylesheet" href="css/bootstrap-min.css" id="style-resource-4">
	<link rel="stylesheet" href="css/neon-core-min.css" id="style-resource-5">
	<link rel="stylesheet" href="css/neon-theme-min.css" id="style-resource-6">
	<link rel="stylesheet" href="css/neon-forms-min.css" id="style-resource-7">
	<link rel="stylesheet" href="css/custom-min.css" id="style-resource-8">
	<style>
	body {
		overflow: hidden;
		user-select: none;
		-webkit-user-select: none;
		-moz-user-select: none;
		-o-user-select: none;
		-ms-user-select: none;
		width:100%;
		height:100%;
	}
	
	#back_ground { 
		position: fixed;
		left:20%;
		width:78%;
		height:98%;
		//border:3px solid #999999; 
		//box-shadow:-5px 5px 5px  #77787b;
		z-index: -1000; 
	}
	.table_bg{
		position: relative;
		width:100%;
		height:100%;
		border-collapse:separate;
		//border:1px solid #cccccc;
		border-spacing:5px;
	}
	.td_bg{
		border:1px solid #33CCFF;
		box-shadow:1px 1px 2px  #77787b;
		border-radius:2px;
		
	}
	
	.boader-content{
		position: fixed;
		left:20%;
		width:78%;
		height:98%;
		z-index: 1; 
		background-color:rgba(0,0,0,0.6);
		border-left:3px solid #33CCFF;
		box-shadow:5px 5px 5px  #666666;
		border-radius:0px 8px 8px 0px;
	}
	
	#droppalbe{
		border:1px solid #CC0000;
		width:300px;
		height:200px;
		background-color:green; 
	}
	#boader_slider{
		position: fixed;
		left:0.5%;
		width:19.5%;
		height:98%;
		z-index: 20; 
		background-color:rgba(0, 0 ,0,0.2); 
		padding:10px;
		box-shadow:5px 5px 5px  #666666;
		border-radius:8px 0px 0px 8px;
		
	}
	</style>
	 <style type="text/css">
        /* Required CSS classes: must be included in all pages using this script */

        /* Apply the element you want to drag/resize */
        .drsElement {
            position: absolute;
            border: 1px solid #333;
        }

        /*
 The main mouse handle that moves the whole element.
 You can apply to the same tag as drsElement if you want.
*/
        .drsMoveHandle {
            height: 20px;
            background-color: #CCC;
            border-bottom: 1px solid #666;
            cursor: move;
        }

        /*
 The DragResize object name is automatically applied to all generated
 corner resize handles, as well as one of the individual classes below.
*/
        .dragresize {
            position: absolute;
            width: 5px;
            height: 5px;
            font-size: 1px;
            background: #EEE;
            border: 1px solid #333;
        }

        /*
 Individual corner classes - required for resize support.
 These are based on the object name plus the handle ID.
*/
        .dragresize-tl {
            top: -8px;
            left: -8px;
            cursor: nw-resize;
        }

        .dragresize-tm {
            top: -8px;
            left: 50%;
            margin-left: -4px;
            cursor: n-resize;
        }

        .dragresize-tr {
            top: -8px;
            right: -8px;
            cursor: ne-resize;
        }

        .dragresize-ml {
            top: 50%;
            margin-top: -4px;
            left: -8px;
            cursor: w-resize;
        }

        .dragresize-mr {
            top: 50%;
            margin-top: -4px;
            right: -8px;
            cursor: e-resize;
        }

        .dragresize-bl {
            bottom: -8px;
            left: -8px;
            cursor: sw-resize;
        }

        .dragresize-bm {
            bottom: -8px;
            left: 50%;
            margin-left: -4px;
            cursor: s-resize;
        }

        .dragresize-br {
            bottom: -8px;
            right: -8px;
            cursor: se-resize;
        }
    </style>
	
	<script type=text/javascript src="js/jquery-1.11.0.min.js"></script>
	<script type=text/javascript src="js/dragresize.js"></script>
	<script>$.noConflict();</script>
	<script type="text/javascript">
        //<![CDATA[

        // Using DragResize is simple!
        // You first declare a new DragResize() object, passing its own name and an object
        // whose keys constitute optional parameters/settings:

        var dragresize = new DragResize('dragresize',
         { minWidth: 50, minHeight: 50, minLeft: 20, minTop: 20, maxLeft: 600, maxTop: 600 });

        // Optional settings/properties of the DragResize object are:
        //  enabled: Toggle whether the object is active.
        //  handles[]: An array of drag handles to use (see the .JS file).
        //  minWidth, minHeight: Minimum size to which elements are resized (in pixels).
        //  minLeft, maxLeft, minTop, maxTop: Bounding box (in pixels).

        // Next, you must define two functions, isElement and isHandle. These are passed
        // a given DOM element, and must "return true" if the element in question is a
        // draggable element or draggable handle. Here, I'm checking for the CSS classname
        // of the elements, but you have have any combination of conditions you like:

        dragresize.isElement = function (elm) {
            if (elm.className && elm.className.indexOf('drsElement') > -1) return true;
        };
        dragresize.isHandle = function (elm) {
            if (elm.className && elm.className.indexOf('drsMoveHandle') > -1) return true;
        };

        // You can define optional functions that are called as elements are dragged/resized.
        // Some are passed true if the source event was a resize, or false if it's a drag.
        // The focus/blur events are called as handles are added/removed from an object,
        // and the others are called as users drag, move and release the object's handles.
        // You might use these to examine the properties of the DragResize object to sync
        // other page elements, etc.

        dragresize.ondragfocus = function () { };
        dragresize.ondragstart = function (isResize) { };
        dragresize.ondragmove = function (isResize) { };
        dragresize.ondragend = function (isResize) { };
        dragresize.ondragblur = function () { };

        // Finally, you must apply() your DragResize object to a DOM node; all children of this
        // node will then be made draggable. Here, I'm applying to the entire document.
        dragresize.apply(document);

        //]]>
    </script>
</head>
<?php
 echo '<body class="page-body loaded" ><div id="content"> ' ;
 
 echo "<div id='back_ground'><table class='table_bg'>";
 for($i=0;$i<12;$i++){
 	echo "<tr class='back_tr'>";
 	for($j=0;$j<12;$j++){
 		echo "<td class='td_bg'></td>";
 	}
 	echo "</tr>";
 }
 
 echo "</table></div>";
 echo "<div id='boader_slider'>";
// echo "<div class='row'>";
 //echo "<div class='col-md-12'>";
 require_once "class.ui.Tiles.php";
 require_once "class.ui.Panels.php";
 require_once "class.db.Dashboard.php";
 $db=new DashboardDB();
 
 $tile=new Tile();
 $tile->data["drag_id"]=1;
 $v=$db->select(" where id=1");
 $tile->data["left"]=$v["widgit_left"]."px";
 $tile->data["top"]=$v["widgit_top"]."px";
 $tile->show();
 
 $panel=new Panel();
  $panel->data["title"]=".";
 $panel->data["drag_id"]=2;
 $v=$db->select(" where id=2");
 $panel->data["style"]["left"]=$v["widgit_left"]."px";
 $panel->data["style"]["top"]=$v["widgit_top"]."px";
 $panel->show("<div id='dragsource'><img src='images/demo/Vital Force.png' style='width:100%;'/></div>");
 //echo "</div>";
 //echo "</div>";
 echo "</div>";
 echo "<div class='boader-content'>";

 //echo "<div id='droppalbe'></div>";
 
 echo "</div></div>";
?>

<!--script src="js/ball/protoclass.js"></script>
<script src='js/ball/box2d.js'></script>
<script src='js/ball/Main.js'></script-->

<script src="js/gsap/main-gsap.js"></script>
<script src="js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/joinable.js"></script>
<script src="js/resizeable.js"></script>
<script src="js/neon-api.js"></script> 
<script src="js/neon-custom.js"></script>

<script>
jQuery.noConflict();
(function($){
	$(".dragable").width(400);
	
	
   
	var _board_width=0;
	var _board_height=0;
	
	$(".dragable").draggable({
		stop:function(event,ui){
			//widgit_height=$(this).height();
			//widgit_width=$(this).width();
			_widgit_top=$(this).offset().top;
			_widgit_left=$(this).offset().left;
			//alert(widgit_top+";"+widgit_left+";"+content_height+";"+content_width)
			var url="ajax.Dashboard.php?action=update_location";
			var $drag_id=$(this).attr("data_drag_id");
			$.get(url,{"drag_id":$drag_id,"widgit_left":_widgit_left,"widgit_top":_widgit_top,"board_width":_board_width,"board_height":_board_height} , function(data) {
    			
   			});
		}
	});
	$( ".boader-content").droppable({
		drop:function(event,ui){
			_board_height=$(this).height();
			_board_width=$(this).width();
		}
	});
	
})(jQuery);
function draw(){
	var canvas=document.getElementById("burn_gragh");
	var context=canvas.getContext("2d");
	context.moveTo(30,40);
	context.beginPath();
	context.lineTo(60,70);
	context.strokeStyle="#eee";
	context.stroke();
	context.closePath();
};
//$(function(){
	draw();
//});

</script>
</body>
</html>