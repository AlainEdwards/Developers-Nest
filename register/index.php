<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
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
    
    <!--My JavaScripts-->
    <script type="text/javascript" src="../js/validation.js"></script>
    
    <!--My Favicon-->
    <link rel="shortcut icon" href="../images/favicon.ico">
    
  </head>
  
  <body>
    
    
  	<header>
  		<div id="top">
  			<div id="tlogo">
            	<!--Logo Banner-->
    			<a href="../index.php"><h1>Developers Nest</h1></a>
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
        <!--Registration Form-->
        <div id="register">
        <h2><u>Register</u></h2>
        <form name="register" method="post" action="cregister.php" onSubmit="return check()" enctype="multipart/form-data">
        <p>First Name*: <br />
        <input class="textregister" type="text" name="firstname" placeholder="Bob" required autofocus/></p>

        <p>Last Name*: <br />
        <input class="textregister" type="text" name="lastname" placeholder="Green" required/></p>

        <p>Email*: <br  />
        <input class="textregister" type="email" name="email" placeholder="bobgreen@example.com"  onBlur="checkEmail(this.value)" required/><span id='email_val'></span></p>

        <p>Username*: <br />
        <input class="textregister" type="text" name="username" placeholder="BobGreen49" onBlur="checkUser(this.value)"  required/><span id='user_val'></span></p>

        <p>Password*: <br />
        <input class="textregister" type="password" name="password" placeholder="5 - 30 characters" onBlur="checkPassLength(this.value)" id="pass" required/><span id='pass_val'></span></p>

        <p>Retype Password*: <br />
        <input class="textregister" type="password" name="repassword" onBlur="checkPass(this.value)" required/><span id='repass_val'></span></p>
        
        <p>Upload your profile picture: (acceptable types are JPG, JPEG,PNG,GIF) </br>
		Filename: <input type="file"  name="file" id="file"></p>
        
        <hr>
        <p> About yourself (optional)</p>
        
        <p>Your website: <br />
         <input class="textregister" type="text" name="site" placeholder="www.techiedev.blogspot.com" /></p>
        
        <p>Introduction: <br />
        <textarea name="intro" placeholder="Tell us a little about yourself."></textarea></p>
        
        


        <!--reCaptcha-->
        <?php
          require_once('../libs/recaptcha/recaptchalib.php');
          $publickey = "6LcJE-sSAAAAAEaPl05Ftbya79Pclu_V4qRklJSI"; // you got this from the signup page
		  if (isset($_GET['error'])){echo "<p class='error'>" . $_GET['error'] . "</p>";}
          echo recaptcha_get_html($publickey);
        ?>
        <!------------>
		
        
        
        <br /><p>
        <button class="btn btn-large btn-primary" type="submit" name="submit" >Register</button></p>
        </form>	
        
    	</div>
        </div>
        <p id="ip"> <?php echo $_SERVER['REMOTE_ADDR'];?>:Your IP will be logged.</p>
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
        <!--Footer Copyright Tag-->
  		<div id="fcopyright">
  		<p> &copy 2013 by Alain Edwards.</p>
  		</div>
  	</div>
  </footer>
  
  </body>
</html>