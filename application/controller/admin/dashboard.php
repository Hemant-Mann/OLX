<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -28).'library/initialize.php'; ?>
<?php if (!$session->is_logged_in()) { redirect_to(HOME."login"); } ?>
<?php
  // 1. the current page number ($current_page)
  $page = !empty($_GET['page']) ? (int) htmlspecialchars($_GET['page']) : 1;

  // 2. records per page ($per_page)
  $per_page = 7;
  
  // 3. Find the total count of ads/photos/products
  $ads = Product::find_by_field("user_id", $_SESSION['user_id']);
  $total_count = 0;
  if($ads) {
    foreach($ads as $ad) {
      $total_count++;
    }
  } else {
    $ads = [];
  }

  $pagination = new Pagination($page, $per_page, $total_count);

  $products = Product::find_by_field("user_id", $_SESSION['user_id'], ["limit" => $per_page, "offset" => $pagination->offset()]);
  if(!$products) { $products = []; }
  include($dir_admin.'dashboard.php');
?>
