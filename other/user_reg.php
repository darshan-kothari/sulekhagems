<?php
include("connection.php");
$captcha=$_SESSION['security_code'];
$name=" ";
$emailid=" ";

$add=" ";
$city=" ";
$state=" ";
$pass=" ";

$tel=" ";

if(isset($_POST["reg"]))
{
        $name=$_POST["name"];
		$emailid=$_POST["email"];
		
		$add=$_POST["add"];
		$city=$_POST["city"];
		$state=$_POST["state"];
		$tel=$_POST["tel"];
if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {
		// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
		$name=$_POST["name"];
		$email=$_POST["email"];
		
		$add=$_POST["add"];
		$city=$_POST["city"];
		$state=$_POST["state"];
		$country=$_POST["country"];
		
		$tel=$_POST["tel"];
		$sex=$_POST["sex"];
		$data2=mysql_query("select * from regauth where email='$email'");
         $ns = mysql_num_rows($data2);
		if($ns>0)
			{
			$error= "<font color=#FF0000><b>Id is Already Exists Enter Another.</b></font>"; 
			}
			else
			{
				if(mysql_query("insert into regauth values('null','$name','$email','$pass','$add','$city','$state','$country','$tel','$sex')"))
				{
					$error= "<font color=green><b>You are registered</b></font>"; 
				}
				else
				{
					$error= "<font color=#FF0000><b>".mysql_error()."</b></font>";
				}
			}
		unset($_SESSION['security_code']);
   } else {
		// Insert your code for showing an error message here
		$error= "<font color=#FF0000><b>Wrong Security Code.</b></font>";
   }



		
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript" type="text/javascript">
var xmlHttp

function emailhint()
{

	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	} 
	
	var url="valid1.php"
	url=url+"?email="+document.getElementById('email').value
	//url=url+"&id="+document.getElementById('t2').value
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function stateChanged() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="200")
		{ 
		document.getElementById('reg').innerHTML=xmlHttp.responseText 
          //document.frm.div2.innerHTML=xmlHttp.responseText 
           
		} 
} 

function GetXmlHttpObject()
{ 
	var objXMLHttp=null
	if (window.XMLHttpRequest)
	{
	    objXMLHttp=new XMLHttpRequest()
	}
	else if (window.ActiveXObject)
	{
	    objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
	}
	return objXMLHttp
} 
		  
		  
		function validate()
		 {
		     if (document.getElementById("name").value == "")
			  {
		         alert("please Enter name");
		         return false;
		     }
			 if (document.frm.email.value == "") {
		         alert("please Enter Email Id");
		         return false;
		     }
			  else
		     {
			   var str1,p,q;
			   str1=document.frm.email.value;
			   p=str1.indexOf('@');
               q=str1.indexOf('.');
			   if(p<0 || q<0)
			   {
				alert("Please enter Valid Email");
				return false;
			   }
		     }
			 if(document.frm.confemail.value!=document.frm.email.value)
			 {
			 alert("Wrong Email Id Re-Enter Email Id");
			 return false;
			 }
			 if (document.frm.pass.value == "") {
		         alert("please Enter Password");
		         return false;
		     }
			 else
			 {
			 var len=document.frm.pass.length;
			 if(len<=5)
			 {
			 alert("Enter more than 5 digits");
			 }
			 }
			 if (document.frm.conf.value == "") {
		         alert("please Enter Confirm Password");
		         return false;
		     }
			 else
			 {
			 if(document.frm.conf.value!=document.frm.pass.value)
			 {
			 alert("Wrong Password Please Re-Enter");
			 } 
			 }
             if (document.frm.add.value == "") {
		         alert("please Enter Address");
		         return false;
		     }
			  if (document.frm.city.value == "") {
		         alert("please Enter City");
		         return false;
		     }
			 if (document.frm.state.value == "") {
		         alert("please Enter State");
		         return false;
		     }
			 if (document.frm.country.value == "") {
		         alert("please Select Country");
		         return false;
		     }
			         
			 if (document.frm.tel.value =="") {
		         alert("please enter Mobile No.");
		         return false;
		     }
			 else
			 {
				var str,p,i,len,digit,ch;
				str=document.frm.tel.value;
				if(isNaN(str))
				{
					alert("Please Enter number ");
					return false;
				}
				
				/*
				digit="0123456789";
				
				len=str.length;

				for(i=1;i<len;i++)
				{
					ch=str.charAt(i);
					p=digit.indexOf(ch);
					if(p<0)
					{
						alert("Please enter numeric value");
						return false;
						break;
					}
				}
				*/
			 }


		
		 

	 return true;
}

	</script>
