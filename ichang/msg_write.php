<?php
	$username = $_GET['username'];
	$msg = $_GET['msg'];

	$conn = new PDO('mysql:host=localhost;dbname=ichang;charset=utf8','root','') or die(mysql_error());
	
	$date = new DateTime();
	date_default_timezone_set('Asia/Kolkata');
	$datee = $date -> format('y-m-d');
	$timee = date('h-m-s');
	echo $timee;	
/* 	$select = "select * from user_data";
	$rowcount = $conn->query($select) or die(mysql_error());
	$filenumber = $rowcount->rowCount() + 1;
 */	
	echo $datee;
	$path = "data/wikidjon/msgs/";
	$pathname = $path.$datee.".txt";
	echo $pathname;
 	$file = fopen($pathname,"w");
	fwrite($file,$msg);
	$query = "insert into user_data values('wikidjon','$pathname','$datee','$datee','$timee','$timee')";
	echo $query;
	$result = $conn->query($query) or die(mysql_error()); 
	fclose($file);
?>