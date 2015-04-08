<?php include('../includes/connexion_bdd.php');
require_once "../includes/autoload.inc.php";
session_start(); ?>
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
	<?php include("../includes/header.php"); ?>
	
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
				<table class="table table-striped .table-responsive">
					<thead>
						<tr>
							<th>Match</th>
							<th>Cotes</th>
							<th>Mise</th>
						<tr>
					</thead>
					<tbody>
						<?php
							include('../includes/connexion_bdd.php');
							$id = $_SESSION["user_id"];
							
							$sql = $db->prepare('SELECT dom, ext, coteparie, sommeparie, equipe_pari FROM pari WHERE id_user ='.$id.'');
							$sql->execute();
							while ($liste = $sql->fetch())
							{
								echo "<tr>
											<td>".$liste["dom"]." - ".$liste["ext"]." (".$liste["equipe_pari"].")</td>
											<td>".$liste["coteparie"]."</td>
											<td>".$liste["sommeparie"]."</td>
										</tr>";
										
							}	
						?>
					</tbody>
				</table>
			</div>
		</div>

	<!-- FOOTER -->
	<?php include_once('../includes/footer.php'); ?>
</html>