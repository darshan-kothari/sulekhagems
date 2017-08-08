<?php
ob_start();
session_start();
$error=" ";
include("connection.php");
include("head_guest.php");
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
mysql_query("delete from temp_order where user_email='$email'");
header("location:reg_home.php");
}
else
{
$error= "<font color=gray>Wrong Id and Password</font>";
}
}
if(isset($_REQUEST["reg"]))
{
header("location:reg.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:::Sulekha Gems:::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="icon"
type="image/png"
href="image/logo.png" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css" />

<!-- dd menu -->
<script type="text/javascript">
<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>
<script language="JavaScript" type="text/javascript" >

var xmlHttp

function Hint()
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
<style type="text/css" media="screen">
#slider {
    width: 247px; /* important to be same as image width */
    height: 250px; /* important to be same as image height */
    position: relative; /* important */
	overflow: hidden; 
	margin:0px;
	padding:0px;
	/* important */
}
#sliderContent {
    width:247px; /* important to be same as image width or wider */
    position: absolute;
	top: 0; 
	padding:0px;
	margin:0px;
	
}
.sliderImage {
    float: left;
    position: relative;
	display: none;
	padding:0px;
	margin:0px;

}
.sliderImage span {
    position: absolute;
	font: 10px/15px Arial, Helvetica, sans-serif;
    padding: 10px 13px;
    width: 247px;
    background-color: #000;
    filter: alpha(opacity=70);
    -moz-opacity: 0.7;
	-khtml-opacity: 0.7;
    opacity: 0.7;
    color: #fff;
    display: none;
	padding:0px;
	margin:0px;
}
.clear {
	clear: both;
}
.sliderImage span strong {
    font-size: 14px;
	margin:0px;
	padding:0px;

}
.top {
	top: 0;
	left: 0;
	margin:0px;
	padding:5px 0px 5px 0px;
}
.bottom {
	bottom: 0;
    left: 0;
	margin:0px;
	padding:0px;
}
ul { list-style-type: none;}

</style>

<style type="text/css">

/*set CSS for SPAN tag surrounding each image*/
.seqslidestyle{
margin-right: 10px;
display:inline;
}
</style>
<!-- JavaScripts-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="s3Slider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#slider').s3Slider({
            timeOut: 3000
        });
    });
</script>
<link href="css/default.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <div id="coutent">
	
<form action="<? $_SERVER['PHP_SELF']?>" method="get" name="frm"><br><br><br>
<table width="100%">
<tr><td width="5%"></td>

<td valign="top" align="center">
<table style="height:270px; width:350px; border:#CCCCCC; border-width:thin; border-style:solid;">
<br>
<tr>
<td colspan="2" align="center" height="20%">
<font color="#CCCCCC" size="+2" >User Log In
</font></td>
</tr>
<tr>
<td colspan="2" height="10px"></td></tr>
<tr  height="40px"><td class="logname" align="right">
User Name - 

</td>
<td>
<input type="text" name="email" id="email" onBlur="Hint()">
</td></tr>
<tr height="40px" ><td class="logname" align="right">
Password - 

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
	</div>

</body>
</html>
<?php
include("foot_guest.php");
?>