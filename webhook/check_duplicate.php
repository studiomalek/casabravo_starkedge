<?php
include_once 'connection.php';


$select = "SELECT * from google_sheet WHERE Order_id='".$ordernumber."'";
$select_rs = mysqli_query($conn,$select);
		if(mysqli_num_rows($select_rs)>0){

				die();


		}
		else{

				$insert = "INSERT INTO google_sheet (Order_id) VALUES('".$ordernumber."')";
				$insert_rs = mysqli_query($conn,$insert);


		}

?>