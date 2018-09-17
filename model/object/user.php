<?php 
	class User{
		private $conn;
		private $id;
		private $username;
		private $email;
		private $password;
		private $phonenum;
		private $address;


		// constructor
		public function __construct($db){
			$this->conn = $db;
		}
		public function getId(){
			return $this->id;

		}
		public function setId($id){
			$this->id = $id;
		}


		public function getUsername(){
			return $this->username;

		}
		public function setUsername($username){
			$this->username = $username;
		}
		public function getEmail(){
			return $this->email;

		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function getPhonenum(){
			return $this->phonenum;

		}
		public function setPhonenum($phonenum){
			$this->phonenum = $phonenum;
		}


		// function to login user
		public function getUser($username,$password){

			$query = "SELECT * FROM user WHERE (nameuser=:username AND password=:password)";

			$stmt = $this->conn->prepare($query);

			$username = htmlspecialchars(strip_tags($username));
			$password = htmlspecialchars(strip_tags($password));
			$password = md5($password);

			$stmt->bindParam(':username',$username);
			$stmt->bindParam(':password',$password);
			
			$stmt->execute();

			if($stmt->rowCount()>0){
				return true;
			}else{
				return false;

			}
		}

		// function to create new user
		public function createUser($firstname,$lastname,$username,$email,$phonenum,$address,$password){
			$query = "INSERT INTO user SET firstname=:firstname,lastname=:lastname,nameuser=:username,email=:email,phone=:phonenum,address=:address, password=:password";

			$stmt = $this->conn->prepare($query);

			$firstname = htmlspecialchars(strip_tags($firstname));
			$lastname = htmlspecialchars(strip_tags($lastname));
			$username = htmlspecialchars(strip_tags($username));
			$email = htmlspecialchars(strip_tags($email));
			$phonenum = htmlspecialchars(strip_tags($phonenum));
			$address = htmlspecialchars(strip_tags($address));
			$password = htmlspecialchars(strip_tags($password));
			$password = md5($password);

			$stmt->bindParam(':firstname',$firstname);
			$stmt->bindParam(':lastname',$lastname);
			$stmt->bindParam(':username',$username);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':phonenum',$phonenum);
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':password',$password);

			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// function to check username is exist

		public function checkUsername($username){

			$query = "SELECT nameuser FROM user WHERE nameuser=:username";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':username',$username);
			$stmt->execute();

			if($stmt->rowCount()>0){
				
				return true;
			}else{

				return false;

			}

		}
		

		// function to check email is exist
		public function checkEmail($email){
			$query = "SELECT email FROM user WHERE email=:email";

			$email = htmlspecialchars(strip_tags($email));

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':email',$email);
			

			$stmt->execute();
			if($stmt->rowCount()>0){
				return true;
			}else{
				return false;
			}
		}

	}
 ?>