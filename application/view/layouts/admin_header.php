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
  <body class="admin_body">
    <div class="container">
     <!--header-->
      <div class="row">
        <nav class="navbar navbar-default navbar-fixed-top">
          <h1><a href="<?php echo HOME.'dashboard'; ?>" id="pageTop">OLX</a><?php if(isset($_SESSION["user_id"])) { 
                $logged_user = User::find_by_id($_SESSION["user_id"]);
                echo ": ".$logged_user->first_name;
                unset($logged_user);
                echo "<b style=\"float: right; font-size: 18px; margin-right: 1em; font-weight: 0em;\"><a href=\"".HOME."logout\">Logout</a></b>";
                }  ?>
          </h1>
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="collapse">        
            <ul class="nav nav-tabs">
