<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -29).'library/initialize.php'; ?>
<?php
 // 1. the current page number ($current_page)
  $page = !empty($_GET['page']) ? (int) htmlspecialchars($_GET['page']) : 1;

  // 2. records per page ($per_page)
  $per_page = 6;

  // 3. total record count ($total_count)
  $total_count = Product::count_all();

  $pagination = new Pagination($page, $per_page, $total_count);

  $products = Product::find_all(["limit" => $per_page, "offset" => $pagination->offset()]);
  
  global $categories;
  include($dir_public.'index.php');

?>
