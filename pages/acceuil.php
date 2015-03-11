<?php include("connexion_bdd.php");?>
<html>
<head>
	<title>En Direct du Stade</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../styles/moncss.css"/>
</head>
<body>
<!-- HEADER -->
<?php include("header.php"); ?>

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
<?php include("footer.php"); ?>

</body>
</html>