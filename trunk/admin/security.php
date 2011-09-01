<?php
	ob_start();
	
	if (!isset($_SESSION)) {
	  session_start();
	}

	if ($_SESSION['MM_Username'] == null || $_SESSION['MM_Username'] == ""){
		header('Location: login.php');
	}
?>
