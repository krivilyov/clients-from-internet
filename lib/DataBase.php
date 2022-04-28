<?php
	class DataBase {
		private $db;

		public function __construct()
		{
			$this->db = new PDO('mysql:host=db;port=3306;dbname=clients-from-internet', 'root', 'root');
		}

		public function getUser ($email) {
			$user = null;

			$sth = $this->db->prepare("SELECT * FROM `users` WHERE `email` = :email");
			$sth->execute(['email' => $email]);
			$user = $sth->fetch(PDO::FETCH_ASSOC);

			return $user;
		}

		public function getData () {
			return $this->db->query("SELECT * FROM `cards`")->fetchAll(PDO::FETCH_ASSOC);
		}
	}
