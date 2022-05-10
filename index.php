<?php
	require_once('./lib/Auth.php');
	require_once('./lib/Data.php');

//	try {
//		$db = new PDO('mysql:host=db;port=3306;dbname=clients-from-internet', 'root', 'root');
//	} catch (PDOException $e) {
//		include('templates/db_error.html');
//		die;
//	}

	//	var_dump($db->getAttribute(PDO::ATTR_CONNECTION_STATUS));

	//get user state
	$auth = new Auth();
	$isAuth = $auth->getAuth();

	//from login form
	if (isset($_POST['email'])) {
		$email = htmlspecialchars($_POST['email']);
		$password = $_POST['password'];
		$loginResult = $auth->login($email, $password);

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

	//DATA section
	$data = new Data();

	//CRUD
	if (isset($_POST['id'])){
		$card = [
			'id' => $_POST['id'],
			'title' => $_POST['title'],
			'description' => $_POST['description'],
			'parentId' => $_POST['parentId'],
		];

		$data->updateCardById($card);
	}

	if (empty($_POST['id']) && !empty($_POST['title'])){
		$card = [
			'title' => $_POST['title'],
			'description' => $_POST['description'],
			'parentId' => $_POST['parentId'],
		];

		$data->createCard($card);
	}

	if (!empty($_POST['deleteId'])){
		$data->deleteCard($_POST['deleteId']);
	}

	//get cards
	$cards = $data->getCards();
	$allCards = $data->getAllCards();

//	echo '<pre>';
//	print_r($cards);
//	echo '</pre>'; die;

	if ($_GET['action'] === "login" && !$isAuth) {
		include('templates/login.html');
	} else {
		include('templates/index.php');
	}




