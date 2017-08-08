<?php
$name=$_GET["email"];
include("connection.php");
$data=mysql_query("select * from regauth where email='$name'");
$count=mysql_num_rows($data);
if($count>0)
{
echo "<font color=gray><b>Sorry this is already exists !</b></font>";
}
else
echo "<font color=green><b>This is Avilable for you . . </b></font>";
?>