
<?php 
error_reporting(E_ERROR | E_PARSE);
include('server.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" href="stylere.css">
</head>
<body>
<div class="header">
	<h2>Login</h2>
</div>
<form method="post" action="login.php">
<?php include('errors.php'); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="login">Login</button>
	</div>
	<p>
		NOT YET a Member? <a href="register.php">Sign up</a>
	</p>
</form>
</body>
</html>