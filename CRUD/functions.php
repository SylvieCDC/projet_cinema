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

///////////////////////// USERS ///////////////////////////////////////////////

//////// récupère tous les users ///////////////////////////////

/**
 * Retourne tous les utilisateurs.
 *
 * @return array Les utilisateurs.
 */
function getAllUsers(){
    $db = getDatabaseConnexion();

    $stmt = $db->prepare('SELECT * FROM utilisateurs');
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//////// récupère un user ///////////////////////////////

/**
 * Retourne l'utilisateur correspondant à l'ID donné.
 *
 * @param int $id L'ID de l'utilisateur.
 * @return array|null L'utilisateur ou null si l'utilisateur n'existe pas.
 */
function readUser($id){
    $db = getDatabaseConnexion();

    $req = 'SELECT * FROM utilisateurs WHERE Id_utilisateurs = :id';
    $stmt = $db->prepare($req);
    $stmt->execute(['id' => $id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//////// Créer un user ///////////////////////////////

function createUser($nom, $prenom, $pseudo, $email, $mot_de_passe) {
    $db = getDatabaseConnexion();

    // nettoie et valide les données d'entrée
    $nom = filter_var($nom, FILTER_SANITIZE_STRING);
    $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
    $pseudo = filter_var($pseudo, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    // prépare la requête SQL avec des paramètres nommés
    $inscription_date = date('Y-m-d G:i:s', time()+3600);
    $stmt = $db->prepare("INSERT INTO utilisateurs (nom_utilisateurs, prenom_utilisateurs, pseudo_utilisateurs, email_utilisateurs, mot_de_passe_utilisateurs, inscription_date, Id_images_profil, Id_roles) VALUES (:nom, :prenom, :pseudo, :email, :hash, :inscription_date, 1, 1)");

    // lie les valeurs des paramètres à la requête préparée
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':hash', $hash);
    $stmt->bindParam(':inscription_date', $inscription_date);

    // exécute la requête préparée
    $stmt->execute();
}





//////// Récupérer un user par email ///////////////////////////////

function getUserByEmail($email) {
    $db = getDatabaseConnexion();
    $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE email_utilisateurs = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    $db->close();
    return $user;
}

//////// Vérifier le mot de passe avec l'user ///////////////////////////////

function authenticateUser($email, $mot_de_passe) {
    $user = getUserByEmail($email);
    if (!$user) {
        return false;
    }
    return password_verify($mot_de_passe, $user['mot_de_passe_utilisateurs']);
}


//////// met à jour un user ///////////////////////////////


function updateUser($id, $nom, $prenom, $pseudo, $email, $mot_de_passe) {
    $db = getDatabaseConnexion();

    // nettoie et valide les données d'entrée
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $nom = filter_var($nom, FILTER_SANITIZE_STRING);
    $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
    $pseudo = filter_var($pseudo, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    // prépare la requête SQL avec des paramètres nommés
    $stmt = $db->prepare("UPDATE utilisateurs SET nom_utilisateurs=:nom, prenom_utilisateurs=:prenom, pseudo_utilisateurs=:pseudo, email_utilisateurs=:email, mot_de_passe_utilisateurs=:mot_de_passe WHERE Id_utilisateurs=:id");

    // lie les valeurs des paramètres à la requête préparée
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_de_passe', $hash);

    // exécute la requête préparée
    $stmt->execute();
}


//////// suprime un user ///////////////////////////////

function deleteUser($id){
    $db = getDatabaseConnexion();

    // prépare la requête SQL avec des paramètres nommés
    $stmt = $db->prepare("DELETE FROM utilisateurs WHERE Id_utilisateurs = :id");

    // nettoie et valide les données d'entrée
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    // lie la valeur du paramètre à la requête préparée
    $stmt->bindParam(':id', $id);

    // exécute la requête préparée
    $stmt->execute();
}

//////// Créer un nouvel user ///////////////////////////////

function getNewUser() {
    $user['Id_utilisateurs'] = "";
    $user['nom_utilisateurs'] = "";
    $user['prenom_utilisateurs'] = "";
    $user['pseudo_utilisateurs'] = "";
    $user['email_utilisateurs'] = "";
    $user['mot_de_passe_utilisateurs'] = "";
    
}


