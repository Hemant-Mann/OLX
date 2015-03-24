<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -40).'library/initialize.php'; ?>
<?php  
	$id = category_details(NULL, "Clothing and Accessories");
	$products = Product::find_by_field("category_id", $id);
?>
<?php include($dir_categories.'clothing-and-accessories.php'); ?>