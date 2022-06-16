<?php
	include_once("dbconnection.php");

	class Manage_User{
		public $link;
		function __construct(){
			$db_conn = new dbconnection();
			$this->link = $db_conn->connect();
			return $this->link;
		}
		function registerUser($username,$email,$password,$ip_address,$time,$date){
			$password = md5($password);
			$query = $this->link->prepare("INSERT INTO user(username,email,password,ip_address,time,date) VALUES(?,?,?,?,?,?)");
			$values = array($username,$email,$password,$ip_address,$time,$date);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts;
		}
		function LoginUser($email,$password){
			$password = md5($password);
			$query = $this->link->prepare("SELECT *FROM user WHERE email=:email AND password=:password");
			$query->execute(array(":email"=>$email,":password"=>$password));
			$rowcount = $query->rowCount();
			return $rowcount;
		}
		function GetUserInfo($email){
			$query = $this->link->prepare("SELECT username,email FROM user WHERE email=:email");
			$query->execute(array(":email" => $email));
			$rowcount = $query->rowCount();
			if($rowcount == 1){
				$result = $query->fetchAll();
				return $result;
			}else{
				return $rowcount;
			}
		}
	}

?>