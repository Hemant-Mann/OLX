<?php include_layout_template('header.php', ["pageName" => "Register"]); ?>
<div class="col-lg-9 col-sm-7">
	<div id="message">
		<?php 
		if($message==="You are successfully registered!") {
			$complete = "<script type=\"text/javascript\">";
			$complete .= "alert('You are registered! Please login to continue!');";
			$complete .= "</script>";
			echo $complete;
		}
		else {
			echo output_message($message);
			}	
		?>
	</div>
	<h2>New Member</h2>

	<form id="registerForm" action="<?php echo HOME; ?>register" method="post">
		<p>First Name:
			<input autofocus id="firstName" class="form-control" type="text" name="first_name" value="<?php echo htmlentities($first_name); ?>" />
		</p>
		<p>Last Name:
			<input id="lastName" class="form-control" type="text" name="last_name" value="<?php echo htmlentities($last_name); ?>" />
		</p>
		<p>Phone No:
			<input id="phone" class="form-control" type="text" name="phone" value="<?php echo htmlentities($phone); ?>" />
		</p>
		<p>Email Id:
			<input id="email" class="form-control" type="text" name="email" value="<?php echo htmlentities($email); ?>" />
		</p>
		<p>Username:
			<input id="username" class="form-control" type="text" name="username" value="<?php echo htmlentities($username); ?>" />
			(Please select any Username of your choice)
		</p>
		<p>Password:
			<input id="password" class="form-control" type="password" name="password" value="<?php echo htmlentities($password); ?>" />
		</p>
		<p>Re-Type password:
			<input id="confirmation" class="form-control" type="password" name="confirmation" value="" />
		</p>
		<p>
		<input type="submit" id="submit" class="btn btn-info" name="submit" value="Sign Up" /></p>
	</form>

	<br />
 <a href="<?php echo HOME; ?>">Cancel</a>
</div><!-- End Page Content -->
</div><!-- End Row -->
<?php include_layout_template('footer.php'); ?>