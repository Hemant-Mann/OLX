<?php include_layout_template('admin_header.php', ["pageName" => "Dashboard"]); ?>
        <li><a href="<?php echo HOME; ?>all-products">All Products</a></li>
        <li class="active"><a href="<?php echo HOME; ?>dashboard">Dashboard</a></li>
        <li><a href="<?php echo HOME; ?>new-product">Post An Ad</a></li>
        <li><a href="<?php echo HOME; ?>">View Categories</a></li>
      </ul>
    </div> 
  </nav>     
</div>

<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h2>My AD's</h2>

    <?php echo output_message($message); ?>
    <div class="table-responsive">
      <table class="table table-hover">
        <tr>
          <th>Product</th>
          <th>Category</th>
          <th>Name of Product</th>
          <th>Price (Rs.)</th>
          <th>Description</th>
          <th>&nbsp;</th>
        </tr>
        <?php foreach($products as $product) { ?>
        <tr>
          <td><img src="<?php echo ASSETS.$product->image_path(); ?>" width="120" /></td>
          <td><?php echo $product->category; ?></td>
          <td><?php echo $product->name; ?></td>
          <td><?php echo $product->price; ?></td>
          <td><?php echo $product->description; ?></td>
          <td><a href="<?php echo HOME; ?>delete-product?id=<?php echo $product->id; ?>" onclick="return confirm('Are you sure?')">Remove</a>
        </tr>
      <?php } ?>
      </table>
    </div><!-- End div for Table -->

    <!-- Display pagination links -->
    <div id="pagination" style="clear: both;">
      <?php echo pagination_links($pagination, "dashboard", $page);    ?>
    </div>
    
  </div>
</div><!-- End content Row -->
<?php include_layout_template('admin_footer.php'); ?>
