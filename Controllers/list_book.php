<?php
	include_once("../Models/ManageBook.php");
	include_once("session.php");

	$init = new Manage_Book();
	
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$list_book = $init->listintBook(array('id' => $id),$session_name);
	}else{
		if(isset($_GET["label"])){
			$label = $_GET['label'];
			$list_book = $init->listBook($session_name,$label);
		}else{
			$list_book = $init->listBook($session_name);
		}
	}
	
?>