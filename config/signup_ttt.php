<?php
session_start();
include 'connx.php';
?>


<!-- <div class="contenu">

    <main class="accueil">

      <div class="mess_erreur">
 -->

<?php
$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$pseudo=htmlspecialchars($_POST['pseudo']);
$email=htmlspecialchars($_POST['email']);
$motdepasse=htmlspecialchars($_POST['mot_de_passe']);
$mdpverif= htmlspecialchars($_POST['motdepasseverif']);

// tu verifies que tout est plein et rien n'est vide

if (isset($nom, $prenom, $pseudo, $email, $motdepasse, $mdpverif) && !empty($nom) && !empty($prenom) && !empty($pseudo) && !empty($email) && !empty($motdepasse) && !empty($mdpverif))
{
      // ici on verifie que c'est une vrai adresse mail
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {


            $sql = "SELECT * FROM utilisateurs WHERE email_utilisateurs = :email_utilisateurs";
            $stmt = $db->prepare($sql);
            $stmt->execute(['email_utilisateurs' => $email]);
            $resultats = $stmt->fetch();
            $rowCount = $stmt->rowCount(); // nombre de lignes affectées
            if ($rowCount == 0) {

                  // ici on verifie que les 2 mots de pass sont identitques
                  if ($motdepasse == $mdpverif)
                  {
                        // Hashage du mot de passe
                        $hashed_motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);
                        $inscription = $db->prepare('INSERT INTO utilisateurs(nom_utilisateurs, prenom_utilisateurs, pseudo_utilisateurs, email_utilisateurs, mot_de_passe_utilisateurs, inscription_date,Id_images_profil, Id_roles) VALUES(:nom, :prenom, :pseudo, :email, :mot_de_passe, :date_ins, 1, 2)');
                        $inscription->execute(array(
                        ':nom' => $nom,
                        ':prenom' => $prenom,
                        ':pseudo'=> $pseudo,
                        ':email' => $email,
                        ':mot_de_passe' => $hashed_motdepasse,
                        ':date_ins' => date('Y-m-d G:i:s', time()+3600)
                       
                        ));

                        echo"<div class='mess_inscription'>Félicitation votre compte est crée vous pouvez vous connecter.<br>
                        <a href='../pages/login.php' class='inscription_lien'>Je me connecte</a></div>";

                  }
                  else {
                        echo "<div class='mess_inscription'>les mots de pass ne correspondent pas
                        <br>
                        <a href='../pages/signup.php' class='inscription_lien'>Je m'inscris</a>
                        </div>";
                  }
            }
            else {
                  echo "<div class='mess_inscription'>L'adresse mail existe déjà<br>
                  <a href='../pages/login.php' class='inscription_lien'>Je me connecte</a>
                  </div>";
            }
      }
      else {
            echo "<div class='mess_inscription'>L'adresse mail n'est pas valide<br>
            <a href='../pages/signup.php' class='inscription_lien'>Je minscris</a></div>";
      }
}
else{
      echo"<div class='mess_inscription'>Merci de remplir tous les champs<br>
      <a href='../pages/signup.php' class='inscription_lien'>Je minscris</a></div>";
}

?>
<!-- </div>

</main>

</div> -->