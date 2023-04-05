<?php

	include('../functions.php');
	include('../tableFunctions.php');
	?>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />

    <!-- FontAwesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
    

    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/sliderAccueil.css">
    <link rel="stylesheet" href="../../assets/css/nav.css">
	<link rel="stylesheet" href="../styles.css">
    

    <title>Gérer Utilisateurs</title>

<?php	
	include('../../pages\nav.php');
	
	$id = $_GET["id"] ?? 0;
	if ($id == 0) {
		$user = [
			'Id_utilisateurs' => '',
			'nom_utilisateurs' => '',
			'prenom_utilisateurs' => '',
			'pseudo_utilisateurs' => '',
			'email_utilisateurs' => '',
			'mot_de_passe_utilisateurs' => ''
		];
		$action = "CREATE";
		$libelle = "Ajouter";
	} else {
		$user = readUser($id);
		if ($user) {
			$action = "UPDATE";
			$libelle = "Mettre à jour";
		} else {
			echo "L'utilisateur avec l'ID $id n'existe pas.";
			exit();
		}
	}
?>

<body>
	<form class="formcrud" action="createUpdate.php" method="post">
		<div class="button"><a href="gestionUsers.php">Liste des utilisateurs</a></div>
		<input type="hidden" name="id" value="<?= $user['Id_utilisateurs'] ?>"/>
		<input type="hidden" name="action" value="<?= $action ?>"/>
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" value="<?= $user['nom_utilisateurs'] ?>">
		<label for="prenom">Prénom:</label>
		<input type="text" id="prenom" name="prenom" value="<?= $user['prenom_utilisateurs'] ?>">
		<label for="pseudo">Pseudo:</label>
		<input type="text" id="pseudo" name="pseudo" value="<?= $user['pseudo_utilisateurs'] ?>">
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="<?= $user['email_utilisateurs'] ?>">
		<label for="mot_de_passe">Mot de passe:</label>
		<input type="password" id="mot_de_passe" name="mot_de_passe" value="<?= $user['mot_de_passe_utilisateurs'] ?>">
		<div class="button">
			<button type="submit"><?= $libelle ?></button>
		</div>
	</form>
	<br>
	<?php if ($action!="CREATE") { ?>
		<form action="createUpdate.php" method="post">
			<input type="hidden" name="action" value="DELETE"/>
			<input type="hidden" name="id" value="<?= $user['Id_utilisateurs'] ?>"/>
			<div class="button">
				<button type="submit">Supprimer</button>
			</div>
		</form>
	<?php } ?>
</body>
</html>
