<?php
/* 	Created by Alain Edwards
	

*/

include '../access/connect.php';

$date = date("Y-m-d");
$table = "members";

$username = $_POST["username"];

//Selecting database to manipulate
mysql_select_db($db, $con);

//Encrypting and Securing password

if ($_POST["password"] == ""){$pset = false;}
else{
$password = md5($_POST["password"]); $pset = true;}


	  
	// $floc = "../images/avatars/" . $username . "/"; FAU server does not allow us to create directories
	$floc = "../images/avatars/";
	if(isset($_POST['submit'])){
		if (isset($_FILES['file']['name'])){
			$name       = $_FILES['file']['name'];  
			$temp_name  = $_FILES['file']['tmp_name']; 
			$type		= $_FILES['file']['type'];
			
			//Uploading file:
				if (isset($name))
				{	
					if (!empty($name)){
						
						//mkdir($floc,0777,true); FAU server does not allow us to create directories
						$file = $floc . $name;
					}
				}
		}
	}

//Passing information to SQL for Query

$email = $_POST["email"];
$site = $_POST['site'];
$fn = $_POST["firstname"];
$ln = $_POST["lastname"];
$intro = $_POST['intro'];

if ($pset && $name != ""){
	$sql = "UPDATE " . $table . " SET FirstName='$fn', LastName='$ln', pass='$password', Email='$email', Website='$site', Intro='$intro', WHERE user='$username'";
}
else if (!$pset && $name != ""){
	$sql = "UPDATE " . $table . " SET FirstName='$fn', LastName='$ln', Email='$email', Website='$site', Intro='$intro', WHERE user='$username'";
}
else{
		$sql = "UPDATE " . $table . " SET FirstName='$fn', LastName='$ln', Email='$email', Website='$site', Intro='$intro' WHERE user='$username'";
}

//Querying the server	
mysql_query($sql,$con);
  

  
mysql_close($con);

header( 'Location:confirmation.php');
?>