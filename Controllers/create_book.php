<?php
	include_once("../Models/ManageBook.php");
	include_once("session.php");
	$init = new Manage_Book(); 

	if(isset($_POST["register_book"])){
		$title = $_POST['title'];
		$description = $_POST['desc'];
		$up_date = $_POST['up_date'];
		$label = $_POST['label_under'];

		if(empty($title) || empty($up_date) || empty($label)){
			$error = "All fields are required except the optional one!";
		}else{
			$title = strip_tags($title);
			$description = strip_tags($description);
			$up_date = strip_tags($up_date);

			$title = mysql_escape_string($title);
			$description = mysql_escape_string($description);
			$up_date = mysql_escape_string($up_date);

			$created_on = date("Y-m-d");
			$author = $session_name;
			$create_book = $init->createbook($author,$title,$description,$up_date,$created_on,$label);
			if($create_book == 1){
				$success = "Book created successfully!";
			}else{
				$error = "There was an error!";
			}
		}
	}
?>