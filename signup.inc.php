<?php
session_start();
include 'dbh.php';

$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

//Error handling for SIGNUP in the next rows
//If the user leaves something empty s/he is sent to the signup-page.

if (empty($first)){	// user needs to fill out this
	header("Location: signup.php?error=empty");
	exit();
}
if (empty($last)){ // user needs to fill out this
	header("Location: signup.php?error=empty");
	exit();
}
if (empty($uid)){ // user needs to fill out this
	header("Location: signup.php?error=empty");
	exit();
}
if (empty($pwd)){ // user needs to fill out this
	header("Location: signup.php?error=empty");
	exit();
}
else { // if there are users with the same name, user cannot login

	$stmt = $conn->prepare("SELECT uid FROM user WHERE uid=?");
	$stmt->bind_param("s", $user);

	$user = $uid;
	$stmt->execute();

	$result = $stmt->get_result();
	$uidcheck = mysqli_num_rows($result);
	if ($uidcheck > 0) {	// there can´t be more than 1 of the same username.
		header("Location: signup.php?error=username");
		exit();
	} else {
		$encrypted_password = password_hash($pwd, PASSWORD_DEFAULT); //hashing the password to MyAdmin
		$sql = "INSERT INTO user (first, last, uid, pwd)
		VALUES ('$first', '$last', '$uid', '$encrypted_password')";
		$result = mysqli_query($conn, $sql);

		header("Location: index.php");
	}
}
