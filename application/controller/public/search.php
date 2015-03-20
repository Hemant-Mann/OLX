<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -29).'library/initialize.php'; ?>
<?php
  if(isset($_POST['keyword'])) {
    $keywords = htmlentities($_POST["keyword"]);
    
    if($keywords == "" && !isset($_SESSION["user_id"])) {
    	redirect_to(HOME);
    } elseif($keywords == "" && isset($_SESSION["user_id"])) {
    	redirect_to(HOME."all-products");
    }

    $products = Product::search($keywords);

    if($products == null) {
	    // No results found
    	$session->message("Sorry could not find the product");
      redirect_to(HOME);	
    }

  } else {
	  // Probably a GET request
  	redirect_to(HOME);
  }

  include($dir_public.'search.php');
?>
