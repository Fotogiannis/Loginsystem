<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update user</title>
	<link rel="stylesheet" type="text/css" href="style4.css">
</head>
<body>
	<?php
	session_start();
	if (isset($_GET['id'])) {
	require_once'db_conn.php';
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$_SESSION['ggg'] = $id;}
	?>
	<div class = "center">
	<h1>Update user</h1>
	<form action="update.php" method="POST">
	<div class="txt_field">
	<input type="text" name="first">
	<span></span>
	<label>Firstname</label>
	</div>
	<div class="txt_field">
	<input type="text" name="last">
	<span></span>
	<label>Lastname</label>
	</div>
	<div class="txt_field">
	<input type="text" name="email">
	<span></span>
	<label>E-mail</label>
	</div>
	<div class="txt_field">
	<input type="text" name="uid">
	<span></span>
	<label>Username</label>
	</div>
	<div class="txt_field">
	<input type="password" name="pwd">
	<span></span>
	<label>Password</label>
	</div>
	<div class="txt_field">
	<input type="password" name="confirm_pwd">
	<span></span>
	<label>Confirm Password</label>
	</div>
	<button type="sumbit" name="submit">Update</button>
	</form>
	</div>

</body>
</html>