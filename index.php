<?php
session_start();
require 'config/connx.php';


$stmt = $db-> prepare ("SELECT * FROM films ");
$stmt-> execute();
$films = $stmt -> fetch();



$id_films = $films["Id_films"];
$titre = $films["titre_films"];
$annee = $films["annee_films"];
$synopsis = $films["synopsis_films"];
$affiche = $films["affiche_films"];
$lien_teaser = $films["teaser_films"];
$teaser = str_replace("watch?v=", "embed/", $lien_teaser);
$teaser = explode("&", $teaser)[0];
$lien_video = $films["video_films"];
$video = str_replace("watch?v=", "embed/", $lien_video);
$video = explode("&", $video)[0];



// $stmt = $db-> prepare("SELECT * FROM films f, genres g, avoir a WHERE a.Id_films = f.Id_films ANd a.Id_genres = g.Id_genres");
// $stmt-> execute ();

// transformer le lien yt en lien à ajouter à la base de donnée

// $youtube_url = "https://www.youtube.com/watch?v=0ULjL4cbSro";
// $youtube_embed_url = str_replace("watch?v=", "embed/", $youtube_url);
// $youtube_embed_url = explode("&", $youtube_embed_url)[0];

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
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />

    <!-- FontAwesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
    

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/sliderAccueil.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    

    <title>CinéFlix Accueil</title>
   


</head>
<body id="films">

    <!-- <nav> -->
        <?php 

        include('pages/nav.php');
       
        ?>

    <!-- intégrer une vidéo -->
<header>


    
    <figure id="video">
        
    <iframe width="100%" height="780px" src="https://www.youtube.com/embed/SGMZhdNdxM4?autoplay=1&loop=1&autopause=0"  ></iframe>
        <div class="overlay"></div>
        <div class="figcaption">
    
            <h2>La Casa <span class="spantitre">de</span> papel</h2>
            <div class="btn_film">
                <a class="lecture" href="<?php echo $video;?>"><i class="fa-sharp fa-solid fa-play"></i>Vidéo</a>
                <a class="infos" href="/projet_cinema/pages/filmtest.php?id=<?php echo $id_films ?>"><i class="fa-solid fa-circle-info"></i>Plus d'infos</a>
            </div>
            
        </div>


    
    </figure>  
</header> 

<section class="slider">
  <button class="slider__control prev"><i class="fa-solid fa-chevron-left"></i></button>
  <button class="slider__control next"><i class="fa-solid fa-chevron-right"></i></button>
  <div class="slider__container" data-multislide="true" data-step="4">

  
    
    <?php



// Récupération des données de la table films
$sql_films = "SELECT * FROM films";
$stmt_films = $db->prepare($sql_films);
$stmt_films->execute();
$films = $stmt_films->fetchAll(PDO::FETCH_ASSOC);

// Récupération des données de la table genres
$sql_genres = "SELECT * FROM genres";
$stmt_genres = $db->prepare($sql_genres);
$stmt_genres->execute();
$genres = $stmt_genres->fetchAll(PDO::FETCH_ASSOC);



// Boucle pour afficher les films avec leurs genres
foreach ($films as $film) {
  echo '<div class="slider__item">';
  echo '<div class="image_item">';
  echo '<img src="' . $film['affiche_films'] . '" alt="affiche_films" width="100%">';
  echo '</div>';
  echo '<div class="video_content">';
  echo '<div class="video#">';
  echo '<img src="' . $film['affiche_films'] . '" alt="affiche_films" width="100%">';
  echo '</div>';
  echo '<div class="icons">';
  echo '<a href="' . $film['video_films'] . '"><i class="fa-solid fa-play"></i></a>';
  echo '<a href=""><i class="fa-solid fa-plus"></i></a>';
  echo '<a href=""><i class="fa-regular fa-heart"></i></a>';
  echo '<a href="/projet_cinema/pages/filmtest.php?id=' . $film['Id_films'] . '"><i class="fa-solid fa-chevron-down"></i></a>';
  echo '</div>';
  echo '<div class="rating">';
  echo '<span class="note">Recommandé à 87%</span>';
  echo '<div class="genre">';
  foreach ($genres as $genre) {
      $sql_avoir = "SELECT * FROM AVOIR WHERE Id_films = :id_films AND Id_genres = :id_genres";
      $stmt_avoir = $db->prepare($sql_avoir);
      $stmt_avoir->bindParam(":id_films", $film['Id_films']);
      $stmt_avoir->bindParam(":id_genres", $genre['Id_genres']);
      $stmt_avoir->execute();
      $avoir = $stmt_avoir->fetch(PDO::FETCH_ASSOC);
      if ($avoir) {
          echo $genre['nom_genres'] . ' ';
 
      }
  }
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}
?>


