<?php include_layout_template('admin_header.php', ["pageName" => "All Products"]); ?>
        <li class="active"><a href="<?php echo HOME; ?>all-products">All Products</a></li>
        <li><a href="<?php echo HOME; ?>dashboard">Dashboard</a></li>
        <li><a href="<?php echo HOME; ?>new-product">Post An Ad</a></li>
        <li><a href="<?php echo HOME; ?>">View Categories</a></li>
      </ul>
    </div> 
  </nav>     
</div><!-- End Navigation Pane -->

<div class="row">
  <div class="col-lg-12 col-sm-12">
    <?php echo output_message($message); ?>
    <h3>Find a product:</h3>
    <form id="search-form" action="<?php echo HOME; ?>search" method="post">
      <input id="search-box" autofocus class="form-control" type="text" name="keyword" placeholder="Name of the product" > <br />
    </form>
   
    <div id="display">
      <?php foreach($products as $product) { ?>
      <div class="col-xs-4">
        <div class="thumbnail">
          <p class="caption">
            Category: <?php echo $product->category; ?><br/>
            Product Name: <?php echo $product->name; ?><br />
          </p>
          <a href="<?php echo HOME; ?>view-product?id=<?php echo $product->id; ?>" class="img-responsive">
            <img src="<?php echo ASSETS.$product->image_path(); ?>" width="200" height="200" />
          </a>  
        </div>
      </div>
      <?php } ?>

      <div id="pagination" style="clear: both;">
        <?php echo pagination_links($pagination, "all-products", $page);     ?>
      </div>
    </div>
    <div id="search-results">
    </div>
  </div>
</div><!-- End Content Row -->
<?php include_layout_template('admin_footer.php'); ?>	
