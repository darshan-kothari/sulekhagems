<?php
include("head.php");
$email=$_SESSION["email"];
$p_id=$_SESSION["p_id"];
$p_name=$_SESSION["p_name"];
if(isset($_REQUEST["send"]))
{
$categ=$_POST["categ"];
$body="Email = $email<br> Product Id = $p_id <br> Category= $categ";

$from=$email;
$to="sulekhankothari@yahoo.com";
$subject = "Query";
$message = $body.$_POST["body"]; 
$headers = "From:" . $from;
if(mail($to,$subject,$message,$headers))
{
 $msg = "<font color=gray>Mail Sent!</font>";
}
else
{
 $msg = "<font color=gray>Mail Not Sent!</font>";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../ckeditor.js"></script>
	
	<link href="sample.css" rel="stylesheet" type="text/css" />
<link href="css.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
<center>
<div align="left" style="color:#FFFFFF; font-family:Georgia, 'Times New Roman', Times, serif;">Please Contect Us For More Information of This Product and Send your Query.</div> 
<table style="width:700px; height:400px;">
<tr>
<td colspan="2" align="center" height="70px">
<font size="4px">Send Query</font>
</td>
</tr>
<tr>
<td align="left" width="30%">
Product Name-
</td>
<td align="left">
<input type="text" name="categ" readonly id="categ" value="<?php echo $p_name; ?>" />
</td>
</tr>
<tr>
<td align="left" valign="middle"  height="30px" >
	Enter your Query -</td><td valign="middle">**REQUIRED</td></tr><tr><td colspan="2" align="left"><textarea id="body" name="body" style="width:250px; height:200px;" onmouseover="show()"></textarea>
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
			</script>
</td>
</tr>
<tr>
<td colspan="2">
<?php echo $msg;?>
</td></tr>
<tr>
<td colspan="2">
<input type="submit" name="send" id="send" value="Send Query" onclick="validate();"/>
</td></tr>
</table>
</center>
</form>
<br />
</body>
</html>
<?php
include("foot.php");
?>