<link href="css.css" type="text/css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form name="frm" action="<? $_SERVER['PHP_SELF']?>" method="post" onSubmit="return validate()">
<br>
<table width="100%">
<tr>

<td valign="top" align="center">
<br>
<table height="705px" width="700px" style="background-color:#ffffff;">
<tr>
<td colspan="3" height="60px" align="center" style="border-bottom-color:#CCCCCC; border-bottom-style:solid; border-bottom-width:thin;">
<font color="#CC0000" face="Arial, Helvetica, sans-serif" size="3px"><b>User Registration</b></font> 
</td>
</tr><tr height="20px"><td></td></tr>
<tr><td width="30%" align="right" >
<font class="logname">Name -</font>
</td><td width="10%"></td>
<td width="60%" align="left">
<input type="text" name="name" id="name" size="35" value="<? echo $name ;?>">
</td>

</tr>

<tr height="40px"><td width="30%" align="right"  valign="top" >
<font class="logname">Email Id -</font>
</td><td width="10%"></td>
<td width="60%" align="left" valign="top">
<input type="text" name="email" id="email" size="35" onBlur="emailhint()" value="<? echo $emailid ;?>">
<label style=" color:#999999;">(User ID)</label><br>
<label id="reg"></label>
</td>
</tr>
<tr><td width="30%" align="right" >
<font class="logname">Confirm Email Id -</font>
</td><td width="10%"></td>
<td width="60%" align="left">
<input type="text" name="confemail" id="confemail" size="35" >
</td>

</tr>

<tr><td width="30%" align="right" >
<font class="logname">Password -</font>
</td><td width="10%"></td>
<td width="60%" align="left">
<input type="password" name="pass" id="pass" size="35" value="<? echo $pass ;?>">
</td>

</tr>

<tr><td width="30%" align="right" >
<font class="logname">Confirm Password -</font>
</td><td width="10%"></td>
<td width="60%" align="left">
<input type="password" name="conf" id="conf" size="35" value="<? echo $pass ;?>">
</td>

</tr>
<tr ><td width="30%" align="right" >
<font  class="logname">Sex -</font>
</td><td width="10%"></td>
<td width="60%" align="left">
<input type="radio" name="sex" id="sex" value="Male"><font class="logname">Male</font><input type="radio" name="sex" id="sex" value="Female"><font class="logname">Female</font>
</td >
</tr>
<tr><td width="30%" align="right" >
<font class="logname">Address -</font>
</td><td width="10%"></td>
<td width="60%" align="left">
<textarea name="add" id="add" style="width:230px;" value="<? echo $add ;?>"></textarea>


</td>

</tr>
<tr><td width="30%"  align="right" >
<font class="logname">City -</font>
</td><td width="10%"></td>
<td width="60%" align="left">
<input type="text" name="city" id="city" size="35" value="<? echo $city ;?>">
</td>

</tr>
<tr><td width="30%" align="right" >
<font class="logname">State -</font>
</td><td width="10%"></td>
<td width="60%" align="left">
<input type="text" name="state" id="state" size="35" value="<? echo $state ;?>">
</td>

</tr>
<tr><td width="30%" align="right" >
<font class="logname">Country -</font>
</td><td width="10%"></td>
<td width="60%" align="left">
<select name="country" id="country">
<option value="" >---Select---</option>
<?php
$data2=mysql_query("select * from country");
while($row1=mysql_fetch_array($data2))
echo "<option value=".$row1["name"].">$row1[name]</option>";

?>
</select>
</td >

</tr >

<tr > <td width="30%" align="right" >
 <font class="logname">Mobile No. - </font>
</td><td width="10%"></td>
<td width="60%" align="left">
<input type="text" name="tel" id="tel" size="35" value="<? echo $tel ;?>">
</td >

</tr>
<tr><td colspan="3" align="center"><img src="Captcha.php?width=100&height=40&characters=5" />
</td></tr>
<tr > <td width="30%" align="right" >
 <font class="logname"><label for="security_code">Security Code -</label> </font>
</td><td width="10%"></td>
<td width="60%" align="left">
<input id="security_code" name="security_code" type="text" />
</td >

</tr>

<tr><td colspan="3" width="20px"></td></tr>
<tr height="80px">
<td align="right" colspan="2"><input type="reset" name="re" id="re" value="Reset" ></td>
<td align="center"><input type="submit" name="reg" id="reg" value="Submit" ></td></tr><tr height="40px">

<td colspan="3" align="center"><label><?php echo $error;?></label></td></tr>
<tr><td colspan="3" background="images/5.jpg" height="20px"></td></tr>
</table>
</td>
</tr>
</table>
<br></form>
<br><br><br>
</body>
</html>