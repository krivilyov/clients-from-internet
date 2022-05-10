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

		public function updateCardById ($card) {
			$sql = "UPDATE cards SET title=:title, description=:description, parentId=:parentId WHERE id=:id";

			try {
				$sth = $this->db->prepare($sql);
				$sth->execute($card);
				$result = true;
			} catch (PDOException $e) {
				$e->getMessage();
				$result = false;
			}

			return $result;
		}

		public function createCard ($card) {
			$sql = "INSERT INTO cards (title, description, parentId) VALUES (:title, :description, :parentId)";

			try {
				$sth = $this->db->prepare($sql);
				$sth->execute($card);
				$result = true;
			} catch (PDOException $e) {
				$e->getMessage();
				$result = false;
			}

			return $result;
		}

		public function deleteCard ($id) {
			$sql = "DELETE FROM cards WHERE id=:id OR parentId=:id";

			try {
				$sth = $this->db->prepare($sql);
				$sth->execute(['id' => $id]);
				$result = true;
			} catch (PDOException $e) {
				$e->getMessage();
				$result = false;
			}

			return $result;
		}
	}
