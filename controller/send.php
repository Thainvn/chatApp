<?php 
	require_once '../config/database.php';
	require_once '../model/object/message.php';
	session_start();

	$db  = new Database();
	$db->getConnect();
	$message = new Message($db->getConn());
	$message_arr = array();


	$msg  = isset($_POST['msg']) ? $_POST['msg'] : "";
	
	
	if(empty($msg)){
		//$lastId = $message->getLastId();
		
		$id = (isset($_POST['id']) && $_POST['id']>0) ? $_POST['id'] : 0 ;

		
		$result = $message->getLastmessage($id);

		

		if($result){
			echo json_encode($result);
		}else{
			echo "fail";
		}
		
		

	}else{
		$message->updateMessage($_SESSION['valid_user'],$msg);
	}
 ?>