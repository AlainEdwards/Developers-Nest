<?php 
session_start();

include '../access/connect.php';

$username = $_SESSION['Username'];
$table ="members";
mysql_select_db($db,$con);

$sql = "UPDATE $table SET Status='Offline' WHERE user='$username'";
mysql_query($sql);

session_destroy();
?>
<html>
<head>
	<!--My CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>


<div id="successful_logout">
<h1>You have successfully logged out!</h1>
<p>You will be redirected in 5 seconds...</p>
<center><img src="../images/loading.gif" width=100px height=100px></center>
</div>

<?php header("Refresh: 5; url=../index.php");?>

</body>