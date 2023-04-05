<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cinéflix - Compte</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="../assets/css/compte.css" />
    <link rel="stylesheet" href="../assets/css/nav.css">
  </head>
  <body>
    <div class="container p-5">
        <div class="d-inline-flex">
      <h3>Compte</h3><strong class="titreMembre">Membre depuis janvier 2020</strong></div>
      <hr />
      <div class="row">
        <div class="col-md-4">
          <h6 class="text-muted">ABONNEMENT ET FACTURATION</h6>
          <button class="btn btn-secondary abonnement">Annuler l'abonnement</button>
        </div>
        <div class="col-md-8">
          <div class="d-flex align-items-center justify-content-between">
            <strong>user@email.com</strong>
            <a href="">Modifier l'adresse e-mail</a>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <span>Mot de passe : ********</span>
            <a href="">Modifier le mot de passe</a>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <span>Téléphone : 12 34 56 78</span>
            <a href="">Modifier le numéro de téléphone</a>
          </div>
          <hr />
          <div class="d-flex align-items-start justify-content-between paypal-container">
            <div class="d-flex align-items-center justify-content-between">
            <span><i class="fa-brands fa-paypal"></i>
              <strong>user@email.com</strong></br>
              Prochaine date de facturation : 05 juin 2023.</span>
            </div>

            <div class="d-flex flex-column align-items-end justify-content-between">
              <a href="">Gérer les informations de paiement</a>
              <a href="">Ajouter un mode de paiement secondaire</a>
              <a href="">Détails de facturation</a>
              <a href="">Modifier le jour de facturation</a>
            </div>
          </div>
          <hr />
          <div class="d-flex flex-column align-items-end">
            <a href="">Utiliser une carte cadeau ou un code de promotion</a>
            <a href="">Où acheter les cartes cadeaux?</a>
          </div>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-md-4">
          <h6 class="text-muted">DÉTAILS DU FORFAIT</h6>
        </div>
        <div class="col-md-8">
          <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
              <strong>Premium</strong>
              <button class="btn btn-outline-secondary py-1 list-group-item disabled" aria-disabled="true">
                ULTRA <strong>HD</strong>
              </button>
            </div>
            <a href="">Changer de forfait</a>
          </div>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-md-4">
          <h6 class="text-muted">SÉCURITÉ ET CONFIDENTIALITÉ</h6>
        </div>
        <div class="col-md-8">
          <div class="d-flex align-items-center justify-content-between">
          <span class="group">Contrôlez l'accès à ce compte, consultez la liste des appareils les plus récemment actifs, et plus encore.</span> 
          <div class="d-flex flex-column justify-content-between align-items-end ">
            <a href="">Gérer les accès et les appareils</a>
            <a href="">Se déconnecter de tous les appareils</a>
            <a href="">Télécharger vos données personnelles</a>
          </div>
          </div>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-md-4">
          <h6 class="text-muted">PROFILS ET CONTRÔLE PARENTAL</h6>
        </div>
        <div class="col-md-8">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
            <div class="d-flex flex-column align-items-end">
              <img src="../assets/images/avatars/avatar_corbeau.jpg" alt="" height="100px" />
              <strong class="pseudos">Optio</strong>
              <img src="../assets/images/avatars/avatar-1.png" alt="" height="100px" />
              <strong class="pseudos">Lorem</strong>
              <img src="../assets/images/avatars/avatar-2.png" alt="" height="100px" />
              <strong class="pseudos">Ipsum</strong>
              <img src="../assets/images/avatars/avatar-3.png" alt="" height="100px" />
              <strong class="pseudos">Dolor</strong>
              <img src="../assets/images/avatars/avatar-4.png" alt="" height="100px" />
              <strong class="pseudos">Adipisicing</strong>
            </div>
            </div>
            <div class="d-flex flex-column align-items-end ">
                <a href="gestion_profil.php">Gérer les profils</a>
                <a href="">Langue</a>
                <a href="">Historique</a>
                <a href="">Paramètres de lecture</a>
                <a href="">Évaluations</a>
                <a href="">Affichage des sous-titres</a>
            </div>
          </div>
          
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-md-4">
          <h6 class="text-muted">PARAMETRES</h6>
        </div>
        <div class="col-md-8">

          <div class="d-flex flex-column justify-content-between align-items-end ">
            <a href="">Activer le transfert de profil</a>
            <a href="">Participation à des tests</a>
            <a href="">Gérer les appareils autorisés pour le téléchargement</a>
          </div>
          </div>
       
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
