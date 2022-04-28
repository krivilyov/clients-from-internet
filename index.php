<?php
	require_once('./lib/auth.php');

	try {
		$db = new PDO('mysql:host=db;port=3306;dbname=clients-from-internet', 'root', 'root');
	} catch (PDOException $e) {
		include('templates/db_error.html');
		die;
	}

	//	var_dump($db->getAttribute(PDO::ATTR_CONNECTION_STATUS));

	//get user state
	$auth = new Auth();
	$isAuth = $auth->getAuth();

	//from login form
	if (isset($_POST['email'])) {
		$email = htmlspecialchars($_POST['email']);
		$password = $_POST['password'];
		$loginResult = $auth->login($db, $email, $password);

		//if login return errors -> show login again with errors
		if (!empty($loginResult['errors'])) {
			include('templates/login.html');
		} else {
			header('Location: /');
		}
	}

	if ($_GET['action'] === "logout" && $isAuth) {
		$auth->logout();
		header('Location: /');
	}

	if ($_GET['action'] === "login" && !$isAuth) {
		include('templates/login.html');
	} else {
		include('templates/index.html');
	}

	//DATA section





