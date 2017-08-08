<?php
ob_start();
session_start();
if($_SESSION["email"]=="")
{
//header("location:user_log.php");
}
$email=$_SESSION["email"];
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
<div align="right" style="border:none; background-color:#3da324; height:20px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;" class="transp"><a href="user_log.php">LogIn</a> &nbsp;&nbsp;<a href="sulekha/reg.php">Registration</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
<div id="wrapper">
  <div id="mein">
  
    <div id="header">
	<div id="logo_flash">
	
	 	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="801" height="120">
        <param name="movie" value="Flash/~Untitled-11.swf" />
        <param name="quality" value="high" />
        <embed src="Flash/~Untitled-11.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="801" height="120"></embed>
      </object>
	</div>
    <div id="menu" style="text-align:center; ">
<ul id="sddm">
	<li><a href="../index.html" onmouseover="mopen('m1')" onmouseout="mclosetime()">Home</a>
		</li>	<li><a href="about.php" onmouseover="mopen('m2')" onmouseout="mclosetime()">About Us</a>
		</li>
	<li><a href="jewel_jems.php"  onmouseout="mclosetime()">Jewellery</a>
		</li>
	<li><a href="beads_jems.php"  onmouseout="mclosetime()">Beads</a>
		</li>
	<li><a href="precious_jem.php"  onmouseout="mclosetime()">Precious Stones</a>
	<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()" style="width:120px;">
		<a href="pre_categ.php?name=Emerald">Emerald</a>
		<a href="pre_categ.php?name=Ruby">Ruby</a>
		<a href="pre_categ.php?name=Sapphire">Sapphire</a>
		<a href="pre_categ.php?name=Black Diamond">Black Diamond</a>
		<a href="pre_categ.php?name=White Diamond">White Diamond</a>
		</div>
		</li>
	<li><a href="semi_jems.php"  onmouseout="mclosetime()">Semi Precious</a>
		</li>
	
		<li><a href="videos.php"  onmouseout="mclosetime()">Videos</a>
		</li>
		<li><a href="contect.php"  onmouseout="mclosetime()">Contect</a>
		</li>
		
</ul>
<div style="clear:both"></div>
    </div>
    <div id="coutent">
	</div>
	
</body>
</html>
