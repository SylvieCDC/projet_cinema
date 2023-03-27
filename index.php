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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/sliderAccueil.css">
    

    <title>CinéFlix Accueil</title>
   


</head>
<body id="films">

    <!-- <nav> -->
        <?php 

        include('./pages/nav.php');
        ?>

    <!-- intégrer une vidéo -->
<header>
    
    <figure id="video">
        
        <video autoplay muted>
            <source src="assets/videos/casa-de-papel.mp4" type="video/mp4">
            
        </video>
        <div class="overlay"></div>
        <figcaption>
    
            <h2>La Casa <span class="spantitre">de</span> papel</h2>
            <div class="btn_film">
                <a class="lecture" href="/projet_cinema/pages/casa_de_papel_video.php"><i class="fa-sharp fa-solid fa-play"></i>Vidéo</a>
                <a class="infos "href="/projet_cinema/pages/casa_de_papel_description.php"><i class="fa-solid fa-circle-info"></i>Plus d'infos</a>
            </div>
            
        </figcaption>


    
    </figure>  
</header> 

<section class="slider">
        <button class="slider__control prev"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="slider__control next"><i class="fa-solid fa-chevron-right"></i></button>
        <div class="slider__container" data-multislide="true" data-step="4">
            <div class="slider__item">
                <div class="image_item">
                    <img src="assets/images/thumbnails/thumb-1.jpg" alt="" width="100%">
                </div>
                
                <div class="video_content">
                    <div class="video#">
                        <figure id="video#">
                            <video autoplay muted>
                            <source src="assets/videos/casa-de-papel.mp4" type="video/mp4">
                            </video> 
                        </figure>  
                    </div>
                    <div class="icons">
                        <a href=""><i class="fa-solid fa-play"></i></a>
                        <a href=""><i class="fa-solid fa-plus"></i></a>
                        <a href=""><i class="fa-regular fa-heart"></i></a>
                        <a href=""><i class="fa-solid fa-chevron-down"></i></a>
                    </div>
                    <div class="rating">
                        <span class="note">Recommandé à 87%</span>
                        <div class="genre">Comédie</div>
                </div>
            </div>
          </div>
          <div class="slider__item">
              <img src="assets/images/thumbnails/thumb-2.jpg" alt="" width="100%">
          </div>
          <div class="slider__item">
              <img src="assets/images/thumbnails/thumb-3.jpg" alt="" width="100%">
          </div>
          <div class="slider__item">
            <img src="assets/images/thumbnails/thumb-4.jpg" alt="" width="100%">
          </div>
          <div class="slider__item">
            <img src="assets/images/thumbnails/thumb-5.jpg" alt="" width="100%">
          </div>
          <div class="slider__item">
            <img src="assets/images/thumbnails/thumb-6.jpg" alt="" width="100%">
          </div>
          <div class="slider__item">
            <img src="assets/images/thumbnails/thumb-7.jpg" alt="" width="100%">
          </div>
          <div class="slider__item">
            <img src="assets/images/thumbnails/thumb-8.jpg" alt="" width="100%">
          </div>
          <div class="slider__item">
            <img src="assets/images/thumbnails/thumb-9.jpg" alt="" width="100%">
          </div>
          <div class="slider__item">
            <img src="assets/images/thumbnails/thumb-10.jpg" alt="" width="100%">
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