<?php include_layout_template('admin_header.php', ["pageName" => "Post An Ad"]); ?>
      	<li><a href="<?php echo HOME; ?>all-products">All Products</a></li>
        <li><a href="<?php echo HOME; ?>dashboard">My Products</a></li>
        <li class="active"><a href="<?php echo HOME; ?>new-product">Post An Ad</a></li>
        <li><a href="<?php echo HOME; ?>">View Categories</a></li>
      </ul>
    </div> 
  </nav>     
</div>

<div class="row">
	<div class="col-lg-12 col-sm-12">
		<h2>Post An Ad</h2>
		<div id="message">
			<?php echo output_message($message); ?>
		</div>
		<div id = "form">
			<form id="newProductForm" action="<?php echo HOME; ?>new-product" enctype="multipart/form-data" method="POST">
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
				<p>Category:<br />
				<?php global $categories; ?>
					<?php foreach($categories as $category) { ?>
					<input type="radio" name="category_id" value="<?php echo $category["id"]; ?>"  /> <?php echo $category["value"]; ?><br />	
					<?php } ?>
				</p>
				
				<p>Name: <input id="productName" class="form-control" type="text" required maxlength="50" name="name" value="<?php echo $name; ?>" />	
				<p>Price: <input id="productPrice" class="form-control" type="text" required name="price" value="<?php echo $price; ?>" />	(In Rs.)</p>
				<p>Purchase Year: <input id="purchaseYear" class="form-control" type="text" name="pur_year" value="<?php echo $pur_year; ?>" /></p>
				Description: <br />
				<p><textarea id="productDescription" class="form-control" required name="description" cols=150 rows=20><?php echo $description; ?></textarea>				
				<p>Photo: <input type="file" name="file_upload" required /><br />
				Max image size should be less than 5 MB.<br /></p>

				<input class="btn btn-info" type="submit" name="submit" value="Upload" />
			</form>
			<br />
			<p><a href = "<?php echo HOME; ?>dashboard">Cancel</a><br /></p>
		</div>
	</div>
	</div>
</div>
<?php include_layout_template('admin_footer.php'); ?>	
		