<?php
//ob_start();

include("head_admin.php");
include("connection.php");
if (isset($_SESSION['valid_user']) && $_SESSION['valid_user']!=""){ 
if(isset($_REQUEST["sub"]))
{
$b_name=$_POST["name"];
$b_price=$_POST["price"];
$b_image=$_FILES['file']['name'];
$b_des=$_POST["body"];
$stone=$_POST["stone_weight"];
if (!is_uploaded_file($_FILES['file']['tmp_name'])) 
	  {
	 $msg = "<font color=gray>You did not upload a file!</font>";
		//unlink($HTTP_POST_FILES['file']['tmp_name']);
	  }
  else 
	  {
		
	  if (file_exists("product_images/" . $_FILES["file"]["name"]))
      {
      $msg= $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "product_images/" . $_FILES["file"]["name"]); 
$data1=mysql_query("select * from product where p_name='$b_name'");
$count=mysql_num_rows($data1);
if($count>0)
{
$msg="<font color=gray><b>Description is already Added</b><font>";
}
else
{
if(mysql_query("insert into product values('null','Beads',' ','$b_name','$b_des', ' ',' ','$b_price','$stone',' ','$b_image')"))
{
$msg="<font color=green><b> Your Information is Added </b><font>";
}
else
{
$msg="<font color=gray><b>".mysql_error()."</b><font>";
}
}
}}
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
<script type="text/javascript" src="../ckeditor.js"></script>
	
	<link href="sample.css" rel="stylesheet" type="text/css" />
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
		   
		     if (document.getElementById("pre_stones").value =="-------Select-------")
			  {
		         alert("Please Select Name of Precious Stones");
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


<form method="post" action="<? $_SERVER['PHP_SELF']?>" name="frm" onsubmit="return validate()" enctype="multipart/form-data">

<center><table width="609px">
<tr>
<td colspan="2" align="center" height="60px">
<font size="+2"> Add Beads Description
</font>
</td>

</tr>
<tr>
<td align="left" class="reg_td">
Stone Name - 
</td>
<td align="left" class="reg_td">
<input type="text" name="name" id="j_id" />
</td></tr>
<tr>
<td align="left" class="reg_td">
Beads Price - 
</td>
<td align="left" class="reg_td">
<input type="text" name="price" id="j_price" />
</td></tr>
<tr>
<td align="left" valign="top" class="reg_td">
<font >Description - </font>
</td>
<td valign="top" align="center" class="reg_td"><font color="#CC0000">**Required</font></td></tr><tr><td colspan="2" >
<table width="589px"><tr><td align="center">
<textarea id="body" name="body" style="width:250px; height:200px;" onmouseover="show()"></textarea>
			<script type="text/javascript">
			//<![CDATA[
function show()
{
				CKEDITOR.replace( 'body',
					{
						fullPage : true,
						extraPlugins : 'docprops'
					});

}			//]]>
			</script> </td></tr></table> </td>
</tr>
<tr>
<td align="left" class="reg_td">
Beads Weight - 
</td>
<td align="left" class="reg_td">
<input type="text" name="stone_weight" id="stone_weight" /> 
</td></tr>
<tr>
<td align="left" class="reg_td">
Beads Image - 
</td>
<td align="left" class="reg_td">
<input type="file" name="file" id="file" />
</td></tr>

<tr>
<td colspan="2" height="30px"><?php echo $msg;?>
</td></tr>
<tr><td align="right"> <input type="reset" /></td><td align="center"><input type="submit" name="sub" id="sub" value="Add Description"/></td></tr>
</table>
</center>
</form><br /><br />
	 
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
