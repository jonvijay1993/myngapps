<?php
	$username = $_GET['username'];
	$pass = $_GET['password'];
	
	$conn = new PDO('mysql:host=localhost;dbname=ichang;charset=utf8','root','') or die(mysql_error());
	$query = "select * from user where username='$username' AND password='$pass'";
	if($result = $conn->query($query) or die(mysql_error()) != false)
	{
		$data = $result->fetch(PDO::FETCH_ASSOC) or die(mysql_error());
		echo $data['username'];
		session_start();
	}
?>