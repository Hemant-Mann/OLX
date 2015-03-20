<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -28).'library/initialize.php'; ?>
<?php if (!$session->is_logged_in()) { redirect_to(HOME."login"); } ?>
<?php
	//must have an ID
	if(empty($_GET['id'])) {
		$session->message("No product ID was provided.");
		redirect_to(HOME."all-products");
	}

	$product = Product::find_by_id($_GET['id']);
	if($product && $product->destroy()) {
		$session->message("The AD for ". $product->name. " was removed.");
		redirect_to(HOME."dashboard");
	} else {
		$session->message("The AD could not be removed.");
		redirect_to(HOME."dashboard");
	}
?>

<?php if(isset($database)) { $database->close_connections(); } ?>