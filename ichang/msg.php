<?php
	$username = $_GET['username'];
	$msg = $_GET['msg'];

	$conn = new PDO('mysql:host=localhost;dbname=ichang;charset=utf8','root','') or die(mysql_error());
	
	$select = "select * from user_data";
	$rowcount = $conn->query($select) or die(mysql_error());
	$filenumber = $rowcount->rowCount() + 1;
	$path = "data/wikidjon/msgs/";
	$pathname = $path."text".$filenumber.".txt";
	echo $pathname;
	$file = fopen($pathname,"w");
	fwrite($file,$msg);
	fclose($file);
	$query = "insert into user_data values('wikidjon','$pathname','','')";
	$result = $conn->query($query) or die(mysql_error());
?>