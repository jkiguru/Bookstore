<?php
	include_once("dbconnection.php");

	class Manage_Book{
		public $link;

		function __construct(){
			$db_conn = new dbconnection();
			$this->link = $db_conn->connect();
			return $this->link;
		}

		function createBook($author,$title,$description,$up_date,$created_on,$label){
			$query = $this->link->prepare("INSERT INTO book (author,title,description,time,created_on,label) VALUES(?,?,?,?,?,?)");
			$values = array($author,$title,$description,$up_date,$created_on,$label);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts;
		}
		function listBook($author,$label=null){
				if(isset($label)){
					$query = $this->link->prepare("SELECT *FROM book WHERE author=':author' AND label=':label' ORDER BY id DESC");
					$query->execute(array(":author"=>$author,":label"=>$author));
				}else{
					$query = $this->link->query("SELECT *FROM book WHERE author=':author' ORDER BY id DESC");
					$query->execute(array(":author"=>$author));
				}
				$counts = $query->rowCount();
				if($counts >= 1){
					$result = $query->fetchAll();
				}else{
					$result = $counts;
				}
				return $result;
			}

		function CountBook($author,$label){
			$query  = $this->link->prepare("SELECT count(*) AS TOTAL_BOOKS FROM book WHERE author=:author AND label=:label");
			$query->execute(array(":author" => $author,":label" => $label));
			$query->setFetchMode(PDO::FETCH_OBJ);
			$count->query->fetchAll();
			return $counts;
		}

		function editBook($author,$values){
			$x = 0;
			foreach($values as $key => $value){
				$query = $this->link->prepare("UPDATE book SET title =:value WHERE author =:author ");
				$query->execute(array(":value" => $value,":author" => $author));
				$x++ ;
			}
			return $x;
		}

		function deleteBook($author,$id){
			$query = $this->link->prepare("DELETE FROM book WHERE author =:author AND id =:id LIMIT 1");
			$query->execute(array(":author" => $author,":id" => $id));
			$counts = $query->rowCount();
			return $counts;
		}
		function listintBook($param,$author){
			foreach($param as $key => $value){
				$query = $this->link->query("SELECT *FROM book WHERE $key = ':value' AND author = ':author' LIMIT 1");
				$query->execute(array(":value"=>$value,":author"=>$author));
			}
			$counts = $query->rowCount();
			if($counts == 1){
				$result = $query->fetchAll();
			}else{
				$result = $counts;
			}
			return $result;
		}
		function forxml(){
			$query = $this->link->query("SELECT *FROM book");
			if($query){
				return $query;
			}
			else{
				$error = "Error occured";
				return $error;
				}
		}
	}
?>