<?php

  function strip_zeros_from_date( $marked_string="" ) {
    // first remove the marked zeros
    $no_zeros = str_replace('*0', '', $marked_string);
    // then remove any remaining marks
    $cleaned_string = str_replace('*', '', $no_zeros);
    return $cleaned_string;
  }

  function redirect_to( $location = NULL ) {
    if ($location != NULL) {
      header("Location: {$location}");
      exit;
    }
  }

  function output_message($message="") {
    if (!empty($message)) { 
      return "<p class=\"message\">{$message}</p>";
    } else {
      return "";
    }
  }

  function __autoload($class_name) {
  	$class_name = strtolower($class_name);
    $path = APPLICATION.DS.'model'.DS."{$class_name}.php";
    if(file_exists($path)) {
      require_once($path);
    } else {
  		die("The file {$class_name}.php could not be found.");
  	}
  }

  function include_layout_template($template = "", $data = array()) {
    extract($data);
    include(VIEW.DS.'layouts'.DS.$template);
  }

  // Dynamically Initializing the navigation pane
  function navigation($pageName="") {
    $navigation_array = [ 'vehicles' => "Vehicles" , 
                          'electronics-and-computer' => "Electronics and Computer",
                          'mobiles-and-tablets' => "Mobiles and Tablets",
                          'clothing-and-accessories' => "Clothing and Accessories",
                          'books-and-cds' => "Books and CDs",
                          'home-and-furniture' => "Home and Furniture",
                          'other' => "Other"  ];
    $output = "";

    // See if the user is logged in 
    // Logged In - Home else show Dashboard as the first link
    if(!isset($_SESSION['user_id'])) {
      if($pageName == "Home") {
        $output .= "<li class=\"active\"><a href=\"".HOME."\">Home</a></li><br />";
      } else {
        $output .= "<li><a href=\"".HOME."\">Home</a></li><br />";
      }
    } else {
      $output .= "<li><a href=\"".HOME."dashboard\">Dashboard</a></li><br />";
    }
    
    // Then rest of the links from the navigation array
    foreach ($navigation_array as $link => $display) {
      if($display == $pageName) {
        $output .= "<li class=\"active\"><a href=\"".HOME.$link."\">{$display}</a></li><br />";
      } else {
        $output .= "<li><a href=\"".HOME.$link."\">{$display}</a></li><br />";
      }
    }
    return $output;
  }

  // Takes 3 arguments, 1-Pagination object
  // 2-Page on which pagination is applied
  // 3-The current page number
  function pagination_links($pagination="", $page="", $pageNo) {
    $output = "";
    if($pagination->total_pages() > 1) {
      
      if($pagination->has_previous_page()) {
        $output .= " <a href=\"".HOME."{$page}?page=";
        $output .= $pagination->previous_page();
        $output .= "\">&laquo; Previous</a> ";
      }

      for($i=1; $i<= $pagination->total_pages(); $i++) {
        if($i == $pageNo) {
          $output .= " <span class=\"selected\">{$i}</span> ";
        } else {
          $output .= " <a href=\"".HOME."{$page}?page={$i}\">{$i}</a> ";
        }
      }

      if($pagination->has_next_page()) {
        $output .= " <a href=\"".HOME."{$page}?page=";
        $output .= $pagination->next_page();
        $output .= "\">Next &raquo;</a> ";
      }

    }

    return $output;
  }

  function datetime_to_text($datetime="") {
    $unixdatetime = strtotime($datetime);
    return strftime("%B %d, %Y at %I: %M %p", $unixdatetime);
  }

  function password_check($password, $existing_hash) {
    //existing hash contains format and salt or start
    $hash = crypt($password, $existing_hash);
    if($hash == $existing_hash) {
      return true;
    } else {
      return false;
    }
  }

?>