<?php
/* 	Created by Alain Edwards
	

*/

include '../access/connect.php';
require_once('../libs/recaptcha/recaptchalib.php');
  $privatekey = "6LcJE-sSAAAAALDQNyVSPMDOHZBq6FY1D_4eN_rz";

$date = date("Y-m-d");
$table = "members";

$username = $_POST["username"];

//Selecting database to manipulate
mysql_select_db($db, $con);

//Encrypting and Securing password
$password = md5($_POST["password"]);

$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
	header( 'Location:index.php?error=Incorrect captcha, please try again!' );
    
  } else {
	  
	 /* $floc = "../images/avatars/" . $username . "/"; FAU server does not allow us to create directories 
	 $floc = "../images/avatars/";
	if(isset($_POST['submit'])){
    $name       = $_FILES['file']['name'];  
    $temp_name  = $_FILES['file']['tmp_name']; 
	$type		= $_FILES['file']['type'];
	
	//Uploading file:
		if (isset($name))
		{	
			if (!empty($name)){
				
				//mkdir($floc,0777,true); FAU server does not allow us to create directories 
				move_uploaded_file($temp_name, $floc . $name);
				$file = $floc . $name;
			}
		}
	}*/
	
//if ($name == ""){$file = "../images/avatars/" . "user.png";}

//Had to use this because of FAU's security measures 
$file = "../images/avatars/" . "user.png";

//Passing information to SQL for Query
$sql = "INSERT INTO " . $table . " (user, pass, Email, Website, FirstName, LastName, Status, Date_Registered, LastLoggedIn, IP, Intro, img) VALUES ('" . $username . "', '" . $password . "', '" . $_POST["email"] . "', '" . $_POST['site'] . "', '" . $_POST["firstname"] . "', '" . $_POST["lastname"] . "', 'Offline', '" . $date . "', '" . $date . "', '" . $_SERVER["REMOTE_ADDR"] . "', '" . $_POST['intro']  . "', '" . $file . "')";


//Querying the server	
mysql_query($sql,$con);
  
}
  
mysql_close($con);

header( 'Location:confirmation.php?name=' . $name );
?>