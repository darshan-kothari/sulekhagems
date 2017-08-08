<?php
session_start();
$j_name=$_SESSION["item"];
$j_image=$_SESSION["itemimage"];
include("connection.php");
$msg=" ";
$data=mysql_query("select beads_id from add_items where beads_name='$j_name' and beads_image='$j_image'");
while($row=mysql_fetch_array($data))
{
$j_id=$row["beads_id"];
} 

if(isset($_REQUEST["sub"]))
{

$j_id=$_POST["j_id"];
$j_des=$_POST["body"];
$stone=$_POST["stone_weight"];
$diamond=$_POST["diamond_weight"];
$data1=mysql_query("select * from add_des where jewellery_id='$j_id'");
$count=mysql_num_rows($data1);
if($count>0)
{
$msg="<font color=red><b>Description is already Added</b><font>";
}
else
{
if(mysql_query("insert into add_des values('$j_id','$j_des','$stone','$diamond')"))
{
$msg="<font color=green><b> Your Information is Added </b><font>";
}
else
{
$msg="<font color=red><b>".mysql_error()."</b><font>";
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../ckeditor.js"></script>
	
	<link href="sample.css" rel="stylesheet" type="text/css" />
	<link href="css.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script language="javascript" type="text/javascript">
function validate()
		 {
		   
		     if (document.getElementById("stone_weight").value == "")
			  {
		         alert("Please type Stone Weight of Product");
		         return false;
		     }
			  else
			 {
				var str,p,i,len,digit,ch;
				str=document.frm.stone_weight.value;
				if(isNaN(str))
				{
					alert("Please Enter number ");
					return false;
				}
			}
			
			  if (document.getElementById("diamond_weight").value == "")
			  {
		        alert("Please type Diamond Weight of Product");
		         return false;
		     }
			  else
			 {
				var str,p,i,len,digit,ch;
				str=document.frm.diamond_weight.value;
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
<form method="post" action="<? $_SERVER['PHP_SELF']?>" name="frm" onsubmit="return validate()">

<center><table width="609px">
<tr>
<td colspan="2" align="center">
Add Description

</td>

</tr>
<tr>
<td align="left" width="30%">
Jewellery Code - 
</td>
<td align="left" width="70%">
<input type="text" name="j_id" id="j_id" value="<?php echo $j_id;?>" />
</td></tr>
<tr>
<td align="left" valign="top">
<font >Description - </font>
</td>
<td valign="top" align="center"><font color="#CC0000">**Required</font></td></tr><tr><td colspan="2" >
<table width="589px"><tr><td>
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
<td align="left">
Stone Weight - 
</td>
<td align="left">
<input type="text" name="stone_weight" id="stone_weight" /> 
</td></tr>
<tr>
<td align="left">
Diamond Weight - 
</td>
<td align="left">
<input type="text" name="diamond_weight" id="diamond_weight" /> 
</td></tr>
<tr>
<td colspan="2"><?php echo $msg;?>
</td></tr>
<tr><td align="right"> <input type="reset" /></td><td align="center"><input type="submit" name="sub" id="sub" value="Add Description"/></td></tr>
</table>
</center>
</form>
</body>
</html>