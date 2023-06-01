<?php

if(isset($_POST["submit"])){
	// Sanitize input
	$L_Uname = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $L_Upwd = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
	
	require_once 'DBHandler.php';
	require_once 'functions-inc.php';
	
	loginUser($conn, $L_Uname, $L_Upwd);
 
}else{
	header("location: ../../login/");
    exit();
}
