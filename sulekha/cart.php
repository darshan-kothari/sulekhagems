<?php
//ob_start;
//session_start();
//$email=$_SESSION["email"];
include("check-login.php");
$p_id=$_GET["p_id"];
$p_name=$_GET["p_name"];
$p_price=$_GET["p_price"];
$location=$_GET["location"];
$date=date("d-m-20y");
$pr_number=1;
$total=$_GET["p_price"];
include("connection.php");
if( $p_price > 50000 || $p_price == "unset" )
{
$_SESSION["p_id"]=$p_id;
$_SESSION["p_name"]=$p_name;
header("location:email.php");
}
else
{
$data=mysql_query("select * from temp_order where p_id='$p_id' and user_email='$email'");
$number=mysql_num_rows($data);
	if($number>0)
	{
	$data1=mysql_query("select * from temp_order where p_id='$p_id' and user_email='$email'");
		while($row=mysql_fetch_array($data1))
		{
		$pr_number=$row["pr_number"];
		$pr_number=$pr_number+1;
		$total=$row["total"];
		$total=$p_price+$total;
		mysql_query("update temp_order set pr_number='$pr_number', p_price='$p_price', total='$total' where user_email='$email' and p_id='$p_id'");
		}
	}
	else
	{
	mysql_query("insert into temp_order values('null','$p_id','$p_name','$p_price','$pr_number','$total','$email','$date')");
	
	}
	$_SESSION["order"]="order";
header("location:$location");
}

?>
