<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -28).'library/initialize.php'; ?>
<?php	
    $session->logout();
    redirect_to(HOME."login");
?>
