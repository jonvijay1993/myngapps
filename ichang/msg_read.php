<?php
	header("Content-Type: application/json; charset=UTF-8");
	$conn = new PDO('mysql:host=localhost;dbname=ichang;charset=utf8','root','') or die(mysql_error());	
	
	$query = "select * from user_data";
	$result = $conn->query($query) or die(mysql_error());
	$output = "";
	while($data = $result -> fetch(PDO::FETCH_ASSOC))
	{
	$count = 1;
		
	if($output != ""){
		$output .= ",";
	}
	
	foreach($data as $vals)
	{
		
		if($count == 1)
			$output .= '{"username" : "'.$vals.'",';
		else if($count == 2)
		{
			$file = fopen($vals,"r");
			$output .= '"msg" : "'.fread($file,20).'",';
			fclose($file);
		}
		else if($count == 3)
			$output .= '"created" : "'.$vals.'",';
		else if($count == 4)
			$output .= '"modified" : "'.$vals.'",';
		else if($count == 5){
			$output .= '"time_created" : "'.$vals.'",';
		}
		else if($count == 6){
			$output .= '"time_modified" : "'.$vals.'"}';
		}
		else if($count == 7)
			$count = 1;
		$count += 1;
	}
	
	}
	echo '{"records" : ['.$output.']}';
?>