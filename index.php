<?php
	include('includes/connexion_bdd.php');
	require_once '/autoload.inc.php';
	$erreur = ''; 
	if (!empty($_POST["envoyer"]))
	{
		$sql = 'SELECT COUNT(*) AS nb, id,nom, prenom, pseudo, password, points, admin FROM user WHERE pseudo ="'.$_POST["pseudo"].'" AND password ="'.$_POST["password"].'"';
		$sql2 = $db->prepare($sql);
		$sql2->execute();
		$columns =$sql2->fetch();
		$_SESSION["user_id"]=$columns["id"];
		if($columns["nb"] == 1)
		{
			$sql3 = $db->prepare('SELECT id, nom, prenom, password, pseudo, points ,admin FROM user WHERE id='.$columns["id"].'');
			$sql3->execute();
			$useract = new user($columns["id"], $columns["nom"], $columns["prenom"], $columns["password"], $columns["pseudo"], $columns["points"]);
			session_start();
			$_SESSION["user"] = $useract;
			$_SESSION["user_id"] = $columns["id"];
			$_SESSION["points"] = $columns["points"];
			echo "admin : ".$columns["admin"];
			if($columns["admin"]==11)
			{
				header('location:pages/pageadmin.php');
			}
			else{
				header('location:pages/accueil.php');
			}
		}
		else 
		{
			$erreur = "Erreur d'authentification";
		}
	}
	
	if (!empty($_POST["soumettre"]))
	{
		if($_POST["passwordin"]==$_POST["repassword"])
		{
			$nom = $_POST["nom"];
			$prenom = $_POST["prenom"];
			$password = $_POST["passwordin"];
			$pseudo = $_POST["pseudoin"];
			$sql = $db->prepare('INSERT INTO user(nom, prenom, password, pseudo, points) VALUES ("'.$nom.'", "'.$prenom.'", "'.$password.'", "'.$pseudo.'", 100)');
			$sql->execute();
			$sql2 = $db->prepare('SELECT id, nom, prenom, password, pseudo, points FROM user WHERE pseudo ="'.$_POST["pseudoin"].'" AND password ="'.$_POST["passwordin"].'"');
			$sql2->execute();
			$columns2=$sql2->fetch();
			$useract = new user($columns2["id"], $columns2["nom"], $columns2["prenom"], $columns2["password"], $columns2["pseudo"], $columns2["points"]);
			session_start();
			$_SESSION["user_id"] = $columns2["id"];
			$_SESSION["user"] = $useract;
			$_SESSION["points"] = $columns2["points"];
			header('location:pages/accueil.php');
		}
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet foot | Connexion, inscription</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/design.css" rel="stylesheet"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					<a href="index.php"><h1>Resultats Ligue 1</h1></a>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="container">

	<div class="row">
		<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<form method="POST" action="" class="index">
					<h4 class="text-center">Connexion</h4>
					<input type="text" class="form-control" name="pseudo" placeholder="Pseudo" />
					<input type="password" class="form-control" name="password" placeholder="Mot de passe"/>
					<input type="submit" class="btn btn-default center-block" name="envoyer"/>
				</form>
				<?php echo '<span class="erreur">'.$erreur.'</span>'; ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<form method="POST" action="" class="index">
					<h4 class="text-center">Inscription</h4>
					<input type="text" class="form-control" name="pseudoin" placeholder="Pseudo"/>
					<input type="password" class="form-control" name="passwordin" placeholder="Mot de passe"/>
					<input type="password" class="form-control"name="repassword" placeholder="Confirmer le mot de passe"/>
					<input type="text" class="form-control"name="nom" placeholder="Nom"/>
					<input type="text" class="form-control"name="prenom" placeholder="Prénom"/>
					<input type="submit" class="btn btn-default center-block" name="soumettre"/>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>