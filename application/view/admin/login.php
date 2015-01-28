<?php include_layout_template('header.php', ["pageName" => "Login"]); ?>
  <div class="col-lg-9 col-sm-7">
    <div id="form">
  		<h2>Login</h2>
  		<?php echo output_message($message); ?>

  		<form action="<?php echo HOME; ?>login" method="post">
  		   <br />
         <p class="form-group">
  		        <input autofocus class="form-control" type="text" name="username" maxlength="30" placeholder="Username" value="<?php echo htmlentities($username); ?>" /></p>
         <p class="form-group">
  		        <input class="form-control" type="password" name="password" maxlength="30" placeholder="Password" value="" /></p><br />
  		
  		   <p><input class="btn btn-info" type="submit" name="submit" value="Login" /></p>
  		</form><br />
      New User? <a href="<?php echo HOME; ?>register">Sign Up</a><br /><br />
      <a href="<?php echo HOME; ?>">Home</a>
    </div>
  </div>
</div>
<?php include_layout_template('footer.php'); ?>