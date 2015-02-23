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
					<input type="radio" name="category" value="Vehicles" checked /> Vehicles<br />	
					<input type="radio" name="category" value="Electronics and Computer" /> Electronics and Computer<br />
					<input type="radio" name="category" value="Mobiles and Tablets" /> Mobiles and Tablet<br />
					<input type="radio" name="category" value="Clothing and Accessories" /> Clothing and Accessories<br />
					<input type="radio" name="category" value="Books and CDs" /> Books and CDs<br />
					<input type="radio" name="category" value="Home and Furniture" /> Home and Furniture<br />
					<input type="radio" name="category" value="Other"> Other
				</p>
				
				<p>Name: <input id="productName" class="form-control" type="text" required name="name" value="<?php echo $name; ?>" />	
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
		