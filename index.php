<?php
	$db = new PDO('mysql:host=db;port=3306;dbname=clients-from-internet', 'root', 'root');
	var_dump($db->getAttribute(PDO::ATTR_CONNECTION_STATUS));
