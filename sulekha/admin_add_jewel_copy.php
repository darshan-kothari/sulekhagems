<?php
//ob_start()

include("head_admin.php");
include("connection.php");
if (isset($_SESSION['valid_user']) && $_SESSION['valid_user']!=""){
if(isset($_REQUEST["add_jewel"]))
{
$jewel_type=$_POST["jewel_type"];
$carat=$_POST["carat"];
$name=$_POST["name"];
$stone_weight=$_POST["stone_weight"];
$diamond_weight=$_POST["diamond_weight"];
$price=$_POST["price"];
$image=$HTTP_POST_FILES['file']['name'];
$data=mysql_query("select * from product where p_name='$name'");
$row_count=mysql_num_rows($data);
if($row_count>0)
{
$error="<font color=gray>This is Already Exists ! </font>";
}
else
{
if (!is_uploaded_file($HTTP_POST_FILES['file']['tmp_name'])) 
	  {
	 $error = "<font color=gray>You did not upload a file!</font>";
		//unlink($HTTP_POST_FILES['file']['tmp_name']);
	  }
  else 
	  {
		
	 if (file_exists("product_images/" . $_FILES["file"]["name"]))
      {
      $error= $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "product_images/" . $_FILES["file"]["name"]); 
if(mysql_query("insert into product values('null','Jewellery',' ','$name',' ','$jewel_type', '$carat','$price','$stone_weight', '$diamond_weight', '$image')"))
		{
		$error="<font color=green><b>Jewellery Added</b></font>";
		}
		else
		{
	    $error="<font color=gray><b>mysql_error()</b></font>";
		}

	  }}
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
<script language="javascript" type="text/javascript">

function validate()
		 {
		   
		    if (document.getElementById("type").value =="-------Select-------")
			  {
		         alert("Please select type of Jewellery");
		         return false;
		     }
		     if (document.getElementById("name").value =="")
			  {
		         alert("Please Enter Name of Jewellery");
		         return false;
		     }
			  
			
			
			 return true;
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
<br />
    <div id="coutent">
	<div id="flash">
    <div id="slider">
        <ul id="sliderContent">
            <li class="sliderImage">
                <a href=""><img src="example_images/410/9.jpg" alt="1" /></a>
                <span class="top"><strong>Ruby Glass Filled</strong><br /></span>
            </li>
            <li class="sliderImage">
                <a href=""><img src="example_images/410/5.jpg" alt="2" /></a>
                <span class="top"><strong>Black Diamond Beads</strong><br /></span>
            </li>
            <li class="sliderImage">
              <a href="">  <img src="example_images/410/12.jpg" alt="3" /></a>
                <span class="top"><strong>Blue Sapphire Shaded</strong><br /></span>
            </li>
            <li class="sliderImage">
               <a href=""> <img src="example_images/410/10.jpg" alt="4" /></a>
                <span class="top"><strong>Multi Sapphire</strong><br /></span>
            </li>
            <li class="sliderImage">
                <a href=""><img src="example_images/410/7.jpg" alt="5" /></a>
                <span class="top"><strong>Emerald Drops</strong><br /></span>
            </li>
			 <li class="sliderImage">
                <a href=""><img src="example_images/410/7.jpg" alt="6" /></a>
                <span class="top"><strong>Ruby Shaded</strong><br /></span>
            </li>
						
            <div class="clear sliderImage"></div>
        </ul>
    </div>
	
	</div>
	<form action="<? $_SERVER['PHP_SELF']?>" method="post" name="frm" enctype="multipart/form-data" onsubmit="return validate()">
     <center><table height="400px" width="350px">
<tr>
<td colspan="2" align="center" class="reg_td" height="40px">
<font size="+2">Add Jewellery</font>
</td>
</tr>
<tr >
<td width="40%" align="right"  class="reg_td">
Jewellery Type - 
</td>
<td align="left"  class="reg_td" width="60%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="jewel_type"><option value="-------Select-------">-------Select-------</option>
<option>Gold</option><option>Silver</option><option>Metal</option>
</select></td>
</tr>
<tr><td align="right"  class="reg_td">Carat - </td>
<td align="left"  class="reg_td">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="carat" id="carat" /></td></tr>
<tr><td align="right"  class="reg_td">Name/Description  </td>
<td align="left"  class="reg_td">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" id="name" /></td></tr>
<tr><td align="right"  class="reg_td">Stone Weight - </td>
<td align="left"  class="reg_td">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="stone_weight" id="stone_weight" /></td></tr>
<tr><td align="right"  class="reg_td">Diamond Weight - </td>
<td align="left"  class="reg_td">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="diamond_weight" id="diamond_weight" /></td></tr>
<tr><td align="right"  class="reg_td">Price - </td>
<td align="left"  class="reg_td">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="price" id="price" /></td></tr>
<tr><td align="right"  class="reg_td">Jewellery Image - </td>
<td align="left"  class="reg_td">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="file" id="file" /></td></tr>
<tr><td colspan="2" align="center" class="reg_td"><?php echo $error;?> </td></tr>
<tr><td colspan="2" align="center" class="reg_td" ><input type="submit" name="add_jewel" id="add_jewel" value="Add Jewellery" /></td></tr>
</table>
</center></form><br /><br />
</body>
</html>
<?php	
	
}else{
	
	header("location:admin_sulekha.php");
}		
?>
<?php
include("foot_admin.php");
?>
