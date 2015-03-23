<?php include_layout_template('header.php', ["pageName" => "Search"]); ?>
<div id="myResults">
	<?php foreach($products as $product) { ?>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-5">
  		<div>
        <p>
          <span class="visible-lg visible-md visible-sm"><b>Category:</b> <?php echo $product->category; ?><br/></span>
    			<span class="visible-lg visible-md visible-sm visible-xs"><b>Product:</b> <?php echo $product->name; ?><br /></span>
        </p>
    
  			<a class="thumbnail" href="<?php echo ASSETS.$product->image_path(); ?>" title="<?php echo $product->category. ': '.$product->name; ?>" data-gallery>
          <img src="<?php echo ASSETS.$product->image_path(); ?>" width="210" alt="<?php echo $product->name; ?>" />
  			</a>	
  		</div>
    </div>
	<?php } ?>
</div>
<?php include_layout_template('footer.php'); ?>