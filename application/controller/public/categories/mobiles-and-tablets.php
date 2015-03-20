<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -39).'library/initialize.php'; ?>
<?php  
	$sql = "SELECT * FROM products ";
	$sql .= "WHERE category = 'Mobiles and Tablets'";
	$products = Product::find_by_sql($sql);

?>
<?php include($dir_categories.'mobiles-and-tablets.php'); ?>