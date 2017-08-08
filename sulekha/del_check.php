<?php
ob_start();
session_start();
$email=$_SESSION["email"];
include("connection.php");
$p_id=$_GET["p_id"];
mysql_query("delete from `temp_order` where p_id='$p_id' and `user_email`='$email'");
header("location:checkout.php");
?>