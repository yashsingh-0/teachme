<?php
if (isset($_POST['submit'])) {
	include('connection.inc.php');
 $conn=dbcon();
 $fullname = $_POST['fullname'];
 $email = $_POST['email'];
 $occupation = $_POST['occupation'];
 $password = $_POST['password'];
 $query = "SELECT `email` FROM `user_info` WHERE `email`='$email'";
 $queryresult = mysqli_query($conn, $query);
	 if (empty($fullname) || empty($email) || empty($occupation) || empty($password)) {
	 	header("location: ../signup.php?error=fieldsempty&fullname=".$fullname."&email=".$email);
	 	exit();
	 }
	 else if (mysqli_num_rows($queryresult) > 0) {
	 	header("location: ../signup.php?error=UserAlreadyExist&fullname=".$fullname);
	 	exit();
	 }
	 else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 	header("location: ../signup.php?error=invalidemail&fullname=".$fullname);
	 	exit();
	 }
	 else {
	 	$hash = password_hash($password, PASSWORD_DEFAULT);
	 	$insertquery="INSERT INTO `user_info`(`id`, `name`, `email`, `occupation`, `password`,`verified`) VALUES ('', '$fullname','$email','$occupation','$hash', 0)";
	 	if (mysqli_query($conn,$insertquery)) {
	 		header("location: ../login.php?signup=success");
	 	}
	 	else {
	 		header("location: ../signup.php?signup=error");
	 	}
	 }

}
else {
	header("location: ../signup.php");
}
?>