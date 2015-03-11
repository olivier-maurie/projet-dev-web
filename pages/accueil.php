<?php include('../includes/connexion_bdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet foot | Connexion, inscription</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
	<link href="../css/design.css" rel="stylesheet"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- HEADER -->
<?php include("../includes/header.php"); ?>

<!-- LAYOUT -->
<div class="layout">
	<?php 
		$sql = $db->prepare("SELECT dom, ext, butdom, butext, cotedom, cotenul, coteext FROM resultat");
		$sql->execute();
		
		while ($resultat2 = $sql->fetch())
		{
			echo "	<div class=\"match\">
					<h3>".$resultat2['dom'].' '.$resultat2['butdom'].' - '.$resultat2['butext'].' '.$resultat2['ext']. "</h3>" ;
		?>
			<form method="POST" action="" class="parie">
				<label class="cotes">
					<p><?php echo substr($resultat2['dom'], 0, 3); ?></p>
					<input type="radio" name="cote" value="cotevic"> <span class="cotes-number"><?php echo $resultat2["cotedom"];?></span>
				</label>
				<label class="cotes">
					<p>Nul</p>
					<input type="radio" name="cote" value="cotenul" checked> <span class="cotes-number"><?php echo $resultat2["cotenul"];?></span>
				</label>
				<label class="cotes">
					<p><?php echo substr($resultat2['ext'], 0, 3); ?></p>
					<input type="radio" name="cote" value="cotedef"> <span class="cotes-number"><?php echo $resultat2["coteext"];?></span>
				</label>
				<label class="box-points-mise">Points misés<input type="number" min="1" max="50" name="sommepari" placeholder="(uniquement entre 1 et 50)">
				<input type="submit" name="envoyer" value="PARIER !">
				</label>
			</form>
			<div class="clear"></div>
		</div>
		<?php
		}
	?>
</div>

<!-- FOOTER -->
<?php include("../includes/footer.php"); ?>

</body>
</html>