<?php
session_start();
require_once 'keys.php';
require 'shopify.php';
define('SHOPIFY_API_KEY',$api_key );
define('SHOPIFY_SECRET',  $secret);
//echo 'hello' .$_SESSION['shop'];
define('SHOPIFY_SCOPE', 'read_products,write_products,read_themes,write_themes,write_script_tags,read_orders,write_orders,read_fulfillments,write_fulfillments,read_shipping,write_shipping,write_inventory');

  
    if (isset($_GET['code'])) { // if the code param has been sent to this page... we are in Step 2
        // Step 2: do a form POST to get the access token
        $shopifyClient = new ShopifyClient($_GET['shop'], "", SHOPIFY_API_KEY, SHOPIFY_SECRET);
         session_unset();

        // Now, request the token and store it in your session.
        $_SESSION['token'] = $shopifyClient->getAccessToken($_GET['code']);
    
        $accessToken = $_SESSION['token'];
        $shopURL= $_GET['shop'];
        if ($_SESSION['token'] != '')
        {
            $_SESSION['shop'] = $_GET['shop'];

        }
          $shopURL='https://'.$_SESSION['shop'];       
header("Location:index.php");
exit;       
}
    // if they posted the form with the shop name
    else if (isset($_POST['shop']) || isset($_GET['shop'])) {

  echo $_GET['code'];
        // Step 1: get the shopname from the user and redirect the user to the
        // shopify authorization page where they can choose to authorize this app
        $shop = isset($_POST['shop']) ? $_POST['shop'] : $_GET['shop'];
        $shopifyClient = new ShopifyClient($shop, "", SHOPIFY_API_KEY, SHOPIFY_SECRET);

        // get the URL to the current page
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on") { 
          $pageURL .= "s";
         }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }

        // redirect to authorize url
        header("Location: " . $shopifyClient->getAuthorizeUrl(SHOPIFY_SCOPE, $pageURL));
        exit;
    }
?> 
<script src="https://cdn.shopify.com/s/assets/external/app.js"></script>
<script type="text/javascript">
    ShopifyApp.init({
      apiKey: '<?php echo $api_key; ?>',
      shopOrigin:"<?php echo $shopURL; ?>",    
      debug: true
    });
 </script>
  <style type="text/css">
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body{
        font-family: 'Work Sans', sans-serif;
        font-size: 16px;
        color: #767676;
        line-height: normal;
        vertical-align: baseline;
        font-weight: normal;
      }
      h1{
        font-size: 28px;
        font-weight: 500;
        margin: 10px 0 15px;
      }
      .loging-page {
          background-image: url(images/app-background.png);
          background-repeat: no-repeat;
          background-size: 100%;
          background-color: #fff;
          background-position: center bottom;
          height: 100vh;
          padding-top: 12.5%;
      }
     .login-page {
        text-align: center;
        margin: 0px auto;
        width: 100%;
        box-shadow: 0 0 3px 0px rgba(0,0,0,0.15);
        max-width: 640px;
        background: rgba(249,249,249,0.65);
        padding: 20px 25px 35px;
        border: 1px #ececec solid;
        border-radius: 3px;
    }
    p.subtitle {
        font-size: 22px;
        font-weight: 400;
        margin: 0 0 15px;
    }
    .subtitle span {
        display: block;
    }
    p.subtitle a {
        background-color: #72b058;
        color: #fff;
        text-decoration: none;
        margin: 10px 0 0;
        border: 1px transparent solid;
        display: inline-block;
        padding: 17px 30px;
        font-size: 18px;
        text-transform: capitalize;
        transition: all 300ms ease-in-out 0s;
        -o-transition: all 300ms ease-in-out 0s;
        -ms-transition: all 300ms ease-in-out 0s;
        -moz-transition: all 300ms ease-in-out 0s;
        -webkit-transition: all 300ms ease-in-out 0s;
    }
    p.subtitle a:hover{
      background-color: transparent;
      border-color: #72b058;
      color: #72b058;
    }
    .install-app-form{
      text-align: left;
    }
    .input-group {
        position: relative;
        width: 100%;
        display: table;
        margin-top: 5px;
          border-collapse: separate;
      }
      .install-app-form .input-group-addon {
        display: table-cell;
    }
    .install-app-form .input-group-addon input{
        background-color: #72b058;
        border: 1px solid #72b058;
        color: #fff;
        font-size: 16px;
        font-weight: 400;
        line-height: 1;
        text-align: center;
        padding: 0 30px;
    }
    .install-app-form input {
        position: relative;
        z-index: 2;
        float: left;
        font-size: 15px;
        width: 100%;
        margin-bottom: 0;
        display: table-cell;
        border: 1px #72b058 solid;
        min-height: 40px;
        padding: 0 15px;
    }
    .install-app-form input:focus{
        outline: 0 none;
    }
  </style>
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700&subset=latin-ext" rel="stylesheet">

<div class="loging-page">
  <div class="login-page">
      <h1>Install this app in a shop to get access to its private admin data.</h1> 

      <p class="subtitle">
          <span class="hint">Don&rsquo;t have a shop to install your app in handy?</span> <a href="https://app.shopify.com/services/partners/api_clients/test_shops">Create a test shop.</a>
      </p> 

      <form action="" method="post" class="install-app-form">
        <label for='shop'><strong>The URL of the Shop</strong> 
          <span class="hint">(enter it exactly like this: myshop.myshopify.com)</span> 
        </label> 
        <div class="input-group"> 
          <input id="shop" name="shop" size="45" type="text" value="" placeholder="enter it exactly like this: myshop.myshopify.com" />
          <span class="input-group-addon"><input name="commit" type="submit" value="Install" /></span>
        </div> 
      </form>

  </div>
</div>