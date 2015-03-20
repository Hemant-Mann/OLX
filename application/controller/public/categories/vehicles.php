<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -22).'library/initialize.php'; ?>
<?php  
	$sql = "SELECT * FROM products ";
	$sql .= "WHERE category = 'Vehicles'";
	$products = Product::find_by_sql($sql);

?>
<?php include($dir_categories.'vehicles.php'); ?>