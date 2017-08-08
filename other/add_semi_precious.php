<?php
include("connection.php");
$error="";
if(isset($_REQUEST["add"]))
{
$name=$_POST["semi_name"];
$description=$_POST["body"];
$price=$_POST["price"];
$weight=$_POST["weight"];
$image=$HTTP_POST_FILES['file']['name'];
if (!is_uploaded_file($HTTP_POST_FILES['file']['tmp_name'])) 
	  {
	 $error = "You did not upload a file!";
		//unlink($HTTP_POST_FILES['file']['tmp_name']);
	  }
  else 
	  {
		
	  copy($HTTP_POST_FILES['file']['tmp_name'],"semi_precious/".$HTTP_POST_FILES['file']['name']);
      $data=mysql_query("select * from add_semi where name='$name' and description='$description' and price='$price' and weight='$weight' and image='$image'");
	  $count=mysql_num_rows($data);
	  if($count>0)
	  {
	  $error="<font color=red><b>This is Already Exists</b></font>";
	  }
	  else
	  {
	    $_SESSION["item"]=$j_name;
		$_SESSION["itemimage"]=$j_image;
		if(mysql_query("insert into add_semi values('null','$name','$description','$price','$weight','$image')"))
		{
		$error="<font color=green><b>Item is Inserted</b></font>";
		
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
<script type="text/javascript" src="../ckeditor.js"></script>
	
	<link href="sample.css" rel="stylesheet" type="text/css" />


<link href="css.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Precious Stones</title>
<script language="javascript" type="text/javascript">
var xmlHttp

function hint()
{

	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	} 
	
	var url="valid.php"
	url=url+"?name="+document.getElementById('semi_name').value
	//url=url+"&id="+document.getElementById('t2').value
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function stateChanged() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="200")
		{ 
		document.getElementById('reg').innerHTML=xmlHttp.responseText 
          //document.frm.div2.innerHTML=xmlHttp.responseText 
           
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
		
		
function validate()
		 {
		   
		     if (document.getElementById("pre_stones").value =="-------Select-------")
			  {
		         alert("Please Select Name of Precious Stones");
		         return false;
		     }
			  
			
			  if (document.getElementById("precious_price").value == "")
			  {
		        alert("Please type Price of precious Stones");
		         return false;
		     }
			  else
			 {
				var str,p,i,len,digit,ch;
				str=document.frm.precious_price.value;
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
<form action="add_semi_precious.php" method="post" name="frm" enctype="multipart/form-data" onsubmit="return validate()">
<center>
<table width="600px">
<tr>
<td colspan="2" align="center">
Add Semi Precious Stones Description
</td>
</tr>
<tr>
<td width="30%" align="left">
Semi Precious Stones - 
</td>
<td width="70%" height="30px" align="left">
<input type="text" name="semi_name" id="semi_name" onBlur="hint()"/>
<label id="reg"></label>
</td>

</tr>
<tr>
<td align="left">
Stone Image - 
</td>
<td align="left">
<input type="file" name="file" id="file" />
</td></tr>
<tr>
<td align="left" valign="top">
<font>Description - </font>
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
<tr><td align="left">Stone Weight - 
</td><td align="left"> <input type="text" name="weight" id="weight" /></td></tr>
<tr><td align="left">Starting Price - 
</td><td align="left"> <input type="text" name="price" id="price" /></td></tr>
<tr><td colspan="2" align="left" height="30px"><?php echo $error;?>
</td></tr>
<tr>
<td align="left" colspan="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="add" id="add" value="Update Description" /> 
</td></tr>
</table>
</center>
</form>
</body>
</html>