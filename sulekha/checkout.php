<?php
session_start();
$email=$_SESSION["email"];
include("head.php");
include("connection.php");
 /*?>if(isset($_REQUEST["sub"]))
{
$email=$_SESSION["email"];
$p_id=$_GET["p_id"];
$p_price=$_GET["p_price"];
$location=$_GET["location"];
echo $pr_number=$_GET["$p_id"];
$total=$p_price*$pr_number;
include("connection.php");
mysql_query("update temp_order set pr_number='$pr_number', total='$total' where user_email='$email' and p_id='$p_id'");
}<?php */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<form action="<? $_SERVER['PHP_SELF']?>" method="get">
<table width="100%">
<tr><td>Product Id</td><td>Product Name</td><td>Price</td><td>Number</td><td>Total</td><td>Delete</td></tr>
<?php

$data=mysql_query("select * from temp_order where user_email='$email'");
while($row=mysql_fetch_array($data))
{
 echo "<tr><td>".$row["p_id"]."</td><td>
	 ".$row["p_name"]."</td>
	 <td>".$row["p_price"]."</td>
	  <td>".$row["pr_number"]."</td>
	   <td>".$row["total"]."
	 </td>
	 
	 <td><a href=del_check.php?p_id=".$row["p_id"].">Delete</a></td>
	 
	 </tr>";
}
?>

</table>

</form>
<br /><br />
<a href="paypal.php"><input type="image" name="submit" src="http://images.paypal.com/images/x-click-but6.gif" border="0" alt="Make payments with PayPal, it is fast, free, and secure!"></a>
</body>
</html>
<?php
include("foot.php");
?>