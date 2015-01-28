<div id="colorbox">
<div id="cboxContent">
	<a href="<?php echo $back; ?>">&laquo; Back</a>
	<div id="description">
		By: <b><?php echo $user->first_name; ?></b><br />
		Price: Rs. <?php echo $product->price; ?><br />
		Contact: <?php echo $user->phone ?><br />
		<?php if(!empty($product->pur_year)) {	echo "Purchased In: ". $product->pur_year;	} ?>
		<div style="margin-left: 20px; ">
			<img src="<?php echo ASSETS.$product->image_path(); ?>" width="50%"/>	
		</div>
		<div class="message">
			<p><?php echo $product->description; ?> </p>
		</div>
	</div>
</div>
</div>
