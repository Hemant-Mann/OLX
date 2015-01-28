<?php require_once("../config/initialize.php"); ?>
<?php  
	$sql = "SELECT * FROM products ";
	$sql .= "WHERE category = 'Home and Furniture'";
	$products = Product::find_by_sql($sql);

?>

<?php include_layout_template('header.php', ["pageName" => "Home and Furniture"]); ?>
<div class="col-lg-9 col-sm-7">
	<h2>Home and Furniture: </h2>

	<?php foreach($products as $product) { ?>
	<div class="col-xs-5">
		<div class="thumbnail">
			<p class="caption">Type: <b><?php echo $product->name; ?><br /></b></p>
		    <a href="<?php echo HOME; ?>view-product?homenfur=<?php echo $product->id; ?>">
			    <img src="<?php echo ASSETS."".$product->image_path(); ?>" width="200" class="img-responsive" />
			</a>
		</div>
	</div>
	<?php } ?>
</div>
</div>
<?php include_layout_template('footer.php'); ?>
