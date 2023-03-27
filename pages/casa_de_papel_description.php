<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/messerror.css">
    

    <title>CinéFlix Accueil</title>


</head>
<body id="films">


<!-- <nav> -->
    <?php 

    include('nav.php');
    ?>
    
<section class="conteneur">

    <div class="row">

        <div class="video">
        <video autoplay muted>
        <source src="../assets/videos/casa-de-papel.mp4" type="video/mp4">
        </video>
    

        </div>
        <div class="description">
            <p>  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum vel ducimus aliquam labore, saepe harum, numquam natus atque, totam autem deleniti suscipit voluptate! Laudantium, suscipit cum. Atque, beatae tenetur! Delectus.
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum vel ducimus aliquam labore, saepe harum, numquam natus atque, totam autem deleniti suscipit voluptate! Laudantium, suscipit cum. Atque, beatae tenetur! Delectus.
            </p>
            <a class="lecture" href="/projet_cinema/pages/casa_de_papel_video.php"><i class="fa-sharp fa-solid fa-play"></i>Voir le film</a>
                    <a class="infos "href="#"><i class="fa-solid fa-circle-info"></i>Plus d'infos</a>
                
        </div>
    </div>

    <div class="casting">
        <div class="cast">
            <div class="pic_rea">
                <h3>Réalisateur</h3>
                <img src="../assets/images/acteurs_realisateurs/William_Mapother.jpg" alt="">
            </div>
            <div class="pic_rea">
                <h3>Acteur</h3>
                <img src="../assets/images/acteurs_realisateurs/William_Mapother.jpg" alt="">
            </div>
            <div class="pic_rea">
                <h3>Acteur</h3>
                <img src="../assets/images/acteurs_realisateurs/William_Mapother.jpg" alt="">
            </div>
            <div class="pic_rea">
                <h3>Acteur</h3>
                <img src="../assets/images/acteurs_realisateurs/William_Mapother.jpg" alt="">
            </div>
        </div>
    </div>
</section>


<!-- <footer> -->

<?php 

include('footer.php');
?>


</body>
</html>

