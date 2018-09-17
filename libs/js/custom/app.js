$(document).ready(function(){
	
	$("#loginform").click(function(event){
		event.preventDefault();

		var username = $("#username").val();
		var password = $("#password").val();
		var error = true;

		 var data = $('#login-form').serialize(); 

		if(username == ""){
			$("#usernameErr").text("Username is required");
			error = false;
		}

		if(password == ""){
			$("#passErr").text("Password is required");
			error = false;
		}

		if(error){
			$.ajax({
                url: '../controller/login.php',
                type: "POST",
				data :data,
				success:function(data){

					if(data == "success"){
						
						window.location.href = "index.php";
						
					}else{
						
						var obj = JSON.parse(data);	
						
						if(obj.errora != undefined){

							$("#error").text(obj.errora);
							$("#error").css("display","block");
						}											
						 

						 $("#usernameErr").text(obj.usernameErr);
						 $("#passErr").text(obj.passErr);

					}

				}
			});
		}
	});




	$("#registerform").click(function(e){
		e.preventDefault();

		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		var username = $("#username").val();
		var email = $("#email").val();
		var address = $("#address").val();
		var password = $("#password").val();

		var error = true;
		var data = $('#register-form').serialize(); 

		if(username == ""){
			$("#usernameErr").text("Username is required");
			error = false;
		}

		
		if(email == ""){
			$("#emailErr").text("Email is required");
			error = false;
		}

		if(password == ""){
			$("#passErr").text("Password is required");
			error = false;
		}


		if(error){
			$.ajax({
				url :"../controller/register.php",
				type: "POST",
				data :data,
				success : function(data){
					
					if(data == "success"){

						window.location.href = "index.php";

					}else{
						var obj = JSON.parse(data);	
					
						$("#firstnameErr").text(obj.firstnameErr);
						$("#lastnameErr").text(obj.lastnameErr);
						$("#emailErr").text(obj.emailErr);
						$("#phoneErr").text(obj.phoneErr);
						$("#usernameErr").text(obj.usernameErr);
						$("#passErr").text(obj.passErr);
					}
				}

			});
		}
	});

	$("#sendMessage").click(function(event){
		event.preventDefault();

		 sendChatText();
		var msg = $("#msg").val();				
		
	});
	var lastTimeId = 0;
	startChat();

	function startChat(){
			setInterval( function() { getChatText(); }, 1000);
	}



	function sendChatText(){
		var msg = $("#msg").val();
		var data = $("#msg_form").serialize();
		if(msg != ""){
			$.ajax({
					url : "../controller/send.php",
					method : "POST",
					data :data
				});
			$('#msg').val('');
		}
	}



	function getChatText(){
		
				$.ajax({
					url : "../controller/send.php",
					method : "POST",
					data : { id:lastTimeId },
					success : function(data){

						if(data != "fail"){
							
							var obj = JSON.parse(data);	

							$(".main_content").append("\
								<div class='message'>\
									<img src='../libs/images/login_icon.png' alt='Avatar' style='width:100%;'>\
									<p>" + obj.message + "</p>\
									<span class='time-right'>" + obj.created + "</span>\
								</div>"
								);

							lastTimeId = obj.id;
						

						}
					}

				});
			}
});