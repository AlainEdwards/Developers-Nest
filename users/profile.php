<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="html, css, php, server, applications, android, ios, web, development">
	<meta name="description" content="Error...Error...must find directive">
	<meta name="author" content="Alain Edwards">
	
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
 	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
    <!--My Script-->
    <script  type="text/javascript" src="../js/profiles.js"></script>
    
 	<!--My CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    
    <!--My Favicon-->
    <link rel="favicon" href="../images/favicon.ico">
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
                					<li><a href="../index.php">Home</a></li>
                					<li><a href="../code/">Code</a></li>
                                    <li><a href="../developers/">Developers</a></li>
                					<li class="dropdown">
                  					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Members<b class="caret"></b></a>
                  					<ul class="dropdown-menu">
                    					<?php if(empty($_SESSION['LoggedIn'])){echo "<li><a href='../login/'>Login</a></li>";
                    					echo "<li><a href='../register/'>Register</a></li>"; }
                    					if(!empty($_SESSION['LoggedIn']) && ($_SESSION['LoggedIn']) == 1){echo "<li><a href='profile.php'>My Profile</a></li>";
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
            
            	<?php
					include '../access/connect.php';
					
					$table ="members";
					$suser ="";
					mysql_select_db($db,$con);
					
					if (isset($_SESSION['Username'])){$user = $_SESSION['Username']; $suser = $_SESSION['Username'];}
					
					if (isset($_GET['user'])){$user = $_GET['user'];}
					
					$fcheck = mysql_query("SELECT * FROM friends WHERE user='$suser' AND friend='$user'",$con);
					$count = mysql_num_rows($fcheck);
					
					
					$result = mysql_query("SELECT * FROM $table WHERE user='$user' GROUP BY user",$con);
					
					while($row = mysql_fetch_array($result))
					{
						echo "<div id='profile'>";
						echo "<h4>" . $row['FirstName'] . " " . $row['LastName'] . "</h4>";
						echo "<hr>";
						
						echo "<div id='image'>";
						echo "<img src='" . $row['img'] . "'  />";
						echo "</div>";
						
						echo "<div id='personal'"; 
						echo "<p>Handle: <span id='uname'>" . $row['user'] . "</span></p>";
						echo "<p>Status: " . $row['Status'] . "</p>";
						echo "<p>Member Since: " . $row['Date_Registered'] . "</p>";
						echo "<p>Last Online: " . $row['LastLoggedIn'] . "</p>";
						echo "</div>";
						
						if (isset($_GET['user']) && ($_GET['user'] != $suser) && $count <= 0 && isset($_SESSION['LoggedIn'])){
								echo "<div id='p_buttons'><span id='addfriend'><button class='btn btn-large btn-primary' onclick='addfriend()'>Add Friend</button></span><br /></div>";
								//echo "<span id='follow'><a onclick='follow()' >Follow Me</a></span></div>";
							}
						else if(!isset($_GET['user']) || $user == $suser){/*Do nothing I cant be a friend to my self*/}
						else if(!isset($_SESSION['LoggedIn'])){/*You have to be logged in, in order to add a friend*/}
						else{ echo "You are friends with " . $user;}
						
						echo "<div id='clearfix'></div>";
						echo "<hr>";
						
						echo "<div id='additional'>";
						
							if ($row['Website'] != ""){echo "<p>My Website: <a href='http://" . $row['Website'] . "'>" . $row['Website'] . "</a></p>";}
							if ($row['Intro'] != ""){echo "<b>Introduction:</b><br />";echo "<p>" . $row['Intro'] . "</p>";}
						
						echo "</div>";
						
						
						
						
					}
					//List all friends for thie user
					$result = mysql_query("SELECT * FROM friends WHERE user='$user'",$con);
					echo "<hr>";
					echo "<div id='things'>";
					
					
					echo "<div id='friends'>";
					echo "<p><b>Friends: </b></p><ul id='friendslist'>";
					
					$count=mysql_num_rows($result);if ($count == 0){echo "<li>This user has no friends</li>";}
			
					while($row = mysql_fetch_array($result))
					{
						echo "<li><a href='profile.php?user=" . $row['friend'] . "'>" . $row['friend'] ."</a></li>" ;
					}
					echo "</ul>";
					echo "</div>";
					
					//List all posts for thie user
					$result = mysql_query("SELECT * FROM code_post WHERE user='$user'",$con);
					
					echo "<div id='posts'>";
					echo "<p><b>Posts: </b></p><ul id='postslist'>";
					
					if (!($row = mysql_fetch_array($result))){echo "<li>This user has no posts</li>";}
					while($row = mysql_fetch_array($result))
					{
						
						echo "<li><a href='../code/code.php?title=" . $row['Title'] . "'>" . $row['Title'] ."</a></li>" ;
					}
					echo "</ul>";
					echo "</div>";
					
					
					echo "</div>";
					echo "<div id='clearfix'></div>";
					echo "<hr>";
					
					
					echo "</div>";
				?>
            
        	</div>
            
            <div id="whos_online">
            	<h4> Who's Online </h4>
                <hr />
                
                <?php
					$table = "members";
				
					$result = mysql_query("SELECT * FROM $table WHERE Status='Online'",$con);
					
					$count=mysql_num_rows($result);
					if ($count == 0)
					{echo "<p>No one is currently online</p>";}
					
					while($row = mysql_fetch_array($result))
					{
							echo "<div id='profile_frame'>";
							
							echo "<div id='inner'>";
							
							echo "<div id='image'>";
							echo "<a href='profile.php?user=" . $row['user'] . "'><center><img src='" . $row['img'] . "'/></center></a>";
							echo "</div>";
							echo "<p><a href='profile.php?user=" . $row['user'] . "'>" . $row['user'] . "</a></p>";
							
							echo "</div>";
							
							echo "</div>";
					}
					
					
				?>
                
            </div>
            <div id="clearfix"></div>
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