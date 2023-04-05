<?php
session_start();

//         if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['message'])){
//         $nom = htmlspecialchars($_POST['nom']);
//         $email = htmlspecialchars($_POST['email']);
//         $message = htmlspecialchars($_POST['message']);

//         if (filter_var($email, FILTER_VALIDATE_EMAIL)){
// // metre action par requête
//         } else {echo 'Email non valide';}
//     } else  {
//         header("location: ../index.php");
//         die;
//     }
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
    <link rel="stylesheet" href="../assets/css/nav.css">
    

    <title>CinéFlix Contact</title>


</head>
<body id="home">

<!-- <nav> -->
<?php 

include('nav.php');
?>
   


    <div class="contenu">

        <div class="row_contact">

            <div class="contact-gauche">

                <h1 class="sous-titre">Contact</h1>

                <p><a href="mailto:harmonyme.free@gmail.com" class="mail_contact"><i class="fa-solid fa-paper-plane"></i>harmonyme.free@gmail.com</a></p>

                <p><i class="fa-solid fa-square-phone"></i>06 14 53 80 35</p>

                <div class="reseaux">

                    <a href="https://www.facebook.com/sylvie.carreira.144"><i class="fa-brands fa-square-facebook"></i></a>
                    <a href="https://www.instagram.com/sylviecarreira/"><i class="fa-brands fa-square-instagram"></i></a>        
                    <a href="https://twitter.com/SylvieCDC"><i class="fa-brands fa-square-twitter"></i></a>
                    <a href="https://www.linkedin.com/in/sylvie-carreira-da-cruz-546971197/"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>

            <div class="contact-droite">

                <form  class="form" action="#" method="post"> 
                    <input type="text" name="nom" placeholder="Veuillez saisir votre nom" required>
                    <input type="email" name="email" placeholder="Veuillez saisir votre email" required>
                    <textarea name="message" rows="6" placeholder="Votre message" required></textarea>
                    <button type="submit" class="btn btn2">Envoyer</button>
                </form>

            </div>
        </div>



</body>
</html>