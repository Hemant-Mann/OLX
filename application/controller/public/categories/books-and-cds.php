<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -39).'library/initialize.php'; ?>
<?php  
	$sql = "SELECT * FROM products ";
	$sql .= "WHERE category = 'Books and CDs'";
	$products = Product::find_by_sql($sql);
?>
<?php include($dir_categories.'books-and-cds.php'); ?>