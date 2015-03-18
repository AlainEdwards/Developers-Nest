<?php

$con=mysql_connect("localhost","","");
$db = "aedwar50";

if (!$con)
	{
		die('Database connection error: ' . mysql_error());
	}
else if ($con)
	{ /*echo "success";*/}

?>