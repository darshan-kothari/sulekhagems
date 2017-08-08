<?php
ob_start();
session_start();
//$emailad="";
include("connection.php");
include("head_guest.php");
if(isset($_REQUEST["log2"]))
{
$email=$_GET["email"];
$pass=$_GET["pass"];
$data=mysql_query("select * from admin where email='$email' and pass='$pass'");
$row=mysql_num_rows($data);

if($row>0)
{
$_SESSION["emailad"]=$_GET["email"];
header("location:admin_home.php");
}
else
{
$error= "<font color=#CC0000><b>Wrong Id and Password</b></font>";
}

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
var closetimer    	= 0;
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
	
<form action="check-admin.php" method="post" name="frm"><br><br><br>
<table width="100%">
<tr><td width="5%"></td>

<td  valign="top" align="center">



<table style=" border-color:#CCCCCC; border-style:solid; border-width:thin; height:270px; width:350px;">
<br>
<tr>
<td colspan="2" align="center" height="20%">
<font color="#FFFFFF" face="Arial, Helvetica, sans-serif" size="+2" style="font-weight:bold;">Admin Log In
</font></td>
</tr>
<tr>
<td colspan="2" height="10px"></td></tr>
<tr  height="40px"><td class="logname" align="right">
User Name - 

</td>
<td>
<input type="text" name="email" id="email">
</td></tr>
<tr height="40px" ><td class="logname" align="right">
Password - 

</td>
<td>
<input type="password" name="pass" id="pass">
</td></tr>


<tr><td colspan="2" align="center"><?php echo $error;?></td></tr>
<tr height="40px">
 <td align="center" colspan="2">
<input type="submit" name="log2" id="log2" value="LogIn">
</td></tr>
<tr>
<td colspan="2" height="10px" ></td></tr> </tr>
<tr>
<td colspan="2" class="bottom2"></td></tr> 
</table>
</td></tr>
</table>
<div id="div1"></div></form>
<br><br><br>
	</div>
	
</body>
</html>
<?php
include("foot_admin.php");
?>
