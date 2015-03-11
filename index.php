<?php include('includes/connexion_bdd.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet foot</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	<?php
		
		require_once '/autoload.inc.php';
		if (!empty($_POST["envoyer"]))
		{
			$sql = 'SELECT COUNT(*) AS nb, id, pseudo, password FROM user WHERE pseudo ="'.$_POST["pseudo"].'" AND password ="'.$_POST["password"].'"';
			echo $sql;
			$sql2 = $db->prepare($sql);
			$sql2->execute();
			$columns =$sql2->fetch();
			$_SESSION["user_id"]=$columns["id"];
			if($columns["nb"] == 1)
			{
				header('location:pages/acceuil.php');
			}
			else 
			{
				echo "erreur d'authentification";
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
				$sql = $db->prepare('INSERT INTO user(nom, prenom, password, pseudo) VALUES ("'.$nom.'", "'.$prenom.'", "'.$password.'", "'.$pseudo.'")');
				$sql->execute();
				$sql2 = $db->prepare('SELECT id, nom, prenom, password, pseudo FROM user WHERE pseudo ="'.$_POST["pseudoin"].'" AND password ="'.$_POST["passwordin"].'"');
				$sql2->execute();
				$columns2=$sql2->fetch();
				$useract = new user($columns2["id"], $columns2["nom"], $columns2["prenom"], $columns2["password"], $columns2["pseudo"]);
				$_SESSION["user_id"] = $columns2["id"];
				$_SESSION["user"] = $useract;
			}
		}
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 ">
				<form method="POST" action="" class="index">
					<h4>Connexion</h4>
					<input type="text" class="form-control col-md-4" name="pseudo" placeholder="Pseudo" />
					<input type="password" class="form-control" name="password" placeholder="Mot de passe"/>
					<input type="submit" name="envoyer"/>
				</form>

			<form method="POST" action="" class="index">
			<h4>Inscription</h4>
				<input type="text" class="form-control" name="pseudoin" placeholder="Pseudo"/>
				<input type="password" class="form-control" name="passwordin" placeholder="Mot de passe"/>
				<input type="password" class="form-control"name="repassword" placeholder="Confirmer le mot de passe"/>
				<input type="text" class="form-control"name="nom" placeholder="Nom"/>
				<input type="text" class="form-control"name="prenom" placeholder="Prénom"/>
				<input type="submit" name="soumettre"/>
			</form>
			</div>
		</div>
	</div>
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>