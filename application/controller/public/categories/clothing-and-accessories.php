<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -40).'library/initialize.php'; ?>
<?php  
	$sql = "SELECT * FROM products ";
	$sql .= "WHERE category = 'Clothing and Accessories'";
	$products = Product::find_by_sql($sql);
?>
<?php include($dir_categories.'clothing-and-accessories.php'); ?>