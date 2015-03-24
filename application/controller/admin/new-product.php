<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -28).'library/initialize.php'; ?>
<?php

if (!$session->is_logged_in()) { redirect_to(HOME."login"); } ?>
<?php
	// Max file size is 1 MB
	$max_file_size = 1048576;  

	if(isset($_POST['submit'])) {		
		// Instantiate a new product
		$product = new Product();
		$product->user_id = $_SESSION["user_id"];
		$product->name = $name = $_POST['name'];
		$product->price = $price = $_POST['price'];
		$product->category_id = $category_id = $_POST['category_id'];
		
		if(isset($_POST['pur_year'])) {
			$product->pur_year = $pur_year = $_POST['pur_year'];
		} else {
			$product->pur_year = 0;
		}
		
		$product->description = $description = $_POST['description'];
		$product->attach_file($_FILES['file_upload']);
		
		if($product->save()) {
			// Success
			$session->message("Ad uploaded successfully...");
			redirect_to(HOME."dashboard");
		} else {
			// Failure
			$message = join("<br />", $product->errors);
		}
	} else {
		$name = $price = $pur_year = $description = "";		
	}	
	include($dir_admin.'new-product.php');
?>
