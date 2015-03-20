<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -28).'library/initialize.php'; ?>
<?php
if (!$session->is_logged_in()) { redirect_to(HOME."login"); }

  // 1. the current page number ($current_page)
  $page = !empty($_GET['page']) ? (int) htmlspecialchars($_GET['page']) : 1;

  // 2. records per page ($per_page)
  $per_page = 8;

  // 3. total record count ($total_count)
  $total_count = Product::count_all();

  $pagination = new Pagination($page, $per_page, $total_count);

  $products = Product::find_all(["limit" => $per_page, "offset" => $pagination->offset()]);
  
  include($dir_admin.'all-products.php');

?>
