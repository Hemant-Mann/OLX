<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>OLX: <?php echo $pageName; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo STYLESHEETS; ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo STYLESHEETS; ?>blueimp-gallery.min.css" rel="stylesheet">
    <link href="<?php echo STYLESHEETS; ?>bootstrap-image-gallery.min.css" rel="stylesheet">
    <link href="<?php echo STYLESHEETS; ?>main.css" media="all" rel="stylesheet" type="text/css" />

    <script src="<?php echo JAVASCRIPTS; ?>respond.js"></script>
  </head>
  <body>
    <div class="container">
      <!--header row-->
      <div class="row">
        <nav class="navbar navbar-default navbar-fixed-top">
          <h1>OLX<?php if(isset($_SESSION["user_id"])) { 
          			$logged_user = User::find_by_id($_SESSION["user_id"]);
          			echo ": ".$logged_user->first_name;
          			unset($logged_user);
          			echo "<b style=\"float: right; font-size: 18px; margin-right: 1em; font-weight: 0em;\"><a href=\"".HOME."logout\">Logout</a></b>";
          		  } else {
      				    echo "<b style=\"float: right; font-size: 18px; margin-right: 1em; font-weight: 0em;\"><a href=\"".HOME."register\">Register</a> <a href=\"".HOME."login\">Log In</a></b>";
                }  ?>
          </h1>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-4">
          <!-- Navigation Pane -->
          <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="collapse">        
              <h3>Navigation</h3>
              <ul class="nav nav-pills nav-stacked">
                <?php echo navigation($pageName); ?>
              </ul>
            </div>
          </nav>
        </div><!-- End Navigation -->
               
