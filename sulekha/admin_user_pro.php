<?php
ob_start();
session_start();
$emailad="";
include("head_admin.php");
include("connection.php");
$email=$_GET["email"];
$data=mysql_query("select * from regauth where email='$email'");
while($row=mysql_fetch_array($data))
{
$name=$row["name"];
$email=$row["email"];
$add=$row["address"];
$city=$row["city"];
$state=$row["state"];
$country=$row["country"];
$tel=$row["tel"];
$sex=$row["sex"];
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

<link href="css.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" type="text/css" />


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

    <div id="coutent">
	<br /><br />
<center>
<table cellpadding="0" cellspacing="0" height="505px" width="589px" style="border-color:#CCCCCC; border-width:thin; border-style:solid;">
<tr>
<td colspan="3" align="center" style="border-bottom-color:#999999; border-bottom-style:solid; border-bottom-width:thin;">
<font color="#FFFFFF" face="Arial, Helvetica, sans-serif" size="3px"><b>User Information</b></font> 
</td>
</tr><tr height="5px"><td colspan="3"></td></tr>
<tr><td width="30%" align="right"  >
Name
</td>
<td width="2%">-</td>
<td width="68%" align="center">
<?php echo $name;?>
</td>

</tr>

<tr><td width="30%" align="right"  >
Email Id 
</td>
<td width="2%">-</td>
<td width="68%" align="center">
<?php echo $email;?>
</td>
</tr>


<tr><td width="40%" align="right"  >
Address 
</td>
<td width="2%">-</td>
<td width="68%" align="center">
<?php echo $add;?>


</td>

</tr>
<tr><td width="30%" align="right" >
City 
</td>
<td width="2%">-</td>
<td width="68%" align="center"><?php echo $city;?>
</td>

</tr>
<tr><td width="30%" align="right"  >
State 
</td>
<td width="2%">-</td>
<td width="68%" align="center">
<?php echo $state;?>
</td>

</tr>
<tr><td width="30%" align="right"  >
Country 
</td>
<td width="2%">-</td>
<td width="68%" align="center">
<?php echo $country;?>
</td >

</tr >

<tr > <td width="30%"  align="right"  >
Mobile No. 
</td>
<td width="2%">-</td>
<td width="68%" align="center">
<?php echo $tel;?>
</td >

</tr>

<tr ><td width="30%" align="right" >Sex 
</td>
<td width="2%">-</td>
<td width="68%" align="center">
<?php echo $sex;?>
</td >
</tr>

<tr><td colspan="3" width="20px"></td></tr>
<tr height="20px">

<td colspan="3" align="center"><label></label></td></tr>


</table>
</center>
<br /><br />
		 
</div>
</body>
</html>
<?php
include("foot_admin.php");
?>