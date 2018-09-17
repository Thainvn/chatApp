<?php 
	function display_html_header($title){
		// display header of page
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title><?php echo $title; ?></title>
			<link rel="stylesheet" href="../libs/css/custom/style.css">
			<link rel="stylesheet" href="../libs/css/lib/bootstrap.min.css">
		</head>
		<body>
			
			<?php
				display_html_navbar($title);
			?>
			<div class="container">
				<div class="page-header">
					<h1>
						<?php echo $title; ?>
					</h1>
				</div>
			
		<?php

		
	}

	function display_html_footer(){
		// display footer of page
		?>
				</div>
				<script src="../libs/js/lib/jquery-3.3.1.min.js"></script>
				<script src="../libs/js/lib/bootstrap.min.js"></script>
				
				<script src="../libs/js/custom/app.js"></script>
			</body>
		</html>
		<?php
	}


	function display_html_navbar($title){
		// display navbar of page
		?>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
				    <div class="navbar-header">
				      <a class="navbar-brand" href="#">ThaiFood</a>
				    </div>
				    <ul class="nav navbar-nav">
				      <li><a href="#">Home</a></li>
				      <li><a href="index.php">Index</a></li>
				  
				    </ul>
				    <ul class="nav navbar-nav navbar-right">
				    	<?php
							if($title == "Index"){
								echo ' <li><a href="layout_logout.php" ><span class="glyphicon glyphicon-user"></span> Logout</a></li>';
								
							}else{
								echo ' <li><a href="layout_register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
								echo '<li><a href="layout_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
							}
				     	
				      ?>
				    </ul>
				</div>
			</nav>
		<?php

	}

	function display_login_form(){
		// display login form 
		?>
			<div class='col-sm-6 col-md-4 col-md-offset-4'>
					 <div class="alert alert-danger" id="error" style="display: none;">
					 </div> 
					   <div class='account-wall'>
					        <div class='tab-content'>
					            <div class='tab-pane active' >
					                <img class='profile-img' src='../libs/images/login_icon.png'>

					               
					               <form class='form-signin' id="login-form" action='' method='post'>

					               		<span class="error" id="usernameErr"></span>
					                    <input type='text' name='username' id="username" class='form-control' placeholder='Username' autofocus />
					                    
										<span class="error" id="passErr"></span>
					                   <input type='password' name='password' id="password" class='form-control' placeholder='Password' />
					                   

					                   <input type='submit' id="loginform" name="submit" class='btn btn-lg btn-primary btn-block' value='Log In' />

					                </form>

					            </div>
					        </div>
					        <p class="text-center">New here?<a href="layout_register.php"> Create an account</a></p>
					    </div>
					 
					</div>
		<?php
	}
	 function display_register_form(){
	 	// display register form
	 	?>
	 		<form action='' id="register-form" method='post' >
	 					 
	 					    <table class='table table-responsive'>
	 					 
	 					        <tr>
	 					            <td class='width-30-percent'>Firstname</td>
	 					            <td><input type='text' name='firstname' id="firstname" class='form-control' /></td>
	 					            <td><span class="error" id="firstnameErr"></span></td>
	 					        </tr>
	 					 
	 					        <tr>
	 					            <td>Lastname</td>
	 					            <td><input type='text' name='lastname' id="lastname" class='form-control'/></td>
	 					            <td><span class="error" id="lastnameErr"></span></td>
	 					        </tr>
	 					 	
		 					 	<tr>
		 					 	    <td>Username</td>
		 					 	    <td><input type='text' name='username' id="username" class='form-control'/></td>
		 					 	    <td><span class="error" id="usernameErr"></span></td>
		 					 	</tr>
	 					 	
	 					        <tr>
	 					            <td>Contact Number</td>
	 					            <td><input type='text' name='phonenum' id="phonenum" class='form-control'/></td>
	 					              <td><span class="error" id="phoneErr"></span></td>
	 					        </tr>
	 					 
	 					        <tr>
	 					            <td>Email</td>
	 					            <td><input type='text' name='email' id="email" class='form-control'/></td>
	 					              <td><span class="error" id="emailErr"></span></td>
	 					        </tr>
	 					 		<tr>
	 					 		    <td>Address</td>
	 					 		    <td><textarea name="address" id="address"  rows="5" class="form-control"></textarea></td>
	 					 		      
	 					 		</tr>
	 					        <tr>
	 					            <td>Password</td>
	 					            <td><input type='password' name='password' id="password" class='form-control'></td>
	 					             <td><span class="error" id="passErr"></span></td>
	 					        </tr>
	 					 
	 					        <tr>
	 					            <td></td>
	 					            <td>
	 					                <button type="submit" id ="registerform" class="btn btn-primary">
	 					                    <span class="glyphicon glyphicon-plus"></span> Register
	 					                </button>
	 					            </td>
	 					        </tr>
	 					 
	 					    </table>
	 					</form>
	 	<?php
	 }


	 function display_message_form($stmt){
	 	// display area to enter message
	 	?>
	 		<div class="content">
	 			<div class="main_content">
	 				<?php
	 					while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	 						extract($row);
	 						?>
	 						<div class="message">
	 						  <img src="../libs/images/login_icon.png" alt="Avatar" style="width:100%;">
	 						  <p><?php echo $message; ?></p>
	 						  <span class="time-right"><?php echo $created; ?></span>
	 						</div>
	 						<?php
	 					}
	 				?>
	 			</div>
	 			<form action="" id="msg_form" method="post">
		 			<table class="table table-responsive table-rounded">
		 				<tr>
				          
				            <td><textarea class='form-control' id="msg" name = "msg" rows = "2"></textarea> </td>
				            <td>
				            	<button type="submit" id="sendMessage" class="btn btn-info">Send</button>
				            </td>
				        </tr>
		 					 
		 			</table>
	 			</form>
	 		</div>
	 		
	 	<?php
	 }
	 function display_message(){
	 	?>
	 		<div>
	 			<p>You are not logged in.Please login first</p>
	 			<a href="layout_login.php">Login</a>
	 		</div>
	 	<?php
	 }

	 function display_html_index(){

		?>	
		 
			<h2>Welcome <?php echo $_SESSION['valid_user']; ?></h2>

		<?php
	}
 ?>