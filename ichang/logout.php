<?php
	session_start();
	if(isset($_SESSION['username']))
	{	
		session_destroy();
		echo "Logged out";
	}
	else
		echo "You never logged dummy!";
?>
<body>
	<a href="index.php">Login</a>
</body>