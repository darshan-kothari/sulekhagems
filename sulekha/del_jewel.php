<?php
ob_start();
include("connection.php");
$p_id=$_GET["p_id"];
mysql_query("delete  FROM product where p_id='$p_id' ");
header("location:product.php");
?>