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

	  <div class="welcome_image"><img src="image/ourcollections_sulekha_jems.gif" /></div>
	  
	  <div id="jewller" >
	  <script type="text/javascript">

/***********************************************
* MultiFrame Image Slideshow script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var seqslides=new Array()
//Set Path to Image plus optional URL ("" for no URL):
seqslides[0]=["silid show/21.jpg", "#"]
seqslides[1]=["silid show/22.jpg", "#"]
seqslides[2]=["silid show/23.jpg", "#"]
seqslides[3]=["silid show/24.jpg", "#"]
seqslides[4]=["silid show/25.jpg", "#"]
seqslides[5]=["silid show/26.jpg", "#"]
seqslides[6]=["silid show/27.jpg", "#"]
seqslides[7]=["silid show/28.jpg", "#"]
seqslides[8]=["silid show/29.jpg", "#"]
seqslides[9]=["silid show/30.jpg", "#"]
seqslides[10]=["silid show/31.jpg", "#"]
seqslides[11]=["silid show/sulekha-jems-4_15.gif", "#"]
seqslides[12]=["silid show/sulekha-jems-4_17.gif", "#"]
seqslides[13]=["silid show/sulekha-jems-4_19.gif", "#"]
seqslides[14]=["silid show/sulekha-jems-4_21.gif", "#"]

//Set pause between each image display (2000=2 second):
var slidedelay=2000

//Set how many images to show at once (must be less than total # of images above):
var slidestoreveal=5

//Specify code to insert between each slide (ie: "<br>" to insert a line break and create a vertical layout)
//"" for none (or horizontal):
var slideseparater=""

//Set optional link target to be added to all images with a link:
var optlinktarget="secwindow"

//Set image border width:
var imgborderwidth=0

//Set opacity value of each image when it's "dimmed", and when it's not, respectively (1=100% opaque/normal).
//Change 0.2 to 0 to completely hide image when it's dimmed:
var opacityvalues=[0.2,1]

///No need to edit beyond here///////////

function processimgcode(theimg){
var imghtml=""
if (theimg[1]!="")
imghtml='<a href="'+theimg[1]+'" target="'+optlinktarget+'">'
imghtml+='<img src="'+theimg[0]+'" border="'+imgborderwidth+'" style="filter:alpha(opacity='+(opacityvalues[0]*100)+');-moz-opacity:'+opacityvalues[0]+'">'
if (theimg[1]!="")
imghtml+='</a>'
return imghtml
}

var curslide=1 //var to track current slide (total: slidestoreveal)
var curimgindex=0 //var to track current image (total: seqslides.length)
var isfirstcycle=1 //boolean to indicate whether this is the first cycle

if (document.getElementById){
for (i=0;i<slidestoreveal;i++)
document.write('<span id="seqslide'+i+'" class="seqslidestyle">'+processimgcode(seqslides[i])+'</span>'+slideseparater)
curimgindex=slidestoreveal
illuminateslide(0,opacityvalues[1])
}

function illuminateslide(slideindex, amt){
var slideobj=document.getElementById("seqslide"+slideindex).getElementsByTagName("IMG")[0]
if (slideobj.filters)
slideobj.filters.alpha.opacity=amt*100
else if (slideobj.style.MozOpacity)
slideobj.style.MozOpacity=amt
}

function displayit(){
if (curslide<slidestoreveal){
if (!isfirstcycle)
changeimage(curslide)
illuminateslide(curslide, opacityvalues[1])
curslide++
}
else{
isfirstcycle=0
for (i=0;i<slidestoreveal;i++)
illuminateslide(i, opacityvalues[0])
changeimage(0)
illuminateslide(0, opacityvalues[1])
curslide=1
}
}

function changeimage(slideindex){
document.getElementById("seqslide"+slideindex).innerHTML=processimgcode(seqslides[curimgindex])
curimgindex++
if (curimgindex>=seqslides.length)
curimgindex=0
}

if (document.getElementById)
setInterval("displayit()",slidedelay)


</script>

	 <!-- <div class="jewller_img" style="margin:0px;"><a href="#"><img src="image/sulekha-jems-4_13.gif" border="0" /></a></div>
	  <div class="jewller_img"><a href="#"><img src="image/sulekha-jems-4_15.gif" border="0" /></a></div>
	  <div class="jewller_img"><a href="#"><img src="image/sulekha-jems-4_17.gif" border="0" /></a></div>
	  <div class="jewller_img"><a href="#"><img src="image/sulekha-jems-4_19.gif" border="0" /></a></div>
	  <div class="jewller_img"><a href="#"><img src="image/sulekha-jems-4_21.gif" border="0" /></a></div> -->
	
    
    <div id="footer" >
	
</div>  <div id="youtube"><img src="image/images.png" border="0" usemap="#Map2" />
<map name="Map2" id="Map2">
  <area shape="rect" coords="156,1,185,29" href="#" />
  <area shape="rect" coords="93,0,151,29" href="#" /><area shape="rect" coords="43,0,92,25" href="#" /><area shape="rect" coords="1,2,46,25" href="#" /></map></div>
	<div id="menu_footer">
	<div style="width:500px;font-size:12px;font-family:Arial, Helvetica, sans-serif;padding-top:2px;"><a href="reg_home.php">Home</a> | <a href="reg_about.php">About Us</a> |  <a href="#">Privacy Policy</a> | <a href="#">Support</a><br/>
	</div>
	<div style="text-align:center;width:500px;font-weight:bold;font-size:12px;font-family:Arial, Helvetica, sans-serif;">Copyright 2011@<a href="www.vardhmaninfotech.com"> Vardhaman Infotech</a> all Rights Reserved</div>
	</div>
  </div>
</div>
</body>
</html>
