<?php
session_start();
include 'dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

//Prepared statement for logging in SQLquery.
$stmt = $conn->prepare("SELECT * FROM user WHERE uid = ?");
$stmt->bind_param("s", $user);
$user = $uid;
$stmt->execute();

$result = $stmt->get_result();
$row = mysqli_fetch_assoc($result);
$hash_pwd = $row['pwd'];
 //de-hashing the password.
$hash = password_verify($pwd, $hash_pwd);


if ($hash == 0) { 
	header("Location: index.php?error=empty");
	exit();
} else {

//Prepared statement for logging in SQLquery (password)
	$stmt = $conn->prepare("SELECT * FROM user WHERE uid=? AND pwd=?");
	$stmt->bind_param("ss", $user, $hsh);
	$user = $uid;
	$hsh = $hash_pwd;
	$stmt->execute();

	$result = $stmt->get_result();

	if (!$row = mysqli_fetch_assoc($result)) {
	  echo "Your username or password is incorrect!"; //For troubleshooting.. header() brings the user in to the frontpage of course.
	} else {
	  $_SESSION['id'] = $row['id']; //Unique id that only one user has.
	}

	header("refresh:1; index.php");

}
?>


