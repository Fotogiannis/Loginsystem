<?php
		session_start();
		include "db_conn.php";

		$dates = $_POST['dates'];
		$days = $_POST['days'];
		$reason = $_POST['reason'];
		$ok = $_SESSION['s11'];

		$sql = "INSERT INTO requests (user_email, sub_date, dates_req, days_req, crnt_status, reason) VALUES('$ok', NOW(),'$dates','$days','pending','$reason');";
		$result = mysqli_query($conn, $sql);

		$sql5 = "SELECT user_last FROM users WHERE user_email = '$ok';";
		$result5 = mysqli_query($conn, $sql5);
		$row = $result5->fetch_assoc();

		require 'includes/Exception.php';
		require 'includes/PHPMailer.php';
		require 'includes/SMTP.php';

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = "true";
		$mail->SMTPSecure = "tls";
		$mail->Port = "587";
		$mail->Username = $_SESSION['s11'];
		$mail->Password = $_SESSION['s22'];
		$mail->Subject = "{Vacation request";
		$mail->SetFrom($_SESSION['s11']);
		$mail->Body = "Dear supervisor, employee " . $row['user_last'] . " requested for some time off, between the dates: " . $dates . " stating the reason: " . $reason . ". Click on one of the below links to approve or reject the application: {approve_link} - {reject_link}";
		$mail->AddAddress("mfelidou@gmail.com");

		if ($mail->Send()) {
			header('Location: sbmreq.php');
		}else{
			echo "Error..!";
		}

		$mail->smtpClose(); ?>