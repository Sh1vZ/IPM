<?php
session_start();
include(dirname(__FILE__)."/../conn.php");
if(isset($_POST['login_button'])) {
	$user_name = trim($_POST['username']);
	$user_password = trim($_POST['password']);
	
	$sql = "SELECT admin_ID, admin_naam, admin_password FROM admin WHERE admin_naam='$user_name' and admin_naam='$user_password'";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	$row = mysqli_fetch_assoc($resultset);	
		
	if (isset($row['admin_password'])==$user_password){				
		echo "ok";
		$_SESSION['user_session'] = $row['admin_ID'];
	} 
	
	else {				
		echo "Email or password incorrect. Please try again"; 
	}		
}
?>