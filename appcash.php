<?php
require 'keys.php';
require 'shopify.php';
$shop = "appcash500.myshopify.com";
$token = "5bdef39fdda6ab5521e35cad088468c7";
$sc = new ShopifyClient($shop, $token, $api_key, $secret);
$x = $sc->call('GET','/admin/api/2019-10/orders.json?fields=id');
try {
foreach($x as $v ) {

 $id = $v['ids'];

print_r($id);

}
echo "<pre>";
print_r($x);
echo "</pre>";
}
catch(ShopifyApiException $e) {
	var_dump($e);
}

?>
