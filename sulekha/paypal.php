<?php
session_start();
$email=$_SESSION["email"];
include("connection.php");
$data=mysql_query("select sum(total) As 'Total' from temp_order where user_email='$email'");
while($row=mysql_fetch_array($data))
{
$total=$row["Total"];
}
$data=mysql_query("select * from regauth where email='$email'");
while($row=mysql_fetch_array($data))
{
$name=$row["name"];
$email=$row["email"];
$add=$row["address"];
$city=$row["city"];
$state=$row["state"];
$country=$row["country"];
$tel=$row["tel"];
$sex=$row["sex"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body onload="document.paypal_form.submit();">
<h2>Processing Transaction...</h2>
<p><strong>Please wait... please don't close this window.</strong></p>
<form method="post" name="paypal_form" action="https://www.paypal.com/cgi-bin/webscr">

    
    <input type="hidden" name="cmd" value="_xclick" />
    <!-- the next three need to be created -->
	<input type="hidden" name="business" value="sulekhagemsstar@gmail.com" />
    <input type="hidden" name="image_url" value="http://www.sulekhagems.in/name.jpg" />
    <input type="hidden" name="return" value="http://www.sulekhagems.in/sulekha/success.php" />
    <input type="hidden" name="cancel_return" value="http://www.sulekhagems.in/sulekha/cancel.php" />
    <input type="hidden" name="notify_url" value="http://www.sulekhagems.in/sulekha/paypal.php" />
    <input type="hidden" name="rm" value="2" />
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="lc" value="US" />
    <input type="hidden" name="bn" value="toolkit-php" />
    <input type="hidden" name="cbt" value="Continue" />
    
    <!-- Payment Page Information -->
    <input type="hidden" name="no_shipping" value="" />
    <input type="hidden" name="no_note" value="1" />
    <input type="hidden" name="cn" value="Comments" />
    <input type="hidden" name="cs" value="" />
    
    <!-- Product Information -->
    <input type="hidden" name="item_name" value="Your order at Sulekha_Gems.in" />
    <input type="hidden" name="amount" value="<?php echo $total;?>" />
   
    <input type="hidden" name="item_number" value="Multiple" />
    <input type="hidden" name="undefined_quantity" value="" />
   
    
    <!-- Shipping and Misc Information -->
    <input type="hidden" name="shipping" value="10" />
    <input type="hidden" name="shipping2" value="10" />
    <input type="hidden" name="handling" value="" />
    <input type="hidden" name="tax" value="" />
    <input type="hidden" name="custom" value="" />
    <input type="hidden" name="invoice" value="" />
    
    <!-- Customer Information -->
    <input type="hidden" name="first_name" value="<?php echo $name;?>" />
    <input type="hidden" name="last_name" value="" />
    <input type="hidden" name="address1" value="<?php echo $add;?>" />
    <input type="hidden" name="address2" value="" />
    <input type="hidden" name="city" value="<?php echo $city;?>" />
    <input type="hidden" name="state" value="<?php echo $state;?>" />
    <input type="hidden" name="country" value="<?php echo $country;?>" />
    <input type="hidden" name="email" value="<?php echo $$email;?>" />
    <input type="hidden" name="night_phone_a" value="<?php echo $tel;?>" />
    <input type="hidden" name="night_phone_b" value="" />
    <input type="hidden" name="night_phone_c" value="" />

<noscript><p>Your browser doesn't support Javscript, click the button below to process the transaction.</p>
<input type="submit" name="Submit" value="Process Payment" />
</noscript>
</form>
</body>
</html>