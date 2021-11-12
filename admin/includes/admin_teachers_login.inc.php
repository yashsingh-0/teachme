<?php
if (isset($_POST['login'])) {
	include('../../includes/connection.inc.php');
	$conn=dbcon();
	$email=$_POST['email'];
	$password=$_POST['password'];
	$emailquery="SELECT * FROM `teachers_info` WHERE `email`='$email'";
	$namequery="SELECT `name` FROM `teachers_info` WHERE `email`='$email'";
	$queryrun=mysqli_query($conn,$emailquery);
	$query_run=mysqli_query($conn,$namequery);
	if (empty($email) || empty($password)) {
		header("location: ../admin-teachers-login.php?error=emptyfields");
		exit();
	}
	else if (mysqli_num_rows($queryrun) <= 0) {
		header("location: ../admin-teachers-login.php?error=UserDoesNotExist");
		exit();
	}
	else {
	$passfetch="SELECT `password` FROM `teachers_info` WHERE `email`='$email'";
	$querypwdrun=mysqli_query($conn, $passfetch);
	$fetchassocarr = mysqli_fetch_assoc($querypwdrun);
	$pwdcheck=password_verify($password,$fetchassocarr['password']);
		if ($pwdcheck == false) {
			header("location: ../admin-teachers-login.php?error=wrongpassword");
			exit();
		}
		else if($pwdcheck == true) {
			session_start();
			$emailfetch = mysqli_fetch_assoc($queryrun);
			$namefetch = mysqli_fetch_assoc($query_run);
			$_SESSION['email'] = $emailfetch['email'];
			$_SESSION['fullname'] = $namefetch['name'];
			header("location: ../admin-teachers-panel.php?email=".$_SESSION['email']."&name=".$_SESSION['fullname']);
		}
	}
}
else {

	header("location: ../admin-teachers-login.php");
}

?>