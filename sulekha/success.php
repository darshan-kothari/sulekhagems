<?php
ob_start();
session_start();
if($_SESSION["order"]=="")
{
header("location:success1.php");
}
else
{
$msg=" ";
include("connection.php");
$email=$_SESSION["email"];

$data=mysql_query("select * from temp_order where user_email='$email'");
while($row=mysql_fetch_array($data))
{
$p_id=$row["p_id"];
$p_name=$row["p_name"];
$p_price=$row["p_price"];
$quantity=$row["pr_number"];
$total=$row["total"];
$user_email=$row["user_email"];
$date=$row["date"];
if(mysql_query("insert into `order` values('null','$p_id','$p_name','$p_price','$quantity','$total','$user_email','$date')"))
{
$msg="Your Query is Saved";
}
else
{
$msg="Your Query is not Saved Please Contect Us".mysql_error();
}
}
}
$_SESSION["order"]=="";
header("location:success1.php");
?>