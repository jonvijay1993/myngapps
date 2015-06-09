<?php
	include 'db_connect.php';
	session_start();
	$username = $_SESSION['username'];
	$created = $_GET['created'];
	$created = str_replace('"','',$created);	
	
	$path = "data/$username/msgs/";
	$pathname = $path.$created.".txt";
	echo $pathname;
	unlink($pathname);
	$query = 'delete from user_data_'.$username.' where created ="'.$created.'"';
	echo $query;
	$result = $conn->query($query) or die(mysql_error()); 
?>