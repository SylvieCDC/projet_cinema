<?php
session_start();
require '../config/connx.php';

// Récupération de l'ID du film depuis l'URL
if (!isset($_GET['id'])) {
    echo "L'ID du film n'a pas été spécifié.";
    exit;
}
$id_films = $_GET['id'];





// Informations selon film et genre d'après l'id du film
$stmt = $db->prepare("SELECT f.*, g.nom_genres 
                      FROM films f 
                      INNER JOIN avoir a ON a.Id_films = f.Id_films 
                      INNER JOIN genres g ON a.Id_genres = g.Id_genres 
                      WHERE f.Id_films = ?");
$stmt->execute([$id_films]);
$films = $stmt->fetch(PDO::FETCH_ASSOC);

// Retrouver tous les genres
$stmt_genres = $db->prepare("SELECT * FROM genres");
$stmt_genres->execute();
$genres = $stmt_genres->fetchAll(PDO::FETCH_ASSOC);





$id_films = $films["Id_films"];
$titre = $films["titre_films"];
$annee = $films["annee_films"];
$synopsis = $films["synopsis_films"];
$affiche = $films["affiche_films"];
$lien_teaser = $films["teaser_films"];
$teaser = str_replace("watch?v=", "embed/", $lien_teaser);
$teaser = explode("&", $teaser)[0];
$lien_video = $films["video_films"];
$video = str_replace("watch?v=", "embed/", $lien_video);
$video = explode("&", $video)[0];


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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <title><?php echo $titre; ?></title>

</head>
<body id="all">
    <!-- Navigation -->
    <?php include('nav.php'); ?>

    <section class="conteneur">
        <div class="row">

            <!-- Teaser----------------->

            <div class="video">
<iframe width="560" height="315" src="<?php echo $teaser; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen> allow=”autoplay”</iframe>
    
            </div>

            <!-- description----------------->

            <div class="description">
                <h1><?php echo $films['titre_films']; ?></h1>
                <p>Année de sortie <?php echo $films['annee_films']; ?></p>
                <p>Genre <?php
    $stmt_genres = $db->prepare("SELECT nom_genres FROM genres INNER JOIN avoir ON genres.Id_genres = avoir.Id_genres WHERE avoir.Id_films = ?");
    $stmt_genres->execute([$id_films]);
    $genres = $stmt_genres->fetchAll(PDO::FETCH_ASSOC);
    $genre_names = array_column($genres, 'nom_genres');
    echo implode(", ", $genre_names);
?></p>

            <!-- Synopsis----------------->

                <p><?php echo $films['synopsis_films']; ?></p>
                <a class="lecture" href="<?php echo $video; ?>"><i class="fa-sharp fa-solid fa-play"></i>Vidéo</a>
            </div>
        </div>

            <!-- Casting----------------->

    <div class="casting">
        <div class="cast">

                <!-- Réalisateurs----------------->

            <div class="pic_rea">
                <h3>Réalisateurs</h3>

                    <?php
                        $stmt_realisateurs = $db->prepare("SELECT r.nom_realisateurs, r.prenom_realisateurs, i.lien_images_realisateurs
                        FROM realiser rs 
                        INNER JOIN realisateurs r ON r.Id_realisateurs = rs.Id_realisateurs 
                        LEFT JOIN images_realisateurs i ON i.Id_realisateurs = r.Id_realisateurs
                        WHERE rs.Id_films = ?");
                        $stmt_realisateurs->execute([$id_films]);
                        $realisateurs = $stmt_realisateurs->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <p>
                        <?php foreach ($realisateurs as $realisateur) {
                                echo '<div class="realisateur">';
                                echo '<img src="' . $realisateur['lien_images_realisateurs'] . '">';
                                echo '<p>' . $realisateur['nom_realisateurs'] . ' ' . $realisateur['prenom_realisateurs'] . '</p>';
                                echo '</div>';
                            }
                        ?>
                    </p>
            </div>       

            <!-- Acteurs ------------------>

            <div class="pic_rea">
                        
                <h3>Acteurs</h3>
                <div class="acteurs">

                <?php
                    $stmt_acteurs = $db->prepare("SELECT a.nom_acteurs, a.prenom_acteurs, i.lien_images_acteurs
                                                FROM jouer j INNER JOIN acteurs a ON a.Id_acteurs = j.Id_acteurs LEFT JOIN images_acteurs i ON i.Id_acteurs = a.Id_acteurs WHERE j.Id_films = ?");
                    $stmt_acteurs->execute([$id_films]);
                    $acteurs = $stmt_acteurs->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($acteurs as $acteur) {
                        echo '<div class="acteur">';
                        echo '<img src="' . $acteur['lien_images_acteurs'] . '" alt="' . $acteur['nom_acteurs'] . ' ' . $acteur['prenom_acteurs'] . '">';
                        echo '<p>' . $acteur['nom_acteurs'] . ' ' . $acteur['prenom_acteurs'] . '</p>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>






        </div>
    </div>
</section>


<!-- <footer> -->

<?php 

include('footer.php');
?>




</body>
</html>

