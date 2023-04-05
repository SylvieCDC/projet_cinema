<?php

///// Fonction pour la connexion //////

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "cineflixbdd");

/**
 * Retourne une connexion à la base de données.
 *
 * @return PDO La connexion à la base de données.
 */
function getDatabaseConnexion(){
    $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

    try {
        $db = new PDO($dsn, DBUSER, DBPASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES utf8");

        return $db;
    } catch (PDOException $e) {
        throw new Exception("Impossible de se connecter à la base de données : " . $e->getMessage());
    }
}


////////////////////////////////////////////////////////////////////////////////
///////////////////////// FILMS ///////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

//////// récupère tous les films ///////////////////////////////

/**
 * Retourne tous les films.
 *
 * @return array Les films.
 */
function getAllFilms(){
    $db = getDatabaseConnexion();

    $stmt = $db->prepare('SELECT * FROM films');
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//////// récupère un film ///////////////////////////////

/**
 * Retourne le film correspondant à l'ID donné.
 *
 * @param int $id_films L'ID du film
 * @return array|null Le film ou null si le film n'existe pas 
 */
function readFilm($id_films){
    $db = getDatabaseConnexion();

    $req = 'SELECT * FROM films WHERE Id_films = :id';
    $stmt = $db->prepare($req);
    $stmt->execute(['id' => $id_films]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//////// Créer film ///////////////////////////////


function createFilm($titre, $annee, $synopsis, $affiche, $teaser, $video) {
    $db = getDatabaseConnexion();

    // nettoie et valide les données d'entrée
    $titre = filter_var($titre, FILTER_SANITIZE_STRING);
    $annee = filter_var($annee, FILTER_SANITIZE_STRING);
    $synopsis = filter_var($synopsis, FILTER_SANITIZE_STRING);
    $affiche = filter_var($affiche, FILTER_SANITIZE_STRING);
    $teaser = filter_var($teaser, FILTER_SANITIZE_STRING);
    $video = filter_var($video, FILTER_SANITIZE_STRING);

    // prépare la requête SQL avec des paramètres nommés
    $stmt = $db->prepare("INSERT INTO films (titre_films, annee_films, synopsis_films, affiche_films, teaser_films, video_films) 
                          VALUES (:titre, :annee, :synopsis, :affiche, :teaser, :video)");

    // lie les valeurs des paramètres à la requête préparée
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':annee', $annee);
    $stmt->bindParam(':synopsis', $synopsis);
    $stmt->bindParam(':affiche', $affiche);
    $stmt->bindParam(':teaser', $teaser);
    $stmt->bindParam(':video', $video);

    // exécute la requête préparée
    $stmt->execute();
}



//////// met à jour un film ///////////////////////////////


function updateFilm ( $id_films, $titre, $annee, $synopsis, $affiche, $teaser, $video) {
    $db = getDatabaseConnexion();

    // nettoie et valide les données d'entrée
    $id_films = filter_var($id_films, FILTER_SANITIZE_NUMBER_INT);
    $titre = filter_var($titre, FILTER_SANITIZE_STRING);
    $annee = filter_var($annee, FILTER_SANITIZE_STRING);
    $synopsis = filter_var($synopsis, FILTER_SANITIZE_STRING);
    $affiche = filter_var($affiche, FILTER_SANITIZE_STRING);
    $teaser = filter_var($teaser, FILTER_SANITIZE_STRING);
    $video = filter_var($video, FILTER_SANITIZE_STRING);

    // prépare la requête SQL avec des paramètres nommés
    $stmt = $db->prepare("UPDATE films SET titre_films=:titre, annee_films=:annee, synopsis_films=:synopsis, affiche_films=:affiche, teaser_films=:teaser, video_films=:video WHERE Id_films=:id");

    // lie les valeurs des paramètres à la requête préparée
    $stmt->bindParam(':id', $id_films, PDO::PARAM_INT);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':annee', $annee);
    $stmt->bindParam(':synopsis', $synopsis);
    $stmt->bindParam(':affiche', $affiche);
    $stmt->bindParam(':teaser', $teaser);
    $stmt->bindParam(':video', $video);

    // exécute la requête préparée
    $stmt->execute();
}


//////// suprime un film ///////////////////////////////

function deleteFilm($id_films){
    $db = getDatabaseConnexion();

    try {
        $db->beginTransaction();

        // Supprime toutes les lignes correspondantes dans la table `avoir`
        $stmt = $db->prepare('DELETE FROM avoir WHERE Id_films = :id');
        $stmt->execute(['id' => $id_films]);

        // Supprime la ligne correspondante dans la table `films`
        $stmt = $db->prepare('DELETE FROM films WHERE Id_films = :id');
        $stmt->execute(['id' => $id_films]);

        $db->commit();
    } catch (PDOException $e) {
        $db->rollBack();
        throw $e;
    }
}


//////// Créer un nouvel film ///////////////////////////////

function getNewfilm() {
    $film['Id_films'] = "";
    $film['titre_films'] = "";
    $film['annee_films'] = "";
    $film['synopsis_films'] = "";
    $film['affiche_films'] = "";
    $film['teaser_films'] = "";
    $film['video_films'] = "";
    
}

?>