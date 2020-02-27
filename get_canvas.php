<canvas id='custom_canvas1' width='3472' height='5000'></canvas>


<script>

		$(document).ready(function(){

 var montharray=['SEPTIEMBRE','OCTUBRE','NOVEMBER','DICIEMBRE'];
  var babyname ="NOMBRE APELLIDO";
  var centdata=$("#centimeter_data :selected").text();
  var date=$("#birth-day :selected").text();
  var month=$("#birth-month :selected").text();
  var year =$("#birth-year :selected").text();
  var image=$("#illustration :selected").val();
  var optionname=centdata + ' . '+date+" "+month+" "+year;
  
  // canves onload data
    var back_color=$(".canvas_image_background").val();
   
   var big_canvas = document.getElementById("custom_canvas1");
   var big_ctx = big_canvas.getContext("2d");

   
   	big_ctx.fillStyle = "white";
    big_ctx.fillRect(0,0,big_canvas.width,big_canvas.height);
   
   
  
    // for the background color 
    big_ctx.fillStyle = back_color;
    big_ctx.fillRect(30,30,440,640);
   

   
    // for the text color 
    big_ctx.textAlign = 'center';
    big_ctx.textBaseline = 'middle';
    big_ctx.font = '60pt BrownStd-Light Bold';
    big_ctx.fillStyle = "black";
    big_ctx.fillText(babyname.toUpperCase(),big_canvas.width/2,4750);
    big_ctx.fillText(optionname,big_canvas.width/2,4950);
  
  // for the image draw 
	var imgd = new Image;
	imgd.onload=function(){
	big_ctx.drawImage(imgd,0,0);
	}
    imgd.crossOrigin = 'anonymous';
	imgd.src='http://templatesgroup.com/app/shopify-express-application/Manoj/mani-18-baby.png';




		});



	</script>