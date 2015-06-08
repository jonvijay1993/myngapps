<?php
	$msg = $_GET['msg'];
	$created = $_GET['created'];
	
	$conn = new PDO('mysql:host=localhost;dbname=ichang;charset=utf8','root','') or die(mysql_error());
	
	//$select = "select * from user_data";
	//$rowcount = $conn->query($select) or die(mysql_error());
	//$filenumber = $rowcount->rowCount() + 1;
	$path = "data/wikidjon/msgs/";
	$pathname = $path.$created.".txt";
	echo $pathname;
	$file = fopen($pathname,"w");
	fwrite($file,$msg);
	fclose($file);
	$date = new DateTime();
	date_default_timezone_set('Asia/Kolkata');
	$datee = $date -> format('y-m-d');
	$timee = date('h-m-s');
	$query = "update user_data set msg_file_location = $pathname,last_edited = $datee,time_modified = $timee where created=$created";
	echo $query;
	$result = $conn->query($query) or die(mysql_error());
?>