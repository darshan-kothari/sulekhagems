<?php
	if(empty($_SESSION['email'])){
//		header('location:login.php');
		echo '<script>window.location.href="user_log.php"</script>';
	}
	elseif(!empty($_SESSION['email'])){
		
			
	
}
?>
