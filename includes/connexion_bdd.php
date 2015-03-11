<?php
session_start();
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=rpgfoot', 'root', '');
		$db->query('SET NAMES utf8');
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}

?>