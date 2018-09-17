<?php 
	class Message{
		private $id;
		private $username;
		private $message;
		private $conn;

		public function __construct($db){
			$this->conn = $db;
		}
		
		public function getLastmessage($id){
			// return all message of user
			$query = "SELECT * FROM message WHERE id > $id ORDER BY id DESC LIMIT 0,1";

			$stmt = $this->conn->prepare($query);
			//$stmt->bindParam(1,$id);
			$stmt->execute();


			if($stmt){
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				return $row;

			}else{
				return false;
			}

		}
		public function getLastId(){
			// return all message of user
			$query = "SELECT * FROM message ORDER BY id DESC LIMIT 0,1";

			$stmt = $this->conn->prepare($query);
			
			$stmt->execute();


			if($stmt){
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				return $row['id'];

			}else{
				return false;
			}

		}
		public function getMessage(){
			// return all message of user
			$query = "SELECT * FROM message";

			$stmt = $this->conn->prepare($query);
			
			$stmt->execute();


			if($stmt){
				

				return $stmt;

			}else{
				return false;
			}

		}

		

		public function updateMessage($username,$msg){
			// create message for a user
			$query = "INSERT INTO  message SET username=:username,message=:msg,created=:created";

			$stmt = $this->conn->prepare($query);

			$msg = htmlspecialchars(strip_tags($msg));
			$created = date('Y-m-d H:i:s');

			$stmt->bindParam(":username",$username);
			$stmt->bindParam(":msg",$msg);
			$stmt->bindParam(":created",$created);

			$stmt->execute();
			
			if($stmt){
				return true;

			}else{
				return false;
			}
		}
			
	}
 ?>