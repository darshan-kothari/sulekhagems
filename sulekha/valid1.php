<?php
$email=$_GET["email"];
include("connection.php");
$data=mysql_query("select * from regauth where email='$email'");
$count=mysql_num_rows($data);
if($count>0)
{
echo "<font color=#CC0000><b>Id is not Avilable</b></font>";
}
else
echo "<font color=green><b>This Id is Avilable</b></font>";
?>