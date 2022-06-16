<?php 
	if(isset($_POST["register"])){
		session_start();
		include_once("../Models/Manageuser.php");
		$user = new Manage_User();

		$username=$_POST['username'];
		$password=$_POST['password'];
		$email=$_POST['email'];
		$repassword=$_POST['repassword'];
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$date = date("Y-m-d");
		$time = date("H:i:s");

		if(empty($username) || empty($password) || empty($email) || empty($repassword)) {
			$error = "All fields are required!";
		}elseif ($password !== $repassword) {
			$error = "Passwords do not match!";
		}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error = "Email is not Valid";
		}else{
			$check_availability = $user->GetUserInfo($username);
			if($check_availability == 0){
				$register_user = $user->registerUser($username,$email,$password,$ip_address,$time,$date);
				if($register_user == 1){
					$make_sessions = $user->GetUserInfo($username);
					foreach ($make_sessions as $userSessions) {
						$_SESSION['book_name'] = $userSessions["username"];
						if(isset($_SESSION['book_name'])){
							header('Location: index.php');
						}
					}
				}
			}else{
				$error = "User already exists!";
			}
		}
	}

	if(isset($_POST["login"])){
		session_start();
		$email = $_POST['login_email'];
		$password = $_POST['login_password'];
		if(empty($email) || empty($password)){
			$error = "All fields required!";
		}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error = "Email is not Valid";
		}else{
			include_once("../Models/Manageuser.php");
			$login_user = new Manage_User();
			$auth_user = $login_user->LoginUser($email,$password);
			if($auth_user == 1){
					$make_sessions = $login_user->GetUserInfo($email);
					foreach ($make_sessions as $userSessions) {
						$_SESSION['book_name'] = $userSessions["username"];
						if(isset($_SESSION['book_name'])){
							header('Location: index.php');
						}
					}
			}else{
				$error = "Invalid Credentials!";
			}
		}
	}

?>