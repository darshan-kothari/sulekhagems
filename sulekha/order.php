<?php
ob_start();
session_start();
$emailad="";
include("head_admin.php");
include("connection.php");
$emailad="";
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

<link href="css.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" type="text/css" />


<!-- dd menu -->
<script type="text/javascript">
<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>
<style type="text/css" media="screen">
#slider {
    width: 247px; /* important to be same as image width */
    height: 250px; /* important to be same as image height */
    position: relative; /* important */
	overflow: hidden; 
	margin:0px;
	padding:0px;
	/* important */
}
#sliderContent {
    width:247px; /* important to be same as image width or wider */
    position: absolute;
	top: 0; 
	padding:0px;
	margin:0px;
	
}
.sliderImage {
    float: left;
    position: relative;
	display: none;
	padding:0px;
	margin:0px;

}
.sliderImage span {
    position: absolute;
	font: 10px/15px Arial, Helvetica, sans-serif;
    padding: 10px 13px;
    width: 247px;
    background-color: #000;
    filter: alpha(opacity=70);
    -moz-opacity: 0.7;
	-khtml-opacity: 0.7;
    opacity: 0.7;
    color: #fff;
    display: none;
	padding:0px;
	margin:0px;
}
.clear {
	clear: both;
}
.sliderImage span strong {
    font-size: 14px;
	margin:0px;
	padding:0px;

}
.top {
	top: 0;
	left: 0;
	margin:0px;
	padding:5px 0px 5px 0px;
}
.bottom {
	bottom: 0;
    left: 0;
	margin:0px;
	padding:0px;
}
ul { list-style-type: none;}

</style>

<style type="text/css">

/*set CSS for SPAN tag surrounding each image*/
.seqslidestyle{
margin-right: 10px;
display:inline;
}
</style>
<!-- JavaScripts-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="s3Slider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#slider').s3Slider({
            timeOut: 3000
        });
    });
</script>
<link href="css/default.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <div id="coutent">
	<br /><br />
	<table width="100%" border="1" cellpadding="0" cellspacing="0"><tr><td colspan="7" align="center" style="font-size:+3;">
	Orders By Users</td>
	</tr><tr><td>User Email Id</td>
	<td>Product Id</td><td>Product Name</td><td>Product Price</td><td>Item Number</td><td>Amount</td><td>Date</td></tr>
	<?php
	// how many rows to show per page 
$rowsPerPage = 10; 

// by default we show first page 
$pageNum = 1; 

// if $_GET['page'] defined, use it as page number 
if(isset($_GET['page'])) 
{ 
    $pageNum = $_GET['page']; 
} 

// counting the offset 
$offset = ($pageNum - 1) * $rowsPerPage;
	$data=mysql_query("select * from `order` ORDER BY p_id DESC limit $offset, $rowsPerPage");
	 while($row=mysql_fetch_array($data))
	 {
	 echo "<tr><td><a href=admin_user_pro.php?email=".$row["user_email"].">".$row["user_email"]."</a></td><td>
	 ".$row["p_id"]."</td>
	 <td>".$row["p_name"]."</td>
	  <td>".$row["p_price"]."</td>
	   <td>".$row["pr_number"]."</td>
	 <td>".$row["total"]."</td>
	 <td>".$row["date"]."</td>
	 </tr>";
	}
	?>
	<tr><td align="left" colspan=8>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
$query   = "SELECT COUNT(p_id) AS numrows FROM `order`"; 
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
	<br /><br />
		  
</div>
</body>
</html>
<?php
include("foot_admin.php");
?>