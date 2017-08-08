<?php
//echo "<pre>";
//print_r($_POST);die;
session_start();
if(isset($_POST['email']) && isset($_POST['pass'])){
$email     = $_POST['email'];
$pass   = $_POST['pass'];
$dbc   = mysql_connect("darshankothari.db.6239276.hostedresource.com","darshankothari","Vard2011");
mysql_select_db("darshankothari",$dbc);
if(!$dbc){
echo "Cannot connect to database";
exit;
}

$query      = "SELECT * FROM admin WHERE email = '$email' AND pass = '$pass'";
$result     = mysql_query($query) or die ("Error in query: $query. ".mysql_error()); 
$count =mysql_num_rows($result);
if($count>0)
{
$_SESSION['valid_user'] = $email;
}

}
//echo $_SESSION['valid_user'];die;
if(isset($_SESSION['valid_user'])){
header("location:admin_home.php");
}else{
header("location:admin_sulekha.php");
echo 'Error';
}
?>
