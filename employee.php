<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Employee login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="sbmreq.php" method="post" >
		<h2>Employee login</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Email</label>
		<input type="text" name="email" placeholder="Email"><br>
		<label>Password</label>
		<input type="password" name="password" placeholder="Password"><br>
		<button type="submit">Login</button>
	</form>
</body>
</html>