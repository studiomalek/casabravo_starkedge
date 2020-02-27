<?php
if(isset($_POST['shop'])){
require_once 'connection.php';
require 'fpdf.php';

$select_shop = "SELECT * from Shop_details WHERE Shop='".trim($_POST['shop'])."'";
$select_shop_rs = mysqli_query($conn,$select_shop);
if(mysqli_num_rows($select_shop_rs)>0){
$fetch = mysqli_fetch_assoc($select_shop_rs);

$shop = $fetch['Shop'];
$token = $fetch['token'];


require_once 'keys.php';
require 'shopify.php';
//define('UPLOAD_DIR', 'images/');
$dir="";
if(isset($_POST['Image']))
{
$Image = $_POST['Image'];
$base_to_php = explode(',', $Image);
$datak = base64_decode($base_to_php[1]);
$final_data = base64_encode($datak);

}
//file_put_contents("upload_file.png",$datak);
//$filename="http://templatesgroup.com/app/shopify-express-application/baby_customizer/".$file;

if(isset($_POST['bigimage_url']))
{
$dir="images/";
$Image1 = $_POST['bigimage_url'];
$base_to_php1 = explode(',', $Image1);
$datak1 = base64_decode($base_to_php1[1]);
$final_data1 = base64_encode($datak1);
}
// $file1 =  $dir . uniqid() . '.png';
// file_put_contents($file1, $datak1);

// $pdffile=$dir.round(microtime(true)).'.pdf';
// $pdf = new FPDF();
// $pdf->AddPage();
// $pdf->Image($file1,20,40,170,170);
// $content = $pdf->Output($pdffile,'F');


$time = rand();
$sc = new ShopifyClient($shop,$token,$api_key,$secret);


//unlink($filename);
try {

	if(isset($_POST['email']))
	{
		$data['asset']=array(
		"key"=>"assets/".$time.".png",
		"attachment"=>$final_data
	);
	$x = $sc->call("PUT","/admin/api/2019-10/themes/86716776585/assets.json",$data);
		$orientation=$_POST["orientation"];
		$color=$_POST["color"];
		$illustraion=$_POST["illustration"];
        $illustrationnumber=$_POST["illustrationnumber"];

		$unit=$_POST["unit"];
		$length=$_POST["length"];
		$lengthvalue=$_POST["lengthvalue"];
		$weight=$_POST["weight"];
		$date=$_POST["date"];
		$time=$_POST["time"];
		$name=$_POST["name"];
		$frame=$_POST['frame'];
		$angle=$_POST['angle'];

		$url='https://casabravo.myshopify.com/pages/customizer?orientation='.$orientation.'&illustration='.$illustrationnumber.'&color='.$color.'&unit='.$unit.'&legnth='.$length.'&weight='.$weight.'&date='.$date.'&time='.$time.'&name='.$name.'&frame='.$frame.'&angle='.$angle.'&lengthvalue='.$lengthvalue.'';
		// $url=trim(preg_replace('/\s+/', '', $url));
	
		$from='malek.orders@gmail.com';
		$email=$_POST['email'];
		$to = $email;
		$subject = "Studiomalek";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
 		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
		$headers .= 'From: '.$from."\r\n".
	    'Reply-To: '.$from."\r\n" .
	    'X-Mailer: PHP/' . phpversion();
		//$headers = "From: noreply@starkedge.com";
		if(isset($x['public_url']))
		{
			$image=$x['public_url'];
			$message = '<html><body>';
			$message.="<div class='container'><div class='sitelogo'><h4 style='text-align: center;'><a href='https://casabravo.myshopify.com/'><img width='100' height='auto' src='https://cdn.shopify.com/s/files/1/0242/0113/4160/files/logo.png?3826'></a></h4></div><div><h2 style='font-size: 18.0px; color:#000000; font-family: Arial, Helvetica;'><b>Dear <a href='mailto:".$to."' target='_blank'>".$to."</a>,</b></h2><p style='font-size: 18.0px; color:#000000; font-family: Arial, Helvetica;'>Studio Malek ha guardado con éxito su diseño en nuestra base de datos y nuestros creativos están listos para comenzar a trabajar en su creación.</p>
			    <p style='font-size: 18.0px; color:#000000; font-family: Arial, Helvetica;'>Una vez que realice el pedido, necesitaremos alrededor de 2 semanas para entregarlo.</p>
			    <p style='font-size: 18.0px; color:#000000; font-family: Arial, Helvetica;'>Encuentra las imágenes y especificaciones de tu creación a continuación:</p>
			</div>
			<div><h1 style='text-align: center;'><img src='".$image."'></h1></div>
			<div style='width: 100.0%;float: left;display: inline-block;'>
			<h3 style='font-size: 20.0px; color:#000000; font-family: Arial, Helvetica;'><b><u>Especificaciones:</u></b></h3>
			<ul style='list-style-type: none;font-size: 17.0px;padding: 0; color:#000000; font-family: Arial, Helvetica;'>
			<li style='font-size: 17.0px;padding: 0; color:#000000; font-family: Arial, Helvetica;'>ORIENTACIÓN: ".$_POST['orientation']."</li>
			<li style='font-size: 17.0px;padding: 0; color:#000000; font-family: Arial, Helvetica;'>COLOR: ".$_POST['color']."</li>
			<li style='font-size: 17.0px;padding: 0; color:#000000; font-family: Arial, Helvetica;'>ILUSTRACIÓN: ".$_POST['illustration']."</li>
			<li style='font-size: 17.0px;padding: 0; color:#000000; font-family: Arial, Helvetica;'>UNIDAD: ".$_POST['unit']."</li>
			<li style='font-size: 17.0px;padding: 0; color:#000000; font-family: Arial, Helvetica;'>NOMBRE: ".$_POST['name']."</li>
			<li style='font-size: 17.0px;padding: 0; color:#000000; font-family: Arial, Helvetica;'>ALTURA: ".$_POST['length']."</li>
			<li style='font-size: 17.0px;padding: 0; color:#000000; font-family: Arial, Helvetica;'>PESO: ".$_POST['weight']."</li>
			<li style='font-size: 17.0px;padding: 0; color:#000000; font-family: Arial, Helvetica;'>DIA DE NACIMIENTO: ".$_POST['date']."</li>
			<li style='font-size: 17.0px;padding: 0; color:#000000; font-family: Arial, Helvetica;'>HORA: ".$_POST['time']."</li>
			<li style='font-size: 17.0px;padding: 0; color:#000000; font-family: Arial, Helvetica;'>IMAGEN: ".$image."</li>

			</ul>
			</div>
			<div style='width: 100.0%;float: left;display: inline-block;text-align: center;'><p style='font-size: 20.0px; color:#000000; font-family: Arial, Helvetica;'> <strong>¿Estás listo para dar vida a tu diseño?</strong><br>Haga clic en el botón de abajo para volver a su diseño.</p>			
			<div style='width: 100.0%;float: left;display: inline-block;margin-bottom: 20.0px; margin-top: 25.0px;'>
			<a href='".$url."' style='border-radius: 10.0px;padding: 10.0px 15.0px; display: inline-block;background-color:#000000 ;color: #ffffff;font-size: 18.0px;font-weight: bold;text-decoration: none; font-family: Arial, Helvetica;' target='_blank'>Volver al diseño</a>
			</div>
			</div>
			</div>";
			$message.='</body></html>';
			$mail=mail($to,$subject,$message,$headers);
			if(!$mail)
			{
			$array=array("status"=>"unuccess","data"=>"Email have not Sent to your Email box");
				echo json_encode($array);
				

			}
			else
			{
				$array=array("status"=>"success","data"=>"Email have sent to your Email box");
				echo json_encode($array);
				
			}
		}
			else
			{
				
				$array=array("status"=>"unuccess","data"=>"error with the image creater");
				echo json_encode($array);

			}
	}
	else
	{
		$data['asset']=array(
		"key"=>"assets/".$time.".png",
		"attachment"=>$final_data1

    );
	$x = $sc->call("PUT","/admin/api/2019-10/themes/86716776585/assets.json",$data);
		if(isset($x['public_url']))
		{
			$image=$x['public_url'];
			$array=array("status"=>"success","data"=>$image);
		    echo json_encode($array);
		}
		else
		{
			$array=array("status"=>"unsuccess","data"=>'somthing want wrong please contact to support');
		    echo json_encode($array);
		}
		
	}

} 
catch (ShopifyApiException $e) {
	echo "<pre>";
	print_r($e);
	echo "</pre>";
}
}
}
?>
