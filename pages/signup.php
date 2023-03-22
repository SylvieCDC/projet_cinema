<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>CinéFlix Accueil</title>


</head>
<body id="home">

<!-- <nav> -->
<?php 

include('nav.php');
?>
   
    <div class="content">
        <div class="row">
            <form action="#" method="post">
                <h2>Créer un compte</h2>
                <input type="text" name="nom" id="nom" placeholder="Nom">
                <input type="text" name="prenom" id="prenom" placeholder="Prénom">
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
                <input type="email" name="email" id="email" placeholder="Entrer votre email">
                <input type="password" name="password" id="password" placeholder="Mot de passe">
                <input type="password" name="password" id="password" placeholder="Confirmer mot de passe">
                <input type="submit" value="Enregister">
                <div class="checkbox">
                    <input type="checkbox" name="save" id="save">
                    <label for="save">Se souvenir de moi</label>
                </div>
                <div class="direction">
                    Déjà un compte? <a href="login.php">Se connecter</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>