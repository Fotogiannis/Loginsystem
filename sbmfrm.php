<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Request creation</title>
	<link rel="stylesheet" type="text/css" href="style4.css">
</head>
<body>
	<div class = "center">
	<h1>Submission form</h1>
	<form action="writeDB.php" method="POST">
		<div class="txt_field">
		<input type="text" name="dates">
		<span></span>
		<label>Dates</label>
		</div>
		<div class="txt_field">
		<input type="text" name="days">
		<span></span>
		<label>Days</label>
		</div>
		<div class="txt_field">
		<input type="text" name="reason">
		<span></span>
		<label>Reason</label>
		</div>
		<button type="sumbit" name="submit">Submit</button>
	</form>
	</div>
</body>
</html>