<?php
include './session.inc.php';
include './connection.inc.php';
$conn=dbcon();
$searchstring= mysqli_real_escape_string($conn, $_POST['searchstring']);
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}
else if (empty($_POST['searchstring'])) {
    header("Location: ../home.php");
    exit();
}
else {
    $sql = "SELECT * FROM `user_info` WHERE name LIKE '%$searchstring%' OR `email` LIKE '%$searchstring%'";
    $sqlrun = mysqli_query($conn, $sql);
    $sqlrow = mysqli_num_rows($sqlrun);
    if ($sqlrow > 0) {
        header("Location: ../search.php?results=$sqlrow&query=$searchstring");
        exit();
    }
    else {
        header("Location: ../search.php?results=noresults&query=$searchstring");
        exit();
    }
}
?>
