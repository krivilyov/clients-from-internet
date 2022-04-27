<?php

class Auth
{
	public function getAuth()
	{
		//check cookie
		if (isset($_COOKIE['user_id'])) {
			//increase cookie time
			setcookie('user_id', '', time() - 1, '/');
			setcookie('user_id', $_COOKIE['user_id'], time() + 50000, '/');

			return true;
		}

		return false;
	}

	public function login($db, $email = '', $password = '')
	{
		$errors = [];
		$userId = null;

		if (!empty($email) && !empty($password)) {

			$sth = $db->prepare("SELECT * FROM `users` WHERE `email` = :email");
			$sth->execute(['email' => $email]);
			$user = $sth->fetch(PDO::FETCH_ASSOC);

			if (!$user) {
				$errors['email'] = 'Пользователя с таким E-mail не существует';
				return ['userId' => $userId, 'errors' => $errors];
			}

			//compare passwords
			if(!password_verify($password, $user['password'])){
				$errors['password'] = 'Вы указали неверный пароль';
				return ['userId' => $userId, 'errors' => $errors];
			}

			$userId = $user['id'];
			$errors = [];

			//set auth cookie
			setcookie('user_id', $userId, time() + 50000, '/');

		} else {
			if (empty($email)) {
				$errors['email'] = 'Необходимо заполнить поле E-mail';
			}
			if (empty($password)) {
				$errors['password'] = 'Необходимо заполнить поле Password';
			}
		}

		return ['userId' => $userId, 'errors' => $errors];
	}

	public function logout () {
		//remove cookie auth
		setcookie('user_id', '', time() - 1, '/');
	}
}
