<?php include_layout_template('header.php', ["pageName" => "Vehicles"]); ?>
<div class="col-lg-9 col-sm-7">
	<h2>Vehicles: </h2>

	<?php foreach($products as $product) { ?>
	<div class="col-xs-5">
		<div class="thumbnail">
			<p class="caption"><b><?php echo $product->name; ?><br /></b></p>
		    <a href="<?php echo HOME; ?>view-product?vehicle=<?php echo $product->id; ?>">
			    <img src="<?php echo ASSETS."".$product->image_path(); ?>" width="200" class="img-responsive" />
			</a>
		</div>
	</div>
	<?php } ?>
</div>
</div>
<?php include_layout_template('footer.php'); ?>
