<?php
include("connection.php");
include("head_guest.php");
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
 
$result=mysql_query("select * from product where p_category='Semi_precious' ORDER BY p_id DESC limit $offset, $rowsPerPage");

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
	echo "<td width=20% valign=top class=td_show_jems><table><tr><td><a href=user_log.php><img src=precious_images/shop2.png width=50px height=50px border=0></td></tr>
	<tr><td>
	
	</td></tr></table></td>";

	echo "</tr>";
	}
	?>
<tr><td align="left" colspan=2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
$query   = "SELECT COUNT(p_id) AS numrows FROM product where p_category='Semi_precious'"; 
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
	</div>
</body>
</html>
<?php
include("foot_guest.php");
?>