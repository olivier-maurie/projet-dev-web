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
	
	public function __construct($p_id, $p_nom, $p_prenom, $p_password, $p_pseudo, $p_point)
	{
		$this->_id=$p_id;
		$this->_admin=0;
		$this->_nom =$p_nom;
		$this->_prenom=$p_prenom;
		$this->_password=$p_password;
		$this->_pseudo=$p_pseudo;
		$this->_points=$p_point;
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
	
	public function ajouteraupari($id, $sommepari)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=rpgfoot', 'root', '');
			$db->query('SET NAMES utf8');
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		$cote = $id;
		$id_user = $this->_id;
		$sql = "SELECT COUNT(*) AS nb, id, dom, ext, cotedom, cotenul, coteext FROM resultat WHERE id=".$id."";
		$sql2 = $db->prepare($sql);
		$liste = $sql2->execute();
		$var = $sql2->fetch();
		if($var["nb"]==1)
		{
			$sql3 = $db->prepare("INSERT INTO pari (dom, ext, cotedom, cotenul, coteext, sommeparie, id_user) VALUES('".$var["dom"]."','".$var["ext"]."', '".$var["cotedom"]."', '".$var["cotenul"]."', '".$var["coteext"]."', '".$sommepari."', '".$id_user."')"); 
			$sql3->execute();
		}
		
	}
		
			
		
		
	
	public function getPoint()
	{
		return $this->_points;
	}
}