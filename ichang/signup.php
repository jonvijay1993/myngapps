<?php
	include 'db_connect.php';
	session_start();
	$username = $_GET['username'];
	$pass = $_GET['password'];
	$admin_level = $_GET['adm'];
	
	$query_create_user_table = "CREATE TABLE IF NOT EXISTS `user_data_$username` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `msg_file_location` text NOT NULL,
  `created` text NOT NULL,
  `last_edited` text NOT NULL,
  `time_created` text NOT NULL,
  `time_modified` text NOT NULL,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	$query_create_user_entry = "insert into user_accounts(first_name,last_name,username,password,admin_level) values('','','$username','$pass','$admin_level')";
	
	$result = $conn->query($query_create_user_entry) or die(mysql_error());
	$result = $conn->query($query_create_user_table) or die(mysql_error());

	$pathname = "data/".$_SESSION['username']."/msgs";
	mkdir($pathname);
	//$data = $result->fetch(PDO::FETCH_ASSOC) or die(mysql_error());
	
?>