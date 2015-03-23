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
    <?php foreach($products as $product){ ?>
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
    <div id="pagination" style="clear: both;">
      <?php echo pagination_links($pagination, "all-products", $page);   ?>
      </div>
    </div>
  </div>
  <!-- Showing search results -->
  <div id="search-results">
  </div>
  <?php include($dir_public.'lightbox.php'); ?>
</div><!-- End Content Row -->
<?php include_layout_template('admin_footer.php'); ?>	
