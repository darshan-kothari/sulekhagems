<?php
session_start();
include("head.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" height="100px"><tr><td>
<font color="#CCCCCC" size="+3">Youy Order is Successfully Completed</font></td></tr></table>
<font color="#CCCCCC" size="+2"><?php echo $msg;?></font>
</body>
</html>
<?php
include("foot.php");
?>