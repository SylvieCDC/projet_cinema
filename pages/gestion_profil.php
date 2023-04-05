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
    <link rel="stylesheet" href="../assets/css/nav.css">
    <title>Profil</title>
</head>
<body id="profil">

<!-- <nav> -->
<?php 

include("nav.php");
?>

    <section class="content">
        <h1>Quel profil voulez-vous modifier?</h1>
        <div class="row_gestion_profil">
            <div class="profil">
                <a href="/projet_cinema/pages/modifier_profil.php">
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
        
    </section>

</body>
</html>