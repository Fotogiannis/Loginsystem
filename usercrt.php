<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
	<h1>Users!</h1>
	<a href="newuser.php">
				<button id="Btn">Create user</button>
			</a>
	<div id="DBresult">
	<?php
	include "db_conn.php";
	if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: admin.php?error=Email is required");
		exit();
	}else if(empty($pass)){
		header("Location: admin.php?error=Password is required");
		exit();
	}
	else if($email != "admin" && $pass != "123"){
		header("Location: admin.php?error=Email or Password wrong");
		exit();
	}else{
			$sql2 = "SELECT user_id, user_first, user_last, user_email FROM users;";

			$result2 = $conn->query($sql2);
			if ($result2->num_rows > 0) {
  						while($row = $result2->fetch_assoc()) {
   							echo$row['user_first']. " " . $row['user_last']. ", ". "<a href='userupd.php?id={$row['user_id']}'>{$row['user_email']}</a>" . "<br>" . "<hr/>" . "<br>";
 						 }
					} else {
  							echo "0 results";
						}
	}

	}else{
		header("Location: admin.php");
		exit();
	} ?>
	</div>
</body>
</html>