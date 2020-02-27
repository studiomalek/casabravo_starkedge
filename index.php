<?php
// ob_start();
// session_start();
require_once 'header.php';
require 'keys.php';
require 'shopify.php';
$sc = new ShopifyClient($_SESSION['shop'], $_SESSION['token'], $api_key, $secret);
$_DOMAIN=$_SESSION['shop'];
$shopURL='https://'.$_SESSION['shop'];
$ShopToken=$_SESSION['token'];

try
{ 
 echo  "<div style='text-align:center; margin-top:200px; font-size:25px;'>Welcome in the casabravo app</div>";
     
}
catch (ShopifyApiException $e)
{
    
         var_dump($e->getMethod());// -> http method (GET, POST, PUT, DELETE)
         var_dump($e->getPath());// -> path of failing request
         var_dump($e->getResponse());// -> curl response object
         var_dump($e->getParams());// -> optional data that may have been passed that caused the failure
    
  }
?>

<script type="text/javascript">
    ShopifyApp.init({
      apiKey: '<?php echo $api_key; ?>',
      shopOrigin:"<?php echo $shopURL; ?>",
      debug: true
    });
    </script>
  <script type="text/javascript">
    ShopifyApp.ready(function(){
    ShopifyApp.Bar.initialize({
      
      title: '',
      
          
          callback: function(){ 
            ShopifyApp.Bar.loadingOff();
            
          }
       
      
    });
  });
</script>





