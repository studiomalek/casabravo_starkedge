<?php

// require '../vendor/autoload.php';
// try {
// 	putenv('GOOGLE_APPLICATION_CREDENTIALS=credentialsdrive.json');
// 	$client = new Google_Client();
// 	$client->useApplicationDefaultCredentials();
// 	$client->setScopes(['https://www.googleapis.com/auth/drive']);
// 	$client->setSubject('baby-customiser@baby-customiser-orders.iam.gserviceaccount.com');
// 	$driveService = new Google_Service_Drive($client);
//     $folderId = '1yABZAe5LqPqNixv7OF5ZNZxTG0e0Op7A';   
//     $fileMetadata = new Google_Service_Drive_DriveFile(array(
//             'name' => 'photo.png',
//             'parents' => array($folderId)
//         ));

//     $content = file_get_contents('https://cdn.shopify.com/s/files/1/0242/0113/4160/t/6/assets/1648832987.png?v=1579008877');
//     $file = $driveService->files->create($fileMetadata, array(
//             'data' => $content,
//             'mimeType' => 'image/png',
//             'fields' => 'id'));
//     echo "<pre>";
    
//     $file1=json_decode(json_encode($file), true); 
//     print_r($file1);
//     $fileID=$file1['id'];
//     $permissionService = new Google_Service_Drive_Permission();
// 	$permissionService->role = "reader";
// 	$permissionService->type = "anyone"; // anyone with the link can view the file
// 	$data=$driveService->permissions->create($fileID, $permissionService);
	
// 	// $data = json_encode($data);
// 	// $fh   = fopen('order.txt', 'w')  or die("Utyftyftf");
//  //    fwrite($fh, $data);



// 	//print_r($data);
// // $values=[["Order number","Name","Email","Shipping Address","Specifications","Image URL"]];

// // $client = new Google_Client();
// // $client->setApplicationName('Baby Customizer Orders');
// // $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
// // $client->setAuthConfig('credentialsdrive.json');
// // $client->setAccessType('offline');
// // $service = new Google_Service_Sheets($client);
// // $spreadsheetId = '1qVoP3VGGlwgtNpN26hI4dtpj78fNAQQeXjV9DkIgZBA';
// // $range = 'orders';
// // $parms=['valueInputOption'=>'RAW'];
// // $insert=['insertDataOption'=>'INSERT_RAWS'];
// // $body=new Google_Service_Sheets_ValueRange([
// //     'values'=>$values
// // ]);
// // $parms=['valueInputOption'=>'RAW'];
// // $insert=['insertDataOption'=>'INSERT_RAWS'];
// // $result=$service->spreadsheets_values->append($spreadsheetId,$range,$body,$parms,$insert);
// // print_r($result);

// }
// catch (InvalidArgumentException $e) {
//     //var_dump($accessToken);
// }


  
?>

