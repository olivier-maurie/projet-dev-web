<?php
	include('../includes/connexion_bdd.php');
	session_start();
	$id = $_SESSION["user_id"];
	
	$sql = $db->prepare('SELECT dom, ext, sommeparie FROM pari WHERE id_user ='.$id.'');
	$sql->execute();
	while ($liste = $sql->fetch())
	{
		echo $liste["dom"]."</br>";
	}
	
	
?>