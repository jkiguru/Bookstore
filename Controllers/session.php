<?php
	session_start();
	if(isset($_SESSION['book_name'])){
		$session_name = $_SESSION['book_name'];
	}else{
		header("Location: login.php");
	}

?>