<?php
	include('../functions_films.php');
	include('../tableFunctions.php');

	if (isset($_GET["action"])) {
		$action = $_GET["action"];
	} elseif (isset($_POST["action"])) {
		$action = $_POST["action"];
	} else {
		$action = "";
	}

	if ($action == "DELETE") {
		$id_films = $_POST["id"];
		deleteFilm($id_films);
		echo "Film supprimé <br>";
		echo "<a href='gestionFilms.php'>Liste des films</a>";
		exit();
	}

	if (isset($_POST["id"])) {
		$id_films = $_POST["id"];
		$titre = $_POST["titre_films"];
		$annee = $_POST["annee_films"];
		$synopsis = $_POST["synopsis_films"];
		$affiche = $_POST["affiche_films"];
		$lien_teaser = $_POST["teaser_films"];
		$teaser = str_replace("watch?v=", "embed/", $lien_teaser);
		$teaser = explode("&", $teaser)[0];
		$lien_video = $_POST["video_films"];
		$video = str_replace("watch?v=", "embed/", $lien_video);
		$video = explode("&", $video)[0];
		
		if ($action == "CREATE") {
			createFilm($titre, $annee, $synopsis, $affiche, $teaser, $video);
			echo "Film créé <br>";
			echo "<a href='gestionFilms.php'>Liste des films</a>";
			exit();
		} elseif ($action == "UPDATE") {
			updateFilm($id_films, $titre, $annee, $synopsis, $affiche, $teaser, $video);
			echo "Film mis à jour <br>";
			echo "<a href='gestionFilms.php'>Liste des films</a>";
			exit();
		}
	}

	// Si l'action n'est pas valide ou si le formulaire n'a pas été soumis correctement, afficher un message d'erreur
	echo "Une erreur est survenue. Veuillez réessayer. <br>";
	echo "<a href='gestionFilms.php'>Liste des films</a>";
?>

