<?php include_layout_template('header.php', ["pageName" => "Search"]); ?>
<div id="myResults">
	<?php foreach($products as $product) { ?>
		<div class="col-xs-3">
			<div class="thumbnail">
		 		<p class="caption">
				Category: <?php echo $product->category; ?><br/>
				Product: <?php echo $product->name; ?><br />
		  		</p>
				<a href="<?php echo HOME; ?>view-product?id=<?php echo $product->id; ?>" class="img-responsive">
				<img src="<?php echo ASSETS."".$product->image_path(); ?>" width="200" height="200" />
				</a>	
			</div>
	  	</div>
	<?php } ?>
</div>
<?php include_layout_template('footer.php'); ?>