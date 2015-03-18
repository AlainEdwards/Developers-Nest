<?php // Example 21-1: functions.php
session_start();
include 'access/connect.php';

$dbhost  = 'localhost';    // Unlikely to require changing
$dbname  = 'aedwar50';       // Modify these...
$dbuser  = 'aedwar50';   // ...variables according
$dbpass  = 'baAdmin1240ba';   // ...to your installation
$appname = "Developers Nest"; // ...and preference

//mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
//mysql_select_db($dbname) or die(mysql_error());

function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br />";
}

function queryMysql($query)
{
    $result = mysql_query($query) or die(mysql_error());
	 return $result;
}

function destroySession()
{
    $_SESSION=array();
    
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}

function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return mysql_real_escape_string($var);
}


function showProfile($user)
{
    if (file_exists("images/avatar/$user/$user.jpg"))
        echo "<img src='images/avatar/$user/$user.jpg' align='left' />";

    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if (mysql_num_rows($result))
    {
        $row = mysql_fetch_row($result);
        echo stripslashes($row[1]) . "<br clear=left /><br />";
    }
}

if (isset($_GET['auser'])){$asuer = $_GET['auser'];}

function addfriend($auser){
	$username = $_SESSION['Username'];
	
	mysql_select_db($db,$con);
	
	$sql = "INSERT INTO friends (user, friend) VALUES ('" . $username . "', '" . $auser . "')";
	mysql_query($sql);
	
	
	
	echo "You are now firneds with " . $auser; 
	//mysql_close($con);
}

function follow($auser){
	$username = $_SESSION['Username'];
	
	mysql_select_db($db,$con);
	
	$sql = "INSERT INTO friends (user, friend) VALUES ('" . $username . "', '" . $auser . "')";
	mysql_query($sql);
	
	
	echo "You are now following " . $auser; 
	//mysql_close($con);
}

if (isset($_GET['cmd']) && isset($_GET['auser'])){if ($_GET['cmd'] == "addfriend"){addfriend($_GET['auser']);} else if ($_GET['cmd'] == "follow"){follow($_GET['auser']);}}


?>
