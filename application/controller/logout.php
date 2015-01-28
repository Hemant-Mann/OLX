<?php require_once("../config/initialize.php"); ?>
<?php	
    $session->logout();
    redirect_to(HOME."login");
?>
