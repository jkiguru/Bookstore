<?php
	include_once("../Models/ManageBook.php");
	include_once("session.php");
	$init = new Manage_Book(); 

	if(isset($_POST["create_book"])){
		$title = $_POST['title'];
		$description = $_POST['desc'];
		$up_date = $_POST['up_date'];
		$label = $_POST['label_under'];

		$author = $session_name;
		$values = array($title,$description,$up_date,$label,$author);

		$edit = $init->editBook($author,$values);
		if($edit >= 1){
			$success = "sucess";
		}else{
			$error = "Error editing";
		}
	}
?>