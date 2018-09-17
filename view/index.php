<?php 
	session_start();
	require_once 'display_html.php';
	require_once '../config/database.php';
	require_once '../model/object/message.php';

	// connect to database
	$db  = new Database();
	$db->getConnect();
	$message = new Message($db->getConn());
	
	

	if(isset($_SESSION['valid_user'])){

		// display header
		display_html_header('Index');


		display_html_index();

		$stmt = $message->getMessage($_SESSION['valid_user']);

		// display input message
		display_message_form($stmt);

		// display footer
		display_html_footer();

	}else{

		// display header
		display_html_header('Error');

		//redirect to login page
		display_message();

		// display footer
		display_html_footer();
	}
 ?>