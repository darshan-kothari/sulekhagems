<?php
ob_start();
session_start();
$error=" ";
include("connection.php");
if(isset($_REQUEST["log"]))
{
$email=$_GET["email"];
$pass=$_GET["pass"];
$data=mysql_query("select * from regauth where email='$email' and pass='$pass'");
$row=mysql_num_rows($data);
if($row>0)
{
$_SESSION["email"]=$_GET["email"];
if(isset($_REQUEST["rem"]))
{
setcookie("$email","$pass",time()+36000);
}
header("location:homeauth.php");
}
else
{
$error= "<font color=#CC0000><b>Wrong Id and Password</b></font>";
}
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="JavaScript" type="text/javascript" >

var xmlHttp

function showHint()
{

	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	} 
	
	var url="cook.php"
	url=url+"?email="+document.getElementById('email').value
	//url=url+"&id="+document.getElementById('t2').value
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function stateChanged() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="200")
		{ 
		 // document.getElementById('TextBox2').value  =xmlHttp.responseText 
          document.getElementById("pass").value  =xmlHttp.responseText 
           
		} 
} 

function GetXmlHttpObject()
{ 
	var objXMLHttp=null
	if (window.XMLHttpRequest)
	{
	    objXMLHttp=new XMLHttpRequest()
	}
	else if (window.ActiveXObject)
	{
	    objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
	}
	return objXMLHttp
} 
    </script>
<link href="css.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form action="<? $_SERVER['PHP_SELF']?>" method="get" name="frm"><br><br><br>
<table width="100%">
<tr><td width="5%"></td>

<td valign="top" align="center">
<table style="background-color:#FFFFFF; height:270px; width:350px;">
<br>
<tr>
<td colspan="2" align="center" height="20%">
<font color="#3399FF" face="Arial, Helvetica, sans-serif" size="+2" >User Log In
</font></td>
</tr>
<tr>
<td colspan="2" height="10px"></td></tr>
<tr  height="40px"><td class="logname" align="right">
<font color="#000000">User Name - 
</font>
</td>
<td>
<input type="text" name="email" id="email" onBlur="showHint()">
</td></tr>
<tr height="40px" ><td class="logname" align="right">
<font color="#000000">Password - 
</font>
</td>
<td>
<input type="password" name="pass" id="pass">
</td></tr>
<tr height="30px"><td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="rem" id="rem">Remember Password </td></tr>
<tr><td colspan="2" align="center"><?php echo $error;?></td></tr>
<tr height="40px">
<td align="right">
<input type="submit" name="reg" id="reg" value="Registration">
</td> <td align="center">
<input type="submit" name="log" id="log" value="LogIn">
</td>
</tr>
<tr>
<td colspan="2" height="10px"></td></tr>
<tr>
<td colspan="2" class="bottom2"></td></tr> 
</table>
</td></tr>
</table>
</form>
<br><br><br>
</body>
</html>