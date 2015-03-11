<?php

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=rpgfoot', 'root', '');
		$db->query('SET NAMES utf8');
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}


class User {
	private $_id;
	private $_nom;
	private $_prenom;
	private $_password;
	private $_pseudo;
	private $_admin;
	private $_points;
	
	public function __construct($p_id, $p_nom, $p_prenom, $p_password, $p_pseudo)
	{
		$this->_id=$p_id;
		$this->_admin=0;
		$this->_nom =$p_nom;
		$this->_prenom=$p_prenom;
		$this->_password=$p_password;
		$this->_pseudo=$p_pseudo;
		$this->_points=100;
	}
	
	public function update()
	{
		global $db;
		$nomup = $this->_nom;
		$prenomup = $this->_prenom;
		$passwordup = $this->_password;
		$pseudoup = $this->_pseudo;
		$pointsup = $this->_points;
		$idup = $this->_id;
		
		$sql = 'UPDATE user
								SET nom = "'.$nomup.'", prenom = "'.$prenomup.'", password = "'.$passwordup.'", pseudo = "'.$pseudoup.'", points = "'.$pointsup.'" WHERE id = '.$idup.'';
		$sql2 = $db->prepare($sql);
		$sql2->execute();		
	}
	
	public function victoire ($cote, $sommepari)
	{
		$this->_points = $this->points+($sommepari*$cote);
		$this->update();
	}
	
	public function parier ($sommepari)
	{
		$this->_points=$this->_points-$sommepari;
		$this->update();
	}
	
	public function getPoint()
	{
		return $this->_points;
	}
}