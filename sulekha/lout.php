<?php
ob_start();
session_start();
include("connection.php");
$email=$_SESSION["email"];
mysql_query("delete from temp_order where user_email='$email'");
session_destroy();
header("location:user_log.php");
?>