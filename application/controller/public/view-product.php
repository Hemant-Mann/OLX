<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -29).'library/initialize.php'; ?>
<?php
	if(isset($_GET["vehicle"])) { $back = HOME."vehicles"; $id = $_GET["vehicle"]; }
	elseif(isset($_GET["enc"])) { $back = HOME."electronics-and-computer"; $id = $_GET["enc"]; }
	elseif(isset($_GET["mbntab"])) { $back = HOME."mobiles-and-tablets"; $id = $_GET["mbntab"]; }
	elseif(isset($_GET["clothing"])) { $back = HOME."clothing-and-accessories"; $id = $_GET["clothing"]; }
	elseif(isset($_GET["booksncd"])) { $back = HOME."books-and-cds"; $id = $_GET["booksncd"]; }
	elseif(isset($_GET["homenfur"])) { $back = HOME."home-and-furniture"; $id = $_GET["homenfur"]; }
	elseif(isset($_GET["other"])) { $back = HOME."other"; $id = $_GET["other"]; }
	elseif(isset($_GET["id"]) && !isset($_SESSION["user_id"])) { $back = HOME; $id = $_GET["id"]; }
	elseif(isset($_GET["id"]) && isset($_SESSION["user_id"])) { $back = HOME."all-products"; $id = $_GET["id"]; }
	else { redirect_to(HOME); }


$product = Product::find_by_id($id);
if(!$product) {
	$session->message("The Photo could not be located");
	redirect_to(HOME);
}
$user = User::find_by_id($product->user_id);
include($dir_public.'view-product.php');
?>
