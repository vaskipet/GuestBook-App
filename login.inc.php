<?php
session_start();
include 'dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

setcookie('name', 'zorro', time() + 86400);

$sql = "SELECT * FROM user WHERE uid = '$uid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hash_pwd = $row['pwd'];
 //de-hashing the password.
$hash = password_verify($pwd, $hash_pwd);


if ($hash == 0) { 
	header("Location: index.php?error=empty");
	exit();
} else {

	$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$hash_pwd'";
	$result = mysqli_query($conn, $sql);

	if (!$row = mysqli_fetch_assoc($result)) {
	  echo "Your username or password is incorrect!"; //For troubleshooting.. header() brings the user in to the frontpage of course.
	} else {
	  $_SESSION['id'] = $row['id']; //Unique id that only one user has.
	}

	header("refresh:1; index.php");

}
?>
