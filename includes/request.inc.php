<?php
include './session.inc.php';
include './connection.inc.php';
$conn = dbcon();
if (isset($_POST['maths']) || isset($_POST['physics']) || isset($_POST['chemistry']) || isset($_POST['biology'])) {
	$fetchreq = "SELECT * FROM `requests_info` WHERE `email` = '$_SESSION[email]'";
	$fetchreqrun = mysqli_query($conn, $fetchreq);
	$fetchrow = mysqli_fetch_row($fetchreqrun);
	$maths_req = 0;
	$physics_req = 0;
	$chemistry_req = 0;
	$biology_req = 0;
	if ($fetchrow > 0) {
		if (isset($_POST['maths'])) {
			$sqlm = "UPDATE `requests_info` SET `maths` = `maths` + 1 WHERE `email` = '$_SESSION[email]'";
			$sqlr = mysqli_query($conn, $sqlm);
			header("location: ../home.php?email=".$_SESSION['email']."&reqSuc=mathsup");
			exit();
		}
		else if (isset($_POST['physics'])) {
			$sqlm = "UPDATE `requests_info` SET `physics` = `physics` + 1 WHERE `email` = '$_SESSION[email]'";
			$sqlr = mysqli_query($conn, $sqlm);
			header("location: ../home.php?email=".$_SESSION['email']."&reqSuc=physicsup");
			exit();
		}
		else if (isset($_POST['chemistry'])) {
			$sqlm = "UPDATE `requests_info` SET `chemistry` = `chemistry` + 1 WHERE `email` = '$_SESSION[email]'";
			$sqlr = mysqli_query($conn, $sqlm);
			header("location: ../home.php?email=".$_SESSION['email']."&reqSuc=chemistryup");
			exit();
		}
		else if (isset($_POST['biology'])) {
			$sqlm = "UPDATE `requests_info` SET `biology` = `biology` + 1 WHERE `email` = '$_SESSION[email]'";
			$sqlr = mysqli_query($conn, $sqlm);
			header("location: ../home.php?email=".$_SESSION['email']."&reqSuc=biologyup");
			exit();	
	}
	}
	else {
		if (isset($_POST['maths'])) {
			$maths_req++;
			$sqlm = "INSERT INTO `requests_info`(`id`, `email`, `maths`, `physics`, `chemistry`, `biology`) VALUES ('', '$_SESSION[email]', '$maths_req', '$physics_req', '$chemistry_req', '$biology_req')";
			$sqlr = mysqli_query($conn, $sqlm);
			header("location: ../home.php?email=".$_SESSION['email']."&reqSuc=maths");
			exit();
		}
		else if (isset($_POST['physics'])) {
			$physics_req++;
			$sqlm = "INSERT INTO `requests_info`(`id`, `email`, `maths`, `physics`, `chemistry`, `biology`) VALUES ('', '$_SESSION[email]', '$maths_req', '$physics_req', '$chemistry_req', '$biology_req')";
			$sqlr = mysqli_query($conn, $sqlm);
			header("location: ../home.php?email=".$_SESSION['email']."&reqSuc=physics");
			exit();
		}
		else if (isset($_POST['chemistry'])) {
			$chemistry_req++;
			$sqlm = "INSERT INTO `requests_info`(`id`, `email`, `maths`, `physics`, `chemistry`, `biology`) VALUES ('', '$_SESSION[email]', '$maths_req', '$physics_req', '$chemistry_req', '$biology_req')";
			$sqlr = mysqli_query($conn, $sqlm);
			header("location: ../home.php?email=".$_SESSION['email']."&reqSuc=chemistry");
			exit();
		}
		else if (isset($_POST['biology'])) {
			$biology_req++;
			$sqlm = "INSERT INTO `requests_info`(`id`, `email`, `maths`, `physics`, `chemistry`, `biology`) VALUES ('', '$_SESSION[email]', '$maths_req', '$physics_req', '$chemistry_req', '$biology_req')";
			$sqlr = mysqli_query($conn, $sqlm);
			header("location: ../home.php?email=".$_SESSION['email']."&reqSuc=biology");
			exit();	
		}
	}	
}
else {
	header("location: ../home.php?email=".$_SESSION['email']);
	exit();
}


?>