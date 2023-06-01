<?php

if (isset($_POST["submit"])){
	$Uname = $_POST["Uname"];
	$ULname = $_POST["ULname"];
	$UFname = $_POST["UFname"];
	$Upwd = $_POST["Upwd"];
	$Upwdrepeat = $_POST["Upwdrepeat"];
	$Utype = $_POST["Utype"];
	
	require_once 'DBHandler.php';
	require_once 'functions-inc.php';
	
	if (invalidUname($Uname) !== false){
		header("location: ../../homepage/?error=invalidUsername");
		exit();
	}
	
	if (pwdMatch($Upwd, $Upwdrepeat) !== false){
		header("location: ../../homepage/?error=passwordsDontMatch");
		exit();
	}
	
	if (UnameExists($conn, $Uname) !== false){
		header("location: ../../homepage/?error=UsernameTaken");
		exit();
	}
	
	createUser($conn, $Uname, $ULname, $UFname, $Upwd, $Utype);
}else{
	header("location: ../../login/");
	exit();
}
