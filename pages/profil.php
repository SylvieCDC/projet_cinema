<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/messerror.css">
    <title>Profil</title>
</head>
<body id="profil">

<!-- <nav> -->
<?php 

include("nav.php");
?>

    <section class="content">
        <h1>Qui est-ce ?</h1>
        <div class="row">
            <div class="profil">
                <a href="../index.php">
                    <img src="../assets/images/avatars/avatar-1.png" alt="">
                    <p class="pseudo">Lorem</p>
                </a>
            </div>
            <div class="profil">
                <a href="">
                    <img src="../assets/images/avatars/avatar-2.png" alt="">
                    <p class="pseudo">Ipsum</p>
                </a>
            </div>
            <div class="profil">
                <a href="">
                    <img src="../assets/images/avatars/avatar-3.png" alt="">
                    <p class="pseudo">Dolor </p>
                </a>
            </div>
            <div class="profil">
                <a href="">
                    <img src="../assets/images/avatars/avatar-4.png" alt="">
                    <p class="pseudo">Adipisicing</p>
                </a>
            </div>
            <div class="profil">
                <a href="">
                    <img src="../assets/images/avatars/avatar_corbeau.jpg" alt="">
                    <p class="pseudo">Optio</p>
                </a>
            </div>

        </div>
        <div class="row">
            <a class="btn-profil" href="../pages/gestion_profil.php">Gérer les profils</a>
        </div>
    </section>

</body>
</html>