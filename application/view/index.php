<?php include_layout_template('header.php', ["pageName" => "Home"]); ?>
<!-- Content -->
<div class="col-lg-9 col-sm-7">
  <h3>Find a product:</h3>
  <form id="search-form" action="<?php echo HOME; ?>search" method="post">
    <input id="search-box" autofocus  class="form-control" type="text" name="keyword" placeholder="Name of the product" > <br />
  </form>
  <?php echo output_message($message);  ?>
  <div id="display">
  	<?php foreach($products as $product){      ?>
  	<div class="col-xs-3">
  		<div class="thumbnail">
        <p class="caption">
          <span class="visible-lg visible-md visible-sm"><b>Category:</b> <?php echo $product->category; ?><br/></span>
    			<span class="visible-lg visible-md visible-sm visible-xs"><b>Product:</b> <?php echo $product->name; ?><br /></span>
        </p>
  			<a href="<?php echo HOME; ?>view-product?id=<?php echo $product->id; ?>" >
          <img src="<?php echo ASSETS.$product->image_path(); ?>" width="210" />
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
</div><!-- End Content -->
</div><!-- End Row containing Navigation and Content -->
<?php include_layout_template("footer.php"); ?>