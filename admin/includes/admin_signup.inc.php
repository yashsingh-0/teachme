<?php
if (isset($_POST['submit'])) {
	include('../../includes/connection.inc.php');
 $conn=dbcon();
 $fullname = $_POST['fullname'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $query = "SELECT `email` FROM `admin_info` WHERE `email`='$email'";
 $queryresult = mysqli_query($conn, $query);
	 if (empty($fullname) || empty($email) || empty($password)) {
	 	header("location: ../admin-signup.php?error=fieldsempty&fullname=".$fullname."&email=".$email);
	 	exit();
	 }
	 else if (mysqli_num_rows($queryresult) > 0) {
	 	header("location: ../admin-signup.php?error=UserAlreadyExist&fullname=".$fullname);
	 	exit();
	 }
	 else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 	header("location: ../admin-signup.php?error=invalidemail&fullname=".$fullname);
	 	exit();
	 }
	 else {
	 	$hash = password_hash($password, PASSWORD_DEFAULT);
	 	$insertquery="INSERT INTO `admin_info`(`id`, `name`, `email`, `password`) VALUES ('', '$fullname','$email','$hash')";
	 	if (mysqli_query($conn,$insertquery)) {
	 		header("location: ../admin-panel.php?admin_signup=success");
	 	}
	 	else {
	 		header("location: ../admin-panel.php?admin_signup=error");
	 	}
	 }

}
else {
	header("location: ../admin-signup.php");
}
?>