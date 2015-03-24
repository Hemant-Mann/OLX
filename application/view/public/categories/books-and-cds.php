<?php include_layout_template('header.php', ["pageName" => "Books and CDs"]); ?>
<div class="col-lg-9 col-sm-8">
	<h2>Books/CDs: </h2>
	<?php foreach($products as $product) { ?>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-5">
  		<div>
        <p><?php echo $product->name; ?><br /></p>
		<a class="thumbnail" href="<?php echo HOME; ?>view-product?booksncd=<?php echo $product->id; ?>">
 			<img src="<?php echo ASSETS.$product->image_path(); ?>" width="210" alt="<?php echo $product->name; ?>" />
		</a>	
  		</div>
    </div>
	<?php } ?>
</div>
</div>
<?php include_layout_template('footer.php'); ?>
