<?php
	include('../functions.php');
	include('../tableFunctions.php');

	if (isset($_GET["action"])) {
		$action = $_GET["action"];
	} elseif (isset($_POST["action"])) {
		$action = $_POST["action"];
	} else {
		$action = "";
	}

	if ($action == "DELETE") {
		$id = $_POST["id"];
		deleteUser($id);
		echo "Utilisateur supprimé <br>";
		echo "<a href='gestionUsers.php'>Liste des utilisateurs</a>";
		exit();
	}

	if (isset($_POST["id"])) {
		$id = $_POST["id"];
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$pseudo = $_POST["pseudo"];
		$email = $_POST["email"];
		$mot_de_passe = $_POST["mot_de_passe"];
		$hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
		if ($action == "CREATE") {
			createUser($nom, $prenom, $pseudo, $email, $hash);
			echo "Utilisateur créé <br>";
			echo "<a href='gestionUsers.php'>Liste des utilisateurs</a>";
			exit();
		} elseif ($action == "UPDATE") {
			updateUser($id, $nom, $prenom, $pseudo, $email, $hash);
			echo "Utilisateur mis à jour <br>";
			echo "<a href='gestionUsers.php'>Liste des utilisateurs</a>";
			exit();
		}
	}

	// Si l'action n'est pas valide ou si le formulaire n'a pas été soumis correctement, afficher un message d'erreur
	echo "Une erreur est survenue. Veuillez réessayer. <br>";
	echo "<a href='gestionUsers.php'>Liste des utilisateurs</a>";
?>