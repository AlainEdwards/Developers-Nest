<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Code</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="html, css, php, server, applications, android, ios, web, development">
	<meta name="description" content="Error...Error...must find directive">
	<meta name="author" content="Alain Edwards">
	
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
 	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
 	<!--My CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    
    <!--My Favicon-->
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>

<body>

  	<header>
  		<div id="top">
  			<div id="tlogo">
            	<!--Logo Banner-->
    			<a href="index.php"><h1>Developers Nest</h1></a>
                <!--<a href="index.php"><img src="images/Logo.jpg" alt="Directive Unknown Productions" width="1332" height="90"></a>-->
    		</div>
    		<div class="navbar-wrapper">
      			<div class="containerx">
                	<!--Top Nav Bar-->
        			<div class="navbar navbar-inverse">
          				<div class="navbar-inner">
            				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              					<span class="icon-bar"></span>
              					<span class="icon-bar"></span>
              					<span class="icon-bar"></span>
            				</button>
            				<div class="nav-collapse collapse">
              					<ul class="nav">
                					<li class="active"><a href="../index.php">Home</a></li>
                					<li><a href="index.php">Code</a></li>
                                    <li><a href="../developers/">Developers</a></li>
                					<li class="dropdown">
                  					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Members<b class="caret"></b></a>
                  					<ul class="dropdown-menu">
                    					<?php if(empty($_SESSION['LoggedIn'])){echo "<li><a href='../login/'>Login</a></li>";
                    					echo "<li><a href='../register/'>Register</a></li>"; }
                    					if(!empty($_SESSION['LoggedIn']) && ($_SESSION['LoggedIn']) == 1){echo "<li><a href='../users/profile.php'>My Profile</a></li>";
										echo "<li><a href='../users/edit.php'>Edit Profile</a></li>";
										echo "<li><a href='../code/submit.php'>Submit Code</a></li>";
										echo "<li><a href='../login/logout.php'>Logout</a></li>";} ?>
                  					</ul>
                				</li>
              				</ul>
            			</div>
          			</div>
        		</div>
      		</div>
    	</div>
    	</div>
    </header>
    
    <section id="smain">
    <div class="container">
    	<div id="main">
        	<!--2nd Header-->
    		<div id="mbottom">  
            
            <div id="code_page">
            	<h4></h4>
                
                <?php
				
					include '../access/connect.php';
					
					$table ="code_post";
					mysql_select_db($db,$con);
					
					if (isset($_GET['title'])){$title = $_GET['title'];}
				
					$result = mysql_query("SELECT * FROM $table WHERE Title='$title' GROUP BY  Title ASC",$con);
					
					while($row = mysql_fetch_array($result))
					{
						echo "<div id='codewrap'>";
						echo "<h3>" . $row['Title'] .  "</h3>";
						echo "<hr>";
						echo "<p>Date: " . $row['Date'] . " Developed by " . $row['Developer'] . ", Posted by " . $row['User'] . "</p>";
						
						echo "<p>Programming Language: " . $row['Language'] . "</p>";
						echo "<div id='code_description'"; 
						echo "<p>" . $row['Description'] . "</p>";
						echo "</div>";
						
						echo "<div id='code'>";
						echo "<pre>" . $row['Code'] . "</pre>";
						echo "</div>";

						echo "<div id='clearfix'></div>";
						echo "<hr>";
						
						echo "</div>";
					}
					?>
                
           	 </div>
            
    		</div>
        </div>
    </div>
    </section>   
    
    <footer>
  	<div id="bottom">
    	<!--Footer Widgets (1-5)-->
  		<div id="fwidgets">
  			<div class="clearfix" id="fw1">
  				<h3>Mission Statement</h3>
  				<blockquote><b>Anything can be accomplished, with software.</b></blockquote>
  			</div>
  			<div class="clearfix" id="fw2">
  				<h3>Technology</h3>
  				<ul>
                <li><a href="#">Java</a></li>
                <li><a href="#">.Net</a></li>
                <li><a href="#">PHP</a></li>
                <li><a href="#">IOS</a></li>
                <li><a href="#">Android</a></li>
                </ul>
  			</div>
  			<div class="clearfix" id="fw3">
  				<h3>Services</h3>
  				<ul>
                <li><a href="#">IOS Development</a></li>
                <li><a href="#">Android Development</a></li>
                <li><a href="#">Website Develpment</a></li>
                <li><a href="#">IT Solutions</a></li>
                <li><a href="#">Network Infostructures</a></li>
                </ul>
  			</div>
            <div class="clearfix" id="fw4">
            	<h3>Help</h3>
  				<ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="about/">About Us</a></li>
                <li><a href="contactus/">Contact Us</a></li>
                </ul>
  			</div>
            <div class="clearfix" id="fw5">
  				<h3>Company Info</h3>
  				<p id="companyinfo">
				2458 S . 124 St.Suite 47 <br />
				Pembroke Pines 33029 <br />
				Phone: (305) 209-6132<br />
				Fax: (305) 209-6132<br /></p>
  			</div>
  		</div>
  		<div id="fcopyright">
        <!--Footer Copyright Tag-->
  		<p> &copy 2013 by Alain Edwards.</p>
  		</div>
  	</div>
  </footer>       
</body>
</html>