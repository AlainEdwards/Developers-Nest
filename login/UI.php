<?php
session_start();
if(empty($_SESSION['LoggedIn']) || empty($_SESSION['Username'])){
header("location:login.php");
}
else{
include '../access/connect.php';

$table ="members";
$id = $_SESSION['Username'];
$ip = $_SERVER['REMOTE_ADDR'];
$fn = ""; $ln = ""; $status = "";
mysql_select_db($db,$con);

	
//Retreaving user info
$result = mysql_query("SELECT * FROM $table WHERE user='$id'",$con);

while($row = mysql_fetch_array($result))
  {
  	$fn = $row['FirstName']; $ln = $row['LastName']; $status = $row['Status'];
  }
if (!empty($fn) && !empty($ln) && !empty($status)){
$_SESSION['firstname']=$fn;
$_SESSION['lastname']=$ln;
$_SESSION['status']=$status;}
mysql_close($con);
}
?>

<html>
<head>
	<!--My CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>

<div id="successful_login">
<h1>Login Successful</h1></br>
<p>Welcome back <?php echo $fn . " " . $ln; ?><p></br>
<p>Please wait while we redirect you to the site</p>
<center><img style="margin:auto;" src="../images/loading.gif" width=100px height=100px></center>
<div>

<?php header("Refresh: 5; url=../index.php");?>
</body>
</html>