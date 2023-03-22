<?php
	session_unset();
	require_once  'controller/mahasiswaController.php';		
    $controller = new mahasiswaController();	
    $controller->mvcHandler();
?>