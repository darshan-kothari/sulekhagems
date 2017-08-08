<?php
session_start();
include("head.php");
include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:::Sulekha Gems:::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="icon"
type="image/png"
href="image/logo.png" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css" />

<!-- dd menu -->
<link href="css/default.css" rel="stylesheet" type="text/css" />
</head>
<body>

		<br />
	<table width="100%">
	
	<?php
// how many rows to show per page 
$rowsPerPage = 5; 

// by default we show first page 
$pageNum = 1; 

// if $_GET['page'] defined, use it as page number 
if(isset($_GET['page'])) 
{ 
    $pageNum = $_GET['page']; 
} 

// counting the offset 
$offset = ($pageNum - 1) * $rowsPerPage;
$email=$_SESSION["email"];
$data=mysql_query("select sum(total) As 'Total' from temp_order where user_email='$email'");
 while($r=mysql_fetch_array($data))
 {
 $price_j=$r["Total"];
 }
 
$result=mysql_query("select * from product where p_category='Precious' ORDER BY p_id DESC limit $offset, $rowsPerPage");

while($row=mysql_fetch_array($result))
	{
	echo "<tr>";
	echo "<td class=td_show_jems width=30% align=center valign=top><img src=product_images/".$row["p_image"]." height=150px width=150px></td>";
	echo "<td height=50% class=td_show_jems align=left valign=top>
	<table>
<tr>		
	<td>
	Product Id :	
	</td><td >
	".$row["p_id"]."
	</td></tr>
	
	<tr>		
	<td>
	Name :	
	</td><td >
	".$row["p_name"]."
	</td></tr>
	<tr>		
	<td valign=top>
	Description :	
	</td><td>
	".$row["p_description"]."
	</td></tr>
	<tr>		
	<td>
	Price :	
	</td><td>
	".$row["p_price"]."
	</td></tr>
	<tr>		
	<td>
	Weight :	
	</td><td>
	".$row["stone_weight"]."
	</td></tr></table>
	</td>"; 

	echo "<td width=20% valign=top class=td_show_jems><table><tr><td><a href=cart.php?p_id=".$row["p_id"]."&p_name=".$row["p_name"]."&p_price=".$row["p_price"]."&location=reg_precious_jems.php><img src=precious_images/shop2.png width=50px height=50px border=0></td></tr>
	<tr><td>
	Your Cart Balance is $. $price_j .00
	</td></tr><tr><td>
	<a href=checkout.php><img src=precious_images/check1.png width=80px height=30px border=0>
	
	</td></tr></table></td>";

	echo "</tr>";
	}
	?>
	<tr><td align="left" colspan=2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
$query   = "SELECT COUNT(p_id) AS numrows FROM product where p_category='precious'"; 
$result  = mysql_query($query) or die('Error, query failed'); 
$row     = mysql_fetch_array($result, MYSQL_ASSOC); 
$numrows = $row['numrows'];


$maxPage = ceil($numrows/$rowsPerPage);
$self = $_SERVER['PHP_SELF']; 
$nav = ''; 
for($page = 1; $page <= $maxPage; $page++) 
{ 
    if ($page == $pageNum) 
    { 
        $nav .= " &nbsp;&nbsp;&nbsp;&nbsp;$page ";   // no need to create a link to current page 
    } 
    else 
    { 
        $nav .= " <a href=\"$self?page=$page\">&nbsp;&nbsp;&nbsp;&nbsp;$page</a> "; 
    }         
} 
if ($pageNum > 1) 
{ 
    $page = $pageNum - 1; 
    $prev = " <a href=\"$self?page=$page\">&nbsp;&nbsp;&nbsp;&nbsp;[Prev]</a> "; 
     
    $first = " <a href=\"$self?page=1\">[First]</a> "; 
}  
else 
{ 
    $prev  = '&nbsp;'; // we're on page one, don't print previous link 
    $first = '&nbsp;'; // nor the first page link 
} 

if ($pageNum < $maxPage) 
{ 
    $page = $pageNum + 1; 
    $next = " <a href=\"$self?page=$page\">&nbsp;&nbsp;&nbsp;&nbsp;[Next]</a> "; 
     
    $last = " <a href=\"$self?page=$maxPage\">&nbsp;&nbsp;&nbsp;&nbsp;[Last]</a> "; 
}  
else 
{ 
    $next = '&nbsp;'; // we're on the last page, don't print next link 
    $last = '&nbsp;'; // nor the last page link 
} 

// print the navigation link 
echo $first . $prev . $nav . $next . $last; 


?></td></tr>
	</table>
</body>
</html>
<?php include("foot.php");?>