<?php
require_once("../config/initialize.php");
if (!$session->is_logged_in()) { redirect_to(HOME."login"); } ?>
<?php
	// Max file size is 5 MB
	$max_file_size = 5242880;   // expressed in bytes
	                            //     10240 =  10 KB
	                            //    102400 = 100 KB
	                            //   1048576 =   1 MB
	                            //  10485760 =  10 MB

	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$price = $_POST['price'];
		$pur_year = $_POST['pur_year'];
		$description = $_POST['description'];
		
		// Instantiate a new product
		$product = new Product();
		$product->user_id = $_SESSION["user_id"];
		$product->name = $name;
		$product->price = $price;
		
		if(isset($_POST['category'])) {
			$category = $_POST['category'];
			$product->category = $category;
		} else {
			$product->category = "";
		}
		
		if(isset($_POST['pur_year'])) {
			$product->pur_year = $pur_year;
		} else {
			$product->pur_year = 0;
		}
		
		$product->description = $description;
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
		$name = "";
		$price = "";
		$pur_year = "";
		$description = "";
	}	
	include('../view/admin/new-product.php');
?>
