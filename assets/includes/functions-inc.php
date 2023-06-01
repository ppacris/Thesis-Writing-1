<?php

function invalidUname($Uname){
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $Uname)){
		$result = true;
	}else{
		$result = false;
	}
	return $result;
}

function pwdMatch($Upwd, $Upwdrepeat){
	$result;
	if ($Upwd !== $Upwdrepeat){
		$result = true;
	}else{
		$result = false;
	}
	return $result;
}

function UnameExists($conn, $Uname){
	$sql = "SELECT * FROM users WHERE username = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../../homepage/?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "s", $Uname);
	mysqli_stmt_execute($stmt);
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if ($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}else{
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
}

function createUser($conn, $Uname, $ULname, $UFname, $Upwd, $Utype){
	$sql = "INSERT INTO users (username, usersLNAME, usersFNAME, usersPassword, usersType) VALUES(?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../../homepage/?error=stmtfailed");
		exit();
	}
	
	$hashedPwd = password_hash($Upwd, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt, "sssss", $Uname, $ULname, $UFname, $hashedPwd, $Utype);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../../homepage/?error=none");
	exit();
}

function loginUser($conn, $L_Uname, $L_Upwd){
	$UnameExists = UnameExists($conn, $L_Uname);
	
	if ($UnameExists === false){
        header("location: ../../login/?error=WrongLogin");
        exit();
    }
    
    $Pwdhashed = $UnameExists["usersPassword"];
    $checkPwd = password_verify($L_Upwd, $Pwdhashed);
	
	if($checkPwd === false){
        header("location: ../../login/?error=Wronglogin");
        exit();
    }
	else if($checkPwd === true){
		session_start();
		$_SESSION["userid"] = $UnameExists["usersID"];
		$_SESSION["useruid"] = $UnameExists["username"];
		
		if($UnameExists['username'] == $L_Uname){
            header('location: ../../homepage/');
            exit();
        }else{
            header('location: ../../login/');
            exit();
        }
    }
}
