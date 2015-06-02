<?php
	include 'db_connect.php';
	$username = $_GET['username'];
	$query = "select * from users where username='$username'";
	$res = $sql -> query($query);
	$data = $res->fetch(PDO::FETCH_ASSOC);
	if($data['username'] != false){
		echo "Done";
	}
?>