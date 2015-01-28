<?php require_once("../config/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to(HOME."login"); } ?>
<?php
  // 1. the current page number ($current_page)
  $page = !empty($_GET['page']) ? (int) htmlspecialchars($_GET['page']) : 1;

  // 2. records per page ($per_page)
  $per_page = 7;
  
  $sql  = "SELECT * FROM products ";
  $sql .= "WHERE user_id =".$_SESSION['user_id']." ";
  
  // 3. Find the total count of ads/photos/products
  $ads = Product::find_by_sql($sql);
  $total_count = 0;
  foreach($ads as $ad) {
    $total_count++;
  }

  $pagination = new Pagination($page, $per_page, $total_count);

  $sql .= "LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";
  $products = Product::find_by_sql($sql);
  
  include('../view/admin/dashboard.php');
?>
