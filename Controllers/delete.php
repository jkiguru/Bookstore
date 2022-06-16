<?php
	include_once("../Models/ManageBook.php");
	include_once("session.php");
	$init = new Manage_Book();

	if(isset($_GET["delete"])){
		$id = $_GET['delete'];
		$delete = $init->deleteBook($session_name,$id);
		if($delete == 1){
			header("Location: index.php");
		}else{
			$error = "Sorry there was an error!";
		}
	}

?>