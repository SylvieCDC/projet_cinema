<?php
session_start();

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/compte.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    
    <title>Cinéflix - Modifier Profil</title>
    <style>
        body{
            background-color: #141414 ;
        }
        #logo{
            width: 150px;
        }
        .maincard{
            padding-top: 7%;
        }
       


    </style>
  </head>
  <body>
    <div class=" container ">
        <img src="../assets/images/logo.png" alt="logo" id="logo">
    </div>
    <div class="container maincard">
        <h1 class="text-white">Modifier le profil</h1>
        <hr class="text-white">
        <div class="row">
            <div class="col-2 text-center"><img src="../assets/images/avatars/avatar-1.png" class="   " alt="avatar" id="avatar"></div>
            <div class="col-10 text-white ">
            <p class="text-white">Pseudo</p>
                <input type="text" class='bg-secondary text-light border-light' placeholder="Lorem">
            <p class="text-white mt-3">Langue</p>
                    
                    <!-- <label for="language">Language</label> -->
                    <select id="language" class="custom-select text-white bg-dark ">
                        <!-- <option selected>Open this select menu</option> -->
                        <option value="1">Français</option>
                        <option value="2">Spanish</option>
                        <option value="3">English</option>
                      </select>
                </div>
                <div class="col-2"></div>
                <div class="col-10">
                    
                      <hr class="text-white">
                    
                      <p class="text-white">Catégory d'âge:</p>
                      <p class="text-light bg-secondary border btn">Tous les âges</p>
                      <p class="text-white"><strong> Proposer les titres pour tous les âges à ce profil.</strong></p>
                      <div class="btn border border-secondary"><a href=""> Modifier</a></div>
                      <hr class="text-white">
                      <p class="text-light">Commandes de lecture automatique</p>
                      <input type="checkbox" id="ch[]" name="check" value="check">
                      <label for="vehicle1" class="text-light"> Lecture automatique de l'épisode sur tous les appareils</label><br>
                      <input type="checkbox" id="ch[]" name="check" value="check">
                      <label for="vehicle2" class="text-light"> Lecture automatique des aperçus pendant la navigation sur tous les appareils</label><br>
                    <br>
                    </div>
                    <br>
                    <hr class="text-white">
                    <div class="row"><div class="col d-flex justify-content-start btn">
                        <button class="bg-light text-dark border-light ">Enregistrer</button>
                        </div>
                        <div class="col d-flex justify-content-start btn ">
                        <button class="bg-dark text-light border-light">Annuler</button>
                        </div>
                        <div class="col d-flex justify-content-end btn">
                        <button class="bg-dark text-light border-light">Supprimer le profil</button>
                    </div>
                    <br>
                    </div>
          </div>


    </div>

     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html> 
 <!--  -->