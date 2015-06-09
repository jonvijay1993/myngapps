<?php
	session_start();
	include 'db_connect.php';	
	$date = new DateTime();
	date_default_timezone_set('Asia/Kolkata');
	$datee = $date -> format('y-m-d');
	
	$query = "select * from user_data_".$_SESSION['username']." where created=".$datee;
	echo $query;
	$result = $conn->query($query) or die(mysql_error());
	
	if(($result->rowCount()) != 0)
	{
		echo "true";
	}
	else
		echo "false"
?>