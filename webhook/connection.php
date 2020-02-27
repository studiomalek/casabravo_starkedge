<?php
$conn = mysqli_connect("localhost","starkedg_appdata","mani1234","starkedg_canvas");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
  }
?>
