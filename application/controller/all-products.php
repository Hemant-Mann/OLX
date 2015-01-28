<?php require_once("../config/initialize.php"); ?>
<?php
if (!$session->is_logged_in()) { redirect_to(HOME."login"); }

  // 1. the current page number ($current_page)
  $page = !empty($_GET['page']) ? (int) htmlspecialchars($_GET['page']) : 1;

  // 2. records per page ($per_page)
  $per_page = 8;

  // 3. total record count ($total_count)
  $total_count = Product::count_all();

  // Find all the photos
  // instead of using this $photos = Photograph::find_all();
  // use pagination instead

  $pagination = new Pagination($page, $per_page, $total_count);

  // Instead of finding all records, just find the recoreds
  // for this page
  $sql  = "SELECT * FROM products ";
  $sql .= "LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";
  $products = Product::find_by_sql($sql);
  
  include('../view/admin/all-products.php');

?>
