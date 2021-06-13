<?php
	include 'db_conn.php';

	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	$confirm_pwd = $_POST['confirm_pwd'];

	$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$pwd');";
	if ($pwd == $confirm_pwd) {
		mysqli_query($conn, $sql);
		header('Location: newuser.php');
	}else{
		header("Location: newuser.php?error=Passwords do not match");
		exit();
	}
