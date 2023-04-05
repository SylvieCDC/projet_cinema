<?php

	include('../functions_films.php');
	include('../tableFunctions.php');
	
	$id_films = $_GET["id"] ?? 0;
	if ($id_films == 0) {
		$films = [
			'Id_films' => '',
			'titre_films' => '',
			'annee_films' => '',
			'synopsis_films' => '',
			'affiche_films' => '',
			'teaser_films' => '',
			'video_films' => ''
		];
		$action = "CREATE";
		$libelle = "Ajouter un film";
	} else {
		$films = readFilm($id_films);
		if ($films) {
			$action = "UPDATE";
			$libelle = "Mettre à jour";
		} else {
			echo "Le film avec l'ID $id_films n'existe pas.";
			exit();
		}
	}

// Vérifier l'existence de chaque clé avant de l'utiliser
$id_films = isset($films['Id_films']) ? $films['Id_films'] : '';
$titre = isset($films['titre_films']) ? $films['titre_films'] : '';
$annee = isset($films['annee_films']) ? $films['annee_films'] : '';
$synopsis = isset($films['synopsis_films']) ? $films['synopsis_films'] : '';
$affiche = isset($films['affiche_films']) ? $films['affiche_films'] : '';
$teaser = isset($films['teaser_films']) ? $films['teaser_films'] : '';
$video = isset($films['video_films']) ? $films['video_films'] : '';



// Fermeture de la connexion à la base de données
$db = null;

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

<?php	include('../../pages\nav.php'); ?>
	

	<body>
		<form class="formcrud" action="createUpdateFilm.php" method="post">
			<div class="button"><a href="gestionFilms.php">Liste des films</a></div>
			<input type="hidden" name="id" value="<?= $films['Id_films'] ?>"/>
			<input type="hidden" name="action" value="<?= $action ?>"/>


            <!-- //////// Formulaire ////////// -->
            
			<label for="titre_films">Titre </label>
			<input type="text" id="titre_films" name="titre_films" value="<?= $films['titre_films'] ?>">

			<label for="annee_films">Année</label>
			<input type="text" id="annee_films" name="annee_films" value="<?= $films['annee_films'] ?>">

			<label for="synopsis_films">Synopsys</label>
			<textarea id="synopsis_film" name="synopsis_films" rows="5" cols="33"><?= $films['synopsis_films'] ?></textarea>

            <label for="affiche_films">Affiche du film </label>
		    <input type="text" id="affiche_films" name="affiche_films" placeholder="Lien url de l'affiche">
			
            <label for="teaser_films">Teaser </label>
		    <input type="text" id="teaser_films" name="teaser_films" placeholder="Lien url du teaser">
 
            <label for="video_films">Vidéo </label>
		    <input type="text" id="video_films" name="video_films" placeholder="Lien url de la vidéo">

            <label for="nom_genres">Genres</label>
            <select name="nom_genres" id="nom_genres" multiples>

                <option value="genres">Action</option>
                <option value="comedie">Comédie</option>
                <option value="asie">Asie</option>
                <option value="horreur">Horreur</option>
                <option value="thriller">Thriller</option>

            </select>

        <!-- <input type="submit" name="nom_genres" id="nom_genres" value="Ajouter genres"></form> -->



            <div class="button">
				<button type="submit"><?= $libelle ?></button>
			</div> 


		</form>
		<br>
		<?php if ($action!="CREATE") { ?>
			<form action="createUpdateFilm.php" method="post">
				<input type="hidden" name="action" value="DELETE"/>
				<input type="hidden" name="id" value="<?= $films['Id_films'] ?>"/>
				<div class="button">
					<button type="submit">Supprimer</button>
				</div>
			</form>
		<?php } ?>
    
</body>
</html>
