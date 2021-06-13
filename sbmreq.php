<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Requests</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
	<?php
	$s1 = $_REQUEST['email'];
	$s2 = $_REQUEST['password'];

	$_SESSION['s11'] = $s1;
	$_SESSION['s22'] = $s2;
	?>
	<h1>Requests!</h1>
	<a href="sbmfrm.php">
				<button id="Btn">Create application</button>
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
			header("Location: employee.php?error=Email is required");
			exit();
		}else if(empty($pass)){
			header("Location: employee.php?error=Password is required");
			exit();
		}else{
				$sql = "SELECT * FROM users WHERE user_email='$email' AND user_pwd='$pass'";

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					$sql1 = "SELECT * FROM requests WHERE user_email='$email' ORDER BY sub_date DESC";

					$result1 = $conn->query($sql1);

					if ($result1->num_rows > 0) {
  						while($row = $result1->fetch_assoc()) {
   							echo $row['sub_date'] . ", " . $row['dates_req']. ", " . $row['days_req']. ", " . $row['crnt_status']. "<br>" . "<hr/>" . "<br>";
 						 }
					} else {
  							echo "0 results";
						}
				} else {
  					header("Location: employee.php?error=Incorrect Email or Password");
					exit();
					}
		}

	}else{
		header("Location: employee.php");
		exit();
	} ?>
	</div>
</body>
</html>