<?php include_layout_template('header.php', ["pageName" => "Books and CDs"]); ?>
<div class="col-lg-9 col-sm-7">
	<h2>Books/CDs: </h2>
	<?php foreach($products as $product) { ?>
	<div class="col-xs-5">
		<div class="thumbnail">
			<p class="caption">Product Name: <b><?php echo $product->name; ?><br /></b></p>
		    <a href="<?php echo HOME; ?>view-product?booksncd=<?php echo $product->id; ?>">
			    <img src="<?php echo ASSETS; ?><?php echo $product->image_path(); ?>" class="img-responsive" width="200" />
			</a>
		</div>
	</div>
	<?php } ?>
</div>
</div>
<?php include_layout_template('footer.php'); ?>
