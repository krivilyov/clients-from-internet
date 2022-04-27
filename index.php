<?php
	$db = new PDO('mysql:host=db;port=3306;dbname=clients-from-internet', 'root', 'root');
//	var_dump($db->getAttribute(PDO::ATTR_CONNECTION_STATUS));

//	if(isset($_POST['email'])){
//		var_dump($_POST); die;
//	}

	//entry point
	if($_GET['action'] === "login"){
		include ('templates/login.html');
	} else {
		include ('templates/index.html');
	}


