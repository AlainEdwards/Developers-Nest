<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Published!</title>

<!--My CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
<div id="successful">
<h1> Success!</h1>
<?php
echo "<p>". $_GET["title"] . " has been sucessfully published.</p></br>";
echo "<p>Please wait while we redirect you to the site </p></br>";
header("Refresh: 5; url=../index.php");
?>
<center><img style="margin:auto;" src="../images/loading.gif" width=100px height=100px></center>
</div>
</body>
</html>