<?php
include_once 'keys.php';
include_once 'shopify.php';


$sc = new ShopifyClient($shop,$token,$api_key,$secret);


try{
$x = $sc->call("DELETE","/admin/api/2020-01/webhooks/86716776585.json");

echo "<pre>";
print_r($x);
echo "</pre>";

}
catch(ShopifyApiException $e){
	echo "<pre>";
	print_r($e);
	echo "</pre>";
};

?>