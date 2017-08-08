<?php

include("head_admin.php");
if (isset($_SESSION['valid_user']) && $_SESSION['valid_user']!=""){ 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta content="DESCRIPTION HERE" name="description" />
<meta content="Ankush Kumawat" name="author" />
<meta content="NGO,prakrit bharti Academy,books, online book selling, buy book, most populare, publications" name="keywords" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style5 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #FFFFFF; }
.style7 {color: #000000}
.style8 {color: #CC0000}
.style9 {font-size: medium}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style12 {font-family: Arial, Helvetica, sans-serif}
-->
</style>

 <script type="text/javascript">
                     
                    <!--
                    //preload images
                    var image1=new Image()
                    image1.src="666_AF12.jpg"
                    var image2=new Image()
                    image2.src="dyn002_original_666_278_jpeg_2532791_95ab2a8081219b2c4a764395265c7966.jpg"
					var image3=new Image()
                    image3.src="Camaro_Lowered.jpg"
                    //-->
                    </script>





</head>
<body>
<table width="100%" style="margin:0;" cellpadding="0" cellspacing="0">
<tr><td>
<?php
include("left_admin.php");
?>
</td>
<td align="center" valign="top">
<table width="100%"><tr><td><?php
include("mid_admin.php");
?></td></tr><tr><td>
<table width="100%"><tr><td align="center" colspan="2" style="color:#3399FF;">
Add Books Category
</td></tr></td></tr></table>
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
