<?php 
	

	require_once '../config/database.php';
	require_once '../model/object/user.php';
	
	// start a session 
	session_start();
	

	$db = new Database();
	$db->getConnect();

	$user = new User($db->getConn());
	
	
		
		$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
		$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
		$username = isset($_POST['username']) ? $_POST['username'] : "";
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$phonenum = isset($_POST['phonenum']) ? $_POST['phonenum'] : "";
		$address = isset($_POST['address']) ? $_POST['address'] : "";
		$password = isset($_POST['password']) ? $_POST['password'] : "";
		
		$firstnameErr = "";
		$lastnameErr = "";
		$usernameErr = "";
		$emailErr = "";
		$phoneErr = "";
		$passErr = "";

			
		// check validate data
		if(empty($firstname)){

			 $GLOBALS['firstnameErr'] = "Firstname is required";
			

		}else if(!preg_match("/^[a-zA-Z ]*$/",$firstname)){

				 $GLOBALS['firstnameErr'] = "Only letters and white space allowed";
		}


		if(empty($lastname)){
			 $GLOBALS['lastnameErr'] = "Lastname is required";

		}else if(!preg_match("/^[a-zA-Z ]*$/",$lastname)){

				 $GLOBALS['lastnameErr'] = "Only letters and white space allowed";
		}


		if(empty($username)){
			
			 $GLOBALS['usernameErr'] = "Username is required";

		}else if(!preg_match("/^[a-zA-Z ]*$/",$username)){

				 $GLOBALS['usernameErr'] = "Only letters and white space allowed";
			//
		}else if ($user->checkUsername($username)){

				 $GLOBALS['usernameErr'] = "Username is exist.Please choose anothor one.";
		}else{
			
		}


		if(empty($email)){

			 $GLOBALS['emailErr'] = "Email is required";

		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      		
      		 $GLOBALS['emailErr'] = "Invalid email format";
    	}
		//
		else if($user->checkEmail($email)){

			 $GLOBALS['emailErr'] = "Email is exist.Please choose anothor one.";
			
		}else{

		}

		if(empty($phonenum)){

			 $GLOBALS['phoneErr']= "";

		}else if(!preg_match('/^(01[269]|09|08)[0-9]{8}$/',$phonenum)){

			 $GLOBALS['phoneErr'] = "Phone number is incorrect";

		}else{

		}

		if(empty($password)){
			 $GLOBALS['passErr'] = "Password is required";

		}else if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z!@#$%]{8,}$/',$password)){

				 $GLOBALS['passErr'] = "Password have least 8 chars,least uppercase,lowercase,one number";
		}

		
		if(empty($firstnameErr) && empty($lastnameErr) && empty($usernameErr) && empty($emailErr) && empty($phoneErr) &&empty($passErr)){

			if($user->createUser($firstname,$lastname,$username,$email,$phonenum,$address,$password)){

				// if ok ,save user
				$_SESSION['valid_user'] = $username;
				

				echo "success";

			}else{
				$error =  "Could not register.Please try again";
				$error_item = array(
					"error"=>$error
				);
				
				echo json_encode($error_item);
			}
		}else{

			$error_item = array(
				"firstnameErr"=> $GLOBALS['firstnameErr'],
				"lastnameErr"=> $GLOBALS['lastnameErr'],
				"usernameErr"=> $GLOBALS['usernameErr'],
				"emailErr"=> $GLOBALS['emailErr'],
				"phoneErr"=> $GLOBALS['phoneErr'],
				"passErr"=> $GLOBALS['passErr']
			);
			
			echo json_encode($error_item);
	}
	
 ?>
