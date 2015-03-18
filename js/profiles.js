// JavaScript Document

var xmlhttp;

function loadXMLDoc(url,cfunc)
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
xmlhttp.open("Get",url,true);
xmlhttp.send();
}

function addfriend(){
	
	//User Avaliability Check
	var u = document.getElementById('uname').innerHTML;
	var y = document.getElementById('addfriend');
	

   loadXMLDoc("../functions.php?cmd=addfriend&auser="+u , function()
  	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
   		 {
			 y.innerHTML = xmlhttp.responseText;
		 }
		 
	});
	
}

function follow(){
	
	
	var u = document.getElementById('uname').innerHTML;
	var y = document.getElementById('follow');

   loadXMLDoc("../functions.php?cmd=follow&auser="+u , function()
  	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
   		 {
			 y.innerHTML = xmlhttp.responseText;
		 }
		 
	});
	
}