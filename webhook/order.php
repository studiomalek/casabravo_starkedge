<?php
require '../vendor/autoload.php';
putenv('GOOGLE_APPLICATION_CREDENTIALS=credentialsdrive.json');
try
{
   $_HEADERS = apache_request_headers();
   $_DOMAIN  = $_HEADERS['X-Shopify-Shop-Domain'];
    //$_DOMAIN  = 'porto-theme-demo.myshopify.com';
   $data     = (file_get_contents('php://input'));
// $data = '{"id":2026376921225,"email":"test@gmail.com","closed_at":null,"created_at":"2020-02-17T00:35:17-06:00","updated_at":"2020-02-17T00:35:18-06:00","number":22,"note":null,"token":"34bc023281f9fbbdc94b467994c0e789","gateway":null,"test":false,"total_price":"0.00","subtotal_price":"0.00","total_weight":0,"total_tax":"0.00","taxes_included":true,"currency":"MXN","financial_status":"paid","confirmed":true,"total_discounts":"20.00","total_line_items_price":"20.00","cart_token":"8a5c9678ba95665cabf32c3fa850a532","buyer_accepts_marketing":false,"name":"#1022","referring_site":"","landing_site":"\/?_ab=0\u0026_fd=0\u0026_sc=1\u0026key=36a9e2f8e4af0502b579755bd0f65aed7dc64d9c7c3980447700aea730161e39","cancelled_at":null,"cancel_reason":null,"total_price_usd":"0.00","checkout_token":"161e95d31c523b5c0d364be3f0bb9b04","reference":null,"user_id":null,"location_id":null,"source_identifier":null,"source_url":null,"processed_at":"2020-02-17T00:35:16-06:00","device_id":null,"phone":null,"customer_locale":"es","app_id":580111,"browser_ip":"103.212.235.209","landing_site_ref":null,"order_number":1022,"discount_applications":[{"type":"discount_code","value":"100.0","value_type":"percentage","allocation_method":"across","target_selection":"entitled","target_type":"line_item","code":"ESW8PNRVSF7Z"}],"discount_codes":[{"code":"ESW8PNRVSF7Z","amount":"20.00","type":"percentage"}],"note_attributes":[],"payment_gateway_names":[],"processing_method":"free","checkout_id":12263515816073,"source_name":"web","fulfillment_status":null,"tax_lines":[],"tags":"","contact_email":"test@gmail.com","order_status_url":"https:\/\/www.studiomalek.com\/24201134160\/orders\/34bc023281f9fbbdc94b467994c0e789\/authenticate?key=81b84e87f05e92e0e4406e64f46982db","presentment_currency":"MXN","total_line_items_price_set":{"shop_money":{"amount":"20.00","currency_code":"MXN"},"presentment_money":{"amount":"20.00","currency_code":"MXN"}},"total_discounts_set":{"shop_money":{"amount":"20.00","currency_code":"MXN"},"presentment_money":{"amount":"20.00","currency_code":"MXN"}},"total_shipping_price_set":{"shop_money":{"amount":"0.00","currency_code":"MXN"},"presentment_money":{"amount":"0.00","currency_code":"MXN"}},"subtotal_price_set":{"shop_money":{"amount":"0.00","currency_code":"MXN"},"presentment_money":{"amount":"0.00","currency_code":"MXN"}},"total_price_set":{"shop_money":{"amount":"0.00","currency_code":"MXN"},"presentment_money":{"amount":"0.00","currency_code":"MXN"}},"total_tax_set":{"shop_money":{"amount":"0.00","currency_code":"MXN"},"presentment_money":{"amount":"0.00","currency_code":"MXN"}},"line_items":[{"id":4457857351817,"variant_id":32247844241545,"title":"Product Customizer","quantity":1,"sku":"","variant_title":"With Frame","vendor":"studiomalek","fulfillment_service":"manual","product_id":4367461056649,"requires_shipping":true,"taxable":true,"gift_card":false,"name":"Product Customizer - With Frame","variant_inventory_management":null,"properties":[{"name":"ORIENTACIÓN","value":"IZQUIERDA"},{"name":"COLOR","value":"BLANCO"},{"name":"ILUSTRACIÓN","value":"DISEÑO VERTICAL #4"},{"name":"MARCO","value":"50x70cm Madera Negra"},{"name":"UNIDAD","value":"METRICAS"},{"name":"NOMBRE","value":"ytuytu"},{"name":"ALTURA","value":"54 cm"},{"name":"PESO","value":"   .   5676 grms"},{"name":"DIA DE NACIMIENTO","value":"01 Enero 2020   .   "},{"name":"HORA","value":"23:56 am"},{"name":"product_image","value":"https:\/\/cdn.shopify.com\/s\/files\/1\/0242\/0113\/4160\/t\/10\/assets\/2058734358.png?v=1581920010"},{"name":"frame","value":"50x70cm Madera Negra"}],"product_exists":true,"fulfillable_quantity":1,"grams":0,"price":"20.00","total_discount":"0.00","fulfillment_status":null,"price_set":{"shop_money":{"amount":"20.00","currency_code":"MXN"},"presentment_money":{"amount":"20.00","currency_code":"MXN"}},"total_discount_set":{"shop_money":{"amount":"0.00","currency_code":"MXN"},"presentment_money":{"amount":"0.00","currency_code":"MXN"}},"discount_allocations":[{"amount":"20.00","discount_application_index":0,"amount_set":{"shop_money":{"amount":"20.00","currency_code":"MXN"},"presentment_money":{"amount":"20.00","currency_code":"MXN"}}}],"tax_lines":[{"title":"VAT","price":"0.00","rate":0.16,"price_set":{"shop_money":{"amount":"0.00","currency_code":"MXN"},"presentment_money":{"amount":"0.00","currency_code":"MXN"}}}],"origin_location":{"id":1644836389001,"country_code":"MX","province_code":"JAL","name":"studiomalek","address1":"Manuel Villalongic 3597","address2":"","city":"Zapopan","zip":"45118"}}],"fulfillments":[],"refunds":[],"total_tip_received":"0.0","shipping_lines":[{"id":1625521356937,"title":"Free Shipping","price":"0.00","code":"Free Shipping","source":"shopify","phone":null,"requested_fulfillment_service_id":null,"delivery_category":null,"carrier_identifier":null,"discounted_price":"0.00","price_set":{"shop_money":{"amount":"0.00","currency_code":"MXN"},"presentment_money":{"amount":"0.00","currency_code":"MXN"}},"discounted_price_set":{"shop_money":{"amount":"0.00","currency_code":"MXN"},"presentment_money":{"amount":"0.00","currency_code":"MXN"}},"discount_allocations":[],"tax_lines":[]}],"billing_address":{"first_name":"test","address1":"Calle Calderón de la Barca 130","phone":"867 922 7771","city":"Little Rock","zip":"45130","province":"México","country":"Mexico","last_name":"test","address2":"Calle Calderón de la Barca 130","company":null,"latitude":null,"longitude":null,"name":"test test","country_code":"MX","province_code":"MEX"},"shipping_address":{"first_name":"test","address1":"Calle Calderón de la Barca 130","phone":"867 922 7771","city":"Little Rock","zip":"45130","province":"México","country":"Mexico","last_name":"test","address2":"Calle Calderón de la Barca 130","company":null,"latitude":null,"longitude":null,"name":"test test","country_code":"MX","province_code":"MEX"},"client_details":{"browser_ip":"103.212.235.209","accept_language":"en-US,en;q=0.9","user_agent":"Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/80.0.3987.106 Safari\/537.36","session_hash":"b0b64d91dff8b707c66a8141b16198f3","browser_width":1349,"browser_height":657},"customer":{"id":3139605954697,"email":"test@gmail.com","accepts_marketing":false,"created_at":"2020-02-17T00:34:47-06:00","updated_at":"2020-02-17T00:35:18-06:00","first_name":"test","last_name":"test","orders_count":1,"state":"disabled","total_spent":"0.00","last_order_id":2026376921225,"note":null,"verified_email":true,"multipass_identifier":null,"tax_exempt":false,"phone":null,"tags":"","last_order_name":"#1022","currency":"MXN","accepts_marketing_updated_at":"2020-02-17T00:34:47-06:00","marketing_opt_in_level":null,"default_address":{"id":3170068955273,"customer_id":3139605954697,"first_name":"test","last_name":"test","company":null,"address1":"Calle Calderón de la Barca 130","address2":"Calle Calderón de la Barca 130","city":"Little Rock","province":"México","country":"Mexico","zip":"45130","phone":"867 922 7771","name":"test test","province_code":"MEX","country_code":"MX","country_name":"Mexico","default":true}}}';
   $fh   = fopen('order.txt', 'w')  or die("Utyftyftf");
   fwrite($fh, $data);
   $arraydata=json_decode($data,true);


   $customeremail=$arraydata['email'];
   $ordernumber=$arraydata['order_number'];
      include_once 'check_duplicate.php';
   $firstname=$arraydata['customer']['first_name'];
   $lastname=$arraydata['customer']['last_name'];
   $fullname=$firstname.' '.$lastname;

   $address1=$arraydata['shipping_address']['address1'];
   $city=$arraydata['shipping_address']['city'];
   $province=$arraydata['shipping_address']['province'];
   $country=$arraydata['shipping_address']['country'];
   $zip=$arraydata['shipping_address']['zip'];
   $phone=$arraydata['shipping_address']['phone'];

   $shippingaddress='Address: '.$address1.' , '.'City: '.$city.' , '.'State: '.$province.' , '.'Country: '.$country.' , '.'Zipcode: '.$zip.', '.'Phonenumber: '.$phone;

  $values=array();
  $lineitem=$arraydata['line_items'];

  $lineitemcount=count($lineitem);
  $countnum=1;
  $client1 = new Google_Client();
  $client1->useApplicationDefaultCredentials();
  $client1->setScopes(['https://www.googleapis.com/auth/drive']);
  $client1->setSubject('baby-customiser@baby-customiser-orders.iam.gserviceaccount.com');
  $driveService = new Google_Service_Drive($client1);
  $folderId = '1yABZAe5LqPqNixv7OF5ZNZxTG0e0Op7A'; 
   foreach ($lineitem as $key => $value) {
    //print_r(expression)
    $varinatid= $value['variant_id'];
   
    if($varinatid == '32247844208777' || $varinatid == '32247844241545')
    {
        $lineproperties= $value['properties'];
         
            
        if(!empty($lineproperties))
        {

            foreach ($lineproperties as $key1 => $linepropval) {

                $name=$linepropval['name'];
                $valuedata=$linepropval['value'];
                if($name == 'ORIENTACIÓN')
                {
                     $orientation=$valuedata;
                }
                if($name == 'COLOR')
                {
                    $color=$valuedata;
                }
                if($name == 'UNIDAD')
                {
                    $unit=$valuedata;
                }
                if($name == 'NOMBRE')
                {
                     $nameval=$valuedata;
                }
                if($name == 'ALTURA')
                {
                     $length=$valuedata;
                }
                if($name == 'PESO')
                {
                     $weight=$valuedata;
                }
                if($name == 'DIA DE NACIMIENTO')
                {
                     $date=$valuedata;
                }
                if($name == 'HORA')
                {
                     $time=$valuedata;
                }
                if($name == 'product_image')
                {
                     $image_url=$valuedata;
                     if($lineitemcount == 1)
                     {
                      $imagename = $ordernumber.'.png';
                     }
                     else
                     {
                       $imagename = $ordernumber."(".$countnum.")".".png";
                     }
                     $fileMetadata = new Google_Service_Drive_DriveFile(array(
                            'name' => $imagename,
                            'parents' => array($folderId)
                        ));

                    $content1 = file_get_contents($image_url);
                    $file = $driveService->files->create($fileMetadata, array(
                            'data' => $content1,
                            'mimeType' => 'image/png',
                            'fields' => 'id'));
                 
                    
                    $file1=json_decode(json_encode($file), true); 
                    $fileID=$file1['id'];
                    $permissionService = new Google_Service_Drive_Permission();
                    $permissionService->role = "reader";
                    $permissionService->type = "anyone"; // anyone with the link can view the file
                    $driveService->permissions->create($fileID, $permissionService);
                    $newimageurl="https://drive.google.com/file/d/".$fileID."/view";

                }

                

               $specifiction='Orientation: '.$orientation.' , '.'Color: '.$color.' , '.'Unit: '.$unit.' , '.'Name: '.$nameval.' , '.'Date: '.$date.' , '.'Time: '.$time.' , '.'Length: '.$length.' , '.'Weight: '.$weight;
               $newarray = array($ordernumber,$fullname,$customeremail,$shippingaddress,$specifiction,$newimageurl);
              
           }        

            array_push($values, $newarray);
       }

   }
$countnum++;

}
// echo "<pre>";
// print_r($values);
// echo "</pre>";
// die();
if(!empty($values))
{
$client = new Google_Client();
$client->setApplicationName('Baby Customizer Orders');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAuthConfig('credentialsdrive.json');
$client->setAccessType('offline');
$service = new Google_Service_Sheets($client);
$spreadsheetId = '1qVoP3VGGlwgtNpN26hI4dtpj78fNAQQeXjV9DkIgZBA';
$range = 'orders';
$parms=['valueInputOption'=>'RAW'];
$insert=['insertDataOption'=>'INSERT_RAWS'];
$body=new Google_Service_Sheets_ValueRange([
    'values'=>$values
]);
$parms=['valueInputOption'=>'RAW'];
$insert=['insertDataOption'=>'INSERT_RAWS'];
$result=$service->spreadsheets_values->append($spreadsheetId,$range,$body,$parms,$insert);
print_r($result);
}
}

catch (Exception $e) {
	
 //  if (!file_exists("order.txt"))
 //  {
 //     touch("order.txt");
 // }
 // $myfile = fopen("order.txt", "w");
 // $txt = $e->getMessage();
 // fwrite($myfile, $txt);
 // fclose($myfile);
		//error_mail($e,"../textfile/error_msg.txt");
}

?>

