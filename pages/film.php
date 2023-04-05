<?php
session_start();
require '../config/connx.php';


// Récupération de l'ID du film depuis l'URL
if (!isset($_GET['Id_films'])) {
    echo "L'ID du film n'a pas été spécifié.";
    exit;
}
$id_film = $_GET['Id_films'];

// Requête SQL pour sélectionner les informations du film avec l'ID 1
$sql = "SELECT * FROM films WHERE Id_films = 1";


// Récupération des informations du film depuis la base de données
$stmt = $db->prepare('SELECT f.*, GROUP_CONCAT(DISTINCT g.nom_genres SEPARATOR ", ") AS genres, GROUP_CONCAT(DISTINCT p.nom_pays SEPARATOR ", ") AS pays, GROUP_CONCAT(DISTINCT CONCAT(a.prenom_acteurs, " ", a.nom_acteurs) SEPARATOR ", ") AS acteurs, GROUP_CONCAT(DISTINCT CONCAT(r.prenom_realisateurs, " ", r.nom_realisateurs) SEPARATOR ", ") AS realisateurs FROM films f INNER JOIN AVOIR ag ON ag.Id_films = f.Id_films INNER JOIN genres g ON g.Id_genres = ag.Id_genres INNER JOIN VENIR vp ON vp.Id_films = f.Id_films INNER JOIN pays p ON p.Id_pays = vp.Id_pays INNER JOIN JOUER j ON j.Id_films = f.Id_films INNER JOIN acteurs a ON a.Id_acteurs = j.Id_acteurs INNER JOIN REALISER rl ON rl.Id_films = f.Id_films INNER JOIN realisateurs r ON r.Id_realisateurs = rl.Id_realisateurs WHERE f.Id_films = :id_film');
$stmt->bindParam(':id_film', $id_film, PDO::PARAM_INT);
$stmt->execute();
$films = $stmt->fetch(PDO::FETCH_ASSOC);

// Récupération des données de la table genres
$sql_genres = "SELECT * FROM genres";
$stmt_genres = $db->prepare($sql_genres);
$stmt_genres->execute();
$genres = $stmt_genres->fetchAll(PDO::FETCH_ASSOC);

// Vérification si le film a été trouvé dans la base de données
if (!$films) {
    echo "Le film demandé n'a pas été trouvé.";
    exit;
}

// Affichage des informations du film
echo '<h1>' . $films['titre_films'] . '</h1>';
echo '<p>Sortie le ' . $films['annes_films'] . ' - ' . $films['genres'] . ' - ' . $films['pays'] . '</p>';
echo '<p>Réalisé par ' . $films['realisateurs'] . '</p>';
echo '<p>Avec ' . $films['acteurs'] . '</p>';
echo '<p>' . $films['synopsis_films'] . '</p>';
echo '<video src="' . $films['video_films'] . '" controls></video>';

echo '<p><a href="' . $films['video_films'] . '">Voir le teaser</a></p>';
?>
