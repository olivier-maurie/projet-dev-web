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
	<?php include("../includes/header.php"); ?>
	
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<table class="table table-striped">
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
							session_start();
							$id = $_SESSION["user_id"];
							
							$sql = $db->prepare('SELECT dom, ext, coteparie, sommeparie FROM pari WHERE id_user ='.$id.'');
							$sql->execute();
							while ($liste = $sql->fetch())
							{
								echo "<tr>
											<td>".$liste["dom"]."</td>
											<td>".$liste["coteparie"]."</td>
											<td>".$liste["sommeparie"]."</td>
										</tr>";
										
							}	
						?>
					</tbody>
				</table>
			</div>
		</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
	</body>
</html>