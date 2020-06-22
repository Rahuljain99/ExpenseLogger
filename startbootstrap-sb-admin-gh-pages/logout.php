<?php
	session_start();
	$con=mysqli_connect("localhost","root","","expenselogger") or die ("<h1>Database Error</h1>");
	session_destroy();
	echo "<script>alert('Logout successful!')</script>";
	header('location:login.php');
?>