//Created by Alain Edwards

var xmlhttp;

function loadXMLDoc(url,params,cfunc)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=cfunc;
xmlhttp.open("POST",url,true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(params);
}


function checkUser(user)
{
	//User Avaliability Check
	var x = document.getElementById("user_val");
    if (user == "")
    {
       x.innerHTML = "";
	   return false;
    }


   loadXMLDoc("checkuser.php","user="+user,function()
  	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
   		 {
			 x.innerHTML = xmlhttp.responseText;
		 }
		 
	});
	
}

function checkEmail(email)
{
	var x = document.getElementById("email_val");
	if (email == "")
	{
		x.innerHTML = "";
		return false;
	}
	//Email Validation
	var atposition=email.indexOf("@");
	var dotposition=email.lastIndexOf(".");
	if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length)
  	{
  		//alert("Not a valid e-mail address");
		x.innerHTML = "<span class='error'>&nbsp;&#x2714; Not a valid e-mail address</span>";
  		return false;
  	}
	else{
		x.innerHTML = "<span class='valid'>&nbsp;&#x2714; Valid</span>";
	return true;
	}
}

function checkPassLength(pass)
{
	var x = document.getElementById("pass_val");
	if (pass == "")
	{
		x.innerHTML = "";
		return false;
	}
	if (pass.length < 5)
	{x.innerHTML = "<span class='error'>&nbsp;&#x2714; Password not long enough</span>";}
	else if (pass.length > 30)
	{x.innerHTML = "<span class='error'>&nbsp;&#x2714; Password to long</span>";}
	else{x.innerHTML = "<span class='valid'>&nbsp;&#x2714; Valid</span>";}
}

function checkPass(pass)
{
	var x = document.getElementById("repass_val");
	if (pass == "")
	{
		x.innerHTML = "";
		return false;
	}
	if (pass != document.getElementById("pass").value)
	{x.innerHTML = "<span class='error'>&nbsp;&#x2714; Password do not match</span>";}
	else{x.innerHTML = "<span class='valid'>&nbsp;&#x2714; They match</span>";}
}

function check()
{
	//Checks file format
	var file = document.getElementById("file").value;
	var fileext=file.split('.').pop();
	if (fileext != "jpg" && fileext != "jpeg" && fileext != "png" && fileext != "gif" && fileext != "")
	{
		alert("The image your trying to update is not allowed. Please make sure it has the correct fromat.");
		return false;
	}	
	
	return true;	
}