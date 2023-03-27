<?php
session_start();
include 'connx.php';

?>

<!-- <div class="contenu">

    <main class="accueil">

      <div class="mess_erreur"> -->


<?php

$email = htmlspecialchars($_POST['email']);
$motdepasse = htmlspecialchars($_POST['mot_de_passe']);


if (isset($email, $motdepasse) && !empty($email) && !empty($motdepasse)) 
{ 
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
 // echo "c'est une adresse mail";

    $sql = "SELECT * FROM utilisateurs WHERE email_utilisateurs = :email_utilisateurs";  
    $stmt = $db->prepare($sql);
    $stmt->execute(['email_utilisateurs' => $email]);
    $utilisateur = $stmt->fetch();
    $utilisateurcount = $stmt->rowCount();

    if ($utilisateurcount == 0){
        echo "L'utisateur n'existe pas ";
    }
    else {
        if (password_verify($motdepasse, $utilisateur["mot_de_passe_utilisateurs"])) {
            // Création de la session utilisateur
            $_SESSION["id_utilisateurs"] = $utilisateur["Id_utilisateurs"];
            $_SESSION["pseudo"] = $utilisateur["pseudo_utilisateurs"];
            $_SESSION["avatar"] = $utilisateur["Id_images_profil"];

            header("location:../pages/profil.php");
        

    }else{
        echo"<div class='mess_inscription'>Email ou mot de passe incorrect.<br>
        <a href='./login.php' class='inscription_lien'>Je me connecte</a></div>";
    }
    }

    }
    else {
        echo"<div class='mess_inscription'>Ce n'est pas une adresse mail valide<br>
        <a href='./login.php' class='inscription_lien'>Je me connecte</a></div>";
    }

}
else {
    echo"<div class='mess_inscription'>Merci de remplir tous les champs<br>
    <a href='./login.php' class='inscription_lien'>Je me connecte</a></div>";
}


?>

<!-- </div>

</main>

</div> -->