<?php
session_start();

include '../access/connect.php';

$date = date("Y-m-d");
$table ="code_post";

mysql_select_db($db,$con);


$sql = "INSERT INTO " . $table . " (Title, Description, Developer, User, Language, Code, Date, COD) VALUES ('" . $_POST['title'] . "', '" . $_POST['descript'] . "', '" . $_POST["developer"] . "', '" . $_SESSION['Username'] . "', '" . $_POST["language"] . "', '" . $_POST["code"] . "', '" . $date . "', 'N')";

//Querying the server	
mysql_query($sql,$con);

mysql_close($con);

header( 'Location:confirmation.php?title=' . $_POST['title'] );

?>