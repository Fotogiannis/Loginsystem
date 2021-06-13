<?php
	session_start();
	require_once'db_conn.php';
	$hi = $_SESSION['ggg'];

	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	$confirm_pwd = $_POST['confirm_pwd'];

	$sql = "UPDATE users SET user_first = '$first', user_last= '$last', user_email= '$email', user_uid= '$uid', user_pwd= '$pwd' WHERE user_id='$hi'";

	if ($conn->query($sql) === TRUE && $pwd == $confirm_pwd) {
	  header('Location: userupd.php');
	} else {
 	 header("Location: userupd.php?error=Passwords do not match");
		exit();
	}