<div class="slider__item">
      <div class="image_item">
          <img src="<?php echo $affiche;?>" alt="affiche_films" width="100%">
      </div>
      
      <div class="video_content">
        <div class="video#">
            <figure id="video#">
                <video autoplay muted>
                <source src="<?php echo $teaser;?>" type="video/mp4">
                </video> 
            </figure>  
        </div>
        <div class="icons">
            <a href="<?php echo $video;?>"><i class="fa-solid fa-play"></i></a>
            <a href=""><i class="fa-solid fa-plus"></i></a>
            <a href=""><i class="fa-regular fa-heart"></i></a>
            <a href="/projet_cinema/pages/filmtest.php?id=<?php echo $id_films ?>"><i class="fa-solid fa-chevron-down"></i></a>
        </div>
        <div class="rating">
            <span class="note">Recommandé à 87%</span>
            <div class="genre"><?php echo $genre['Id_genres'] ?></div>
        </div>
      </div>
    </div>
   
  </div>
</section>





<!-- <footer> -->

    <?php 

    include('./pages/footer.php');
    ?>

<!-- script js -->

<script>
   const sliders = [...document.querySelectorAll(".slider__container")];
const sliderControlPrev = [...document.querySelectorAll(".slider__control.prev")];
const sliderControlNext = [...document.querySelectorAll(".slider__control.next")];

sliders.forEach((slider, i) => {
  let isDragStart = false,
      isDragging = false,
      isSlide = false,
      prevPageX,
      prevScrollLeft,
      positionDiff;

  const sliderItem = slider.querySelector(".slider__item");
  var isMultislide = (slider.dataset.multislide === 'true');

  sliderControlPrev[i].addEventListener('click', () => {
    if (isSlide) return;
    isSlide = true;
    let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth;
    slider.scrollLeft += -slideWidth;
    setTimeout(function(){ isSlide = false; }, 700);
  });

  sliderControlNext[i].addEventListener('click', () => {
    if (isSlide) return;
    isSlide = true;
    let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth ;
    slider.scrollLeft += slideWidth;
    setTimeout(function(){ isSlide = false; }, 700);
  });

  function autoSlide() {
    if(slider.scrollLeft - (slider.scrollWidth - slider.clientWidth) > -1 || slider.scrollLeft <= 0) return;
    positionDiff = Math.abs(positionDiff);
    let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth;
    let valDifference = slideWidth - positionDiff;
    if(slider.scrollLeft > prevScrollLeft) {
        return slider.scrollLeft += positionDiff > slideWidth / 5 ? valDifference : -positionDiff;
    }
    slider.scrollLeft -= positionDiff > slideWidth / 5 ? valDifference : -positionDiff;
  }

  function dragStart(e) {
    if (isSlide) return;
    isSlide = true;
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = slider.scrollLeft;
    setTimeout(function(){ isSlide = false; }, 700);
  }

  function dragging(e) {
    if(!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    slider.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    slider.scrollLeft = prevScrollLeft - positionDiff;
  }

  function dragStop() {
    isDragStart = false;
    slider.classList.remove("dragging");
    if(!isDragging) return;
    isDragging = false;
    autoSlide();
  }

  addEventListener("resize", autoSlide);
  slider.addEventListener("mousedown", dragStart);
  slider.addEventListener("touchstart", dragStart);
  slider.addEventListener("mousemove", dragging);
  slider.addEventListener("touchmove", dragging);
  slider.addEventListener("mouseup", dragStop);
  slider.addEventListener("touchend", dragStop);
  slider.addEventListener("mouseleave", dragStop);
});

 
</script>
</body>
</html>