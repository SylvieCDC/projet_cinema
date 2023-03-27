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
    

    <title>CinéFlix films</title>
</head>

<body id="films">

<!-- <nav> -->
<?php 

include('nav.php');
?>

<!-- liste de films -->
    
<section class="row">

    <div class="titre"><h2>Tendances</h2></div>
    <div class="carousel">
        <img src="../assets/images/thumbnails/thumb-1.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-2.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-3.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-1.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-2.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-3.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-2.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-3.jpg" alt="">
        
    </div>

    <div class="titre"><h2>Comédie</h2></div>
    <div class="carousel">
        <img src="../assets/images/thumbnails/thumb-1.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-2.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-3.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-1.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-2.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-3.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-2.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-3.jpg" alt="">
    </div>

    <div class="titre"><h2>Horreur</h2></div>
    <div class="carousel">
        <img src="../assets/images/thumbnails/thumb-1.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-2.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-3.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-1.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-2.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-3.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-2.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-3.jpg" alt="">
    </div>

    <div class="titre"><h2>Asie</h2></div>
    <div class="carousel">
        <img src="../assets/images/thumbnails/thumb-1.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-2.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-3.jpg" alt="">
        <img src="../assets/images/thumbnails/thumb-4.jpg" alt="">
    </div>

</section>

<!-- <footer> -->

<?php 

include('footer.php');
?>




</body>

</html>
