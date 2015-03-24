<?php include_layout_template('header.php', ["pageName" => "Home"]); ?>
<!-- Content -->
<div class="col-lg-9 col-sm-7">
  <h3>Find a product:</h3>
  <form id="search-form" action="<?php echo HOME; ?>search" method="post">
    <input id="search-box" autofocus  class="form-control" type="text" name="keyword" placeholder="Name of the product" > <br />
  </form>
  <?php echo output_message($message);  ?>

  <div id="display">
  	<?php foreach($products as $product){ ?>
    <?php $cat_name = category_details($product->category_id, NULL); ?>
  	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-5">
  		<div>
        <p>
          <span class="visible-lg visible-md visible-sm"><b>Category:</b> <?php echo $cat_name; ?><br/></span>
    			<span class="visible-lg visible-md visible-sm visible-xs"><b>Product:</b> <?php echo $product->name; ?><br /></span>
        </p>
    
  			<a class="thumbnail" href="<?php echo ASSETS.$product->image_path(); ?>" title="<?php echo $cat_name.': '.$product->name; ?>" data-gallery>
          <img src="<?php echo ASSETS.$product->image_path(); ?>" width="210" alt="<?php echo $product->name; ?>" />
  			</a>	
  		</div>
    </div>
  	<?php } ?>
    <div id="pagination" style="clear: both;">
      <?php echo pagination_links($pagination, "home", $page);   ?>
      </div>
    </div>
  <!-- Showing search results -->
  <div id="search-results">
  </div>
  <?php include($dir_public.'lightbox.php'); ?>
</div><!-- End Content -->
</div><!-- End Row containing Navigation and Content -->
<?php include_layout_template("footer.php"); ?>