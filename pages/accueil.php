<?php include('../includes/connexion_bdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="URF-8">
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

<?php
session_start();
$sql = $db->prepare("SELECT id, dom, ext, butdom, butext, cotedom, cotenul, coteext FROM resultat");
$sql->execute();
while ($resultat2 = $sql->fetch())
{
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="row">
			<div class="col-md-4">
				<h3><?php echo $resultat2['dom']; ?> <?php echo $resultat2['butdom']; ?> - <?php echo $resultat2['butext']; ?> <?php echo $resultat2['ext'];?> </h3>
			</div>
			
			<form method="POST" action="" class="parie">
				<div class="col-md-3">
				<?php echo substr($resultat2['dom'], 0, 3); ?>
				<input type="radio" name="cote"><?php echo $resultat2["cotedom"];?>

				Nul
				<input type="radio" name="cote" checked><?php echo $resultat2["cotenul"];?>

				<?php echo substr($resultat2['ext'], 0, 3); ?>
				<input type="radio" name="cote"><?php echo $resultat2["coteext"];?>

				</div>

				<div class="col-md-4">
					<input type="number" class="form-control" min="1" max="50" name="sommepari" placeholder="(uniquement entre 1 et 50)">
				</div>
				<div class="col-md-1">
					<input type="submit" class="btn btn-default" name="envoyer" value="PARIEZ !">
				</div>
				<input type="number" name="id_paris" class="hidden-parie" value="<?php echo $resultat2["id"]; ?>"/>
			</form>
		</div>
	</div>
</div>

<!--input type="number" name=""/-->
<?php
}
?>



<!-- FOOTER -->
<?php include("../includes/footer.php"); ?>
<?php
if(!empty($_POST["envoyer"]))
{
$id_pari = $_POST["id_pari"];
$user = $_SESSION["user"];
$cote = $_POST['cote'];
$somme = $_POST['sommepari'];
if ($somme > 0)
{
if ($somme <51)
{
if($user->getPoint()-$somme >= 0)
{
$user->parier($somme);
}
else
{
echo "Vous n'avez pas assez de points pour parier autant, attendez la semaine prochaine.";
}
}
else
{
echo "Vous ne pouvez pas parier plus de 50 points";
}
}
else
{
echo "Vous devez entrer un nombre";
}
}
?>
</body>
