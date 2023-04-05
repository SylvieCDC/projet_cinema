<?php
session_start();
require '../config/connx.php';





// Récupération des données de la table films
$sql_films = "SELECT * FROM films ORDER BY Id_films DESC
LIMIT 8";
$stmt_films = $db->prepare($sql_films);
$stmt_films->execute();
$films = $stmt_films->fetchAll(PDO::FETCH_ASSOC);

// Récupération des données de la table genres
$sql_genres = "SELECT * FROM genres";
$stmt_genres = $db->prepare($sql_genres);
$stmt_genres->execute();
$genres = $stmt_genres->fetchAll(PDO::FETCH_ASSOC);


// $stmt = $db-> prepare("SELECT * FROM films f, genres g, avoir a WHERE a.Id_films = f.Id_films ANd a.Id_genres = g.Id_genres");
// $stmt-> execute ();

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
    <link rel="stylesheet" href="../assets/css/sliderAccueil.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    

    <title>CinéFlix films</title>
</head>

<body id="films">

<!-- <nav> -->
<?php 

include('nav.php');
?>

<!-- liste de films -->

<div class="catalogue">
    
    <h1>Tendances</h1>
    <section class="slider">
  <button class="slider__control prev"><i class="fa-solid fa-chevron-left"></i></button>
  <button class="slider__control next"><i class="fa-solid fa-chevron-right"></i></button>
  <div class="slider__container" data-multislide="true" data-step="4">

  
    
    <?php


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
  echo '<a href="filmtest.php?id=' . $film['Id_films'] . '"><i class="fa-solid fa-chevron-down"></i></a>';
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

</div>
<div class="catalogue">

    
    <h1>Comédie</h1>
    <section class="slider">
  <button class="slider__control prev"><i class="fa-solid fa-chevron-left"></i></button>
  <button class="slider__control next"><i class="fa-solid fa-chevron-right"></i></button>
  <div class="slider__container" data-multislide="true" data-step="4">

  
    
    <?php


// Récupération des données de la table genres
$sql_films = "SELECT f.*, g.nom_genres
              FROM films f 
              INNER JOIN avoir a ON f.Id_films = a.Id_films
              INNER JOIN genres g ON a.Id_genres = g.Id_genres
              WHERE g.nom_genres = 'Comédie'";
$stmt_films = $db->prepare($sql_films);
$stmt_films->execute();
$films = $stmt_films->fetchAll(PDO::FETCH_ASSOC);


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

</div>
<div class="catalogue">
    
    <h1>Asie</h1>
    <section class="slider">
        <button class="slider__control prev"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="slider__control next"><i class="fa-solid fa-chevron-right"></i></button>
        <div class="slider__container" data-multislide="true" data-step="4">
        <?php


// Récupération des données de la table genres
$sql_films = "SELECT f.*, g.nom_genres
              FROM films f 
              INNER JOIN avoir a ON f.Id_films = a.Id_films
              INNER JOIN genres g ON a.Id_genres = g.Id_genres
              WHERE g.nom_genres = 'Asie'";
$stmt_films = $db->prepare($sql_films);
$stmt_films->execute();
$films = $stmt_films->fetchAll(PDO::FETCH_ASSOC);


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

        </div>
    </section>
</div>

<div class="catalogue">
    
    <h1>Horreur</h1>
    <section class="slider">
        <button class="slider__control prev"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="slider__control next"><i class="fa-solid fa-chevron-right"></i></button>
        <div class="slider__container" data-multislide="true" data-step="4">
        <?php


// Récupération des données de la table genres
$sql_films = "SELECT f.*, g.nom_genres
              FROM films f 
              INNER JOIN avoir a ON f.Id_films = a.Id_films
              INNER JOIN genres g ON a.Id_genres = g.Id_genres
              WHERE g.nom_genres = 'Horreur'";
$stmt_films = $db->prepare($sql_films);
$stmt_films->execute();
$films = $stmt_films->fetchAll(PDO::FETCH_ASSOC);


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

        </div>
    </section>
</div>
<!-- <footer> -->

<?php 

include('footer.php');
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
