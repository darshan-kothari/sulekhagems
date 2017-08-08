<?php
ob_start();
session_start();
$con=mysql_connect("localhost","root","");
if(!mysql_select_db("sulekha_jems",$con))
die("Connection Failed");
$error="";
if(isset($_REQUEST["sub"]))
{
$j_name=$_POST["j_name"];
$j_price=$_POST["j_price"];
$j_image=$HTTP_POST_FILES['file']['name'];
if (!is_uploaded_file($HTTP_POST_FILES['file']['tmp_name'])) 
	  {
	 $error = "You did not upload a file!";
		//unlink($HTTP_POST_FILES['file']['tmp_name']);
	  }
  else 
	  {
		
	  copy($HTTP_POST_FILES['file']['tmp_name'],"add_items/".$HTTP_POST_FILES['file']['name']);
      $data=mysql_query("select * from add_items where beads_image='$j_image' and beads_name='$j_name'");
	  $count=mysql_num_rows($data);
	  if($count>0)
	  {
	  $error="<font color=red><b>This is Already Exists</b></font>";
	  }
	  else
	  {
	    $_SESSION["item"]=$j_name;
		$_SESSION["itemimage"]=$j_image;
		if(mysql_query("insert into add_items values('null','$j_name','$j_price','$j_image')"))
		{
		$error="<font color=green><b>Item is Inserted</b></font>";
		header("location:add_description.php");
		}
		else
		{
	    $error="<font color=red><b>Item is not Inserted</b></font>";
		}
		
	}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css.css" type="text/css" rel="stylesheet"  />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script language="javascript" type="text/javascript">
function validate()
		 {
		   
		     if (document.getElementById("j_name").value == "")
			  {
		         alert("Please type Name of Jewellery");
		         return false;
		     }
			  
			
			  if (document.getElementById("j_price").value == "")
			  {
		        alert("Please type Price of Jewellery");
		         return false;
		     }
			  else
			 {
				var str,p,i,len,digit,ch;
				str=document.frm.j_price.value;
				if(isNaN(str))
				{
					alert("Please Enter number ");
					return false;
				}
			}
			 
			
			 return true;
		  }

</script>
</head>

<body>
<form method="post" action="admin.php" enctype="multipart/form-data" name="frm" onsubmit="return validate()">

<center><table>
<tr>
<td colspan="2" align="center">
Add Beads

</td>

</tr>
<tr>
<td align="right">
Stone Name - 
</td>
<td align="left">
<input type="text" name="j_name" id="j_id" />
</td></tr>
<tr>
<td align="right">
Beads Price - 
</td>
<td align="left">
<input type="text" name="j_price" id="j_price" />
</td></tr>
<tr>
<td align="right">
Beads Image - 
</td>
<td align="left">
<input type="file" name="file" id="file" />
</td></tr>
<tr>
<td colspan="2" height="40px"><?php echo $error;?>
</td></tr>
<tr><td align="right"> <input type="reset" /></td><td align="center"><input type="submit" name="sub" id="sub" value="Add Jewellery"/></td></tr>
</table>
</center>
</form>
</body>
</html>
