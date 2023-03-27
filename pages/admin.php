<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/messerror.css">
</head>
<body id="home">

<!-- <nav> -->
<?php 

include('nav.php');
?>
    
    <table>
        <tr>
            <td>
                <form action="" method="post" autocomplete="off" onsubmit="onFormSubmit()">
                    <div>
                        <label for="filmCode">Film Référence</label>
                        <input type="text" name="filmCode" id="filmCode">
                    </div>
                    <div>
                        <label for="filmTitre">Titre Film</label>
                        <input type="text" name="filmTitre" id="filmTitre">
                    </div>
                    <div>
                        <label for="filmDate">Année Film</label>
                        <input type="text" name="filmDate" id="filmDate">
                    </div>
                    <div>
                        <label for="filmSynopsis">Synopsis Film</label>
                        <input type="text" name="filmSynopsis" id="filmSynopsis">
                    </div>
                    <div class="affiche_films">
                    <form action="" method="post" enctype="multtipart/form-data" name="uploadForm">
                    <?php 
                        if(isset($_POST['envoyer']))
                    ?>
                    <label for="affiche_films">Upload affiche du Film</label>
                                            <input type="file"
                        id="affiche_films" name="affiche_films"
                        accept="image/png, image/jpeg">
                        <input name="envoyer" type="submit" value="Envoyer">
                        
                        <label for="avatar">Choose a profile picture:</label>

                        <input type="file"
                            id="avatar" name="avatar"
                            accept="image/png, image/jpeg">

                    </form>
                    </div>
                    <div>
                        <label for="filmTeaser">Teaser Film</label>
                        <input type="text" name="filmTeaser" id="filmTeaser">
                    </div>
                    <div>
                        <label for="filmVideo">Vidéo Film</label>
                        <input type="text" name="filmVideo" id="filmVideo">
                    </div>
                    <div>
                        <fieldset>
                            <legend>Réalisateurs</legend>

                            <div>
                            <input type="checkbox" id="filmRealisateur" name="filmRealisateur" >
                            <label for="Realisateur1">Réalisateur 1</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmRealisateur" name="filmRealisateur" >
                            <label for="Realisateur2">Réalisateur 2</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmRealisateur" name="filmRealisateur" >
                            <label for="Realisateur3">Réalisateur 3</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmRealisateur" name="filmRealisateur" >
                            <label for="Realisateur4">Réalisateur 4</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmRealisateur" name="filmRealisateur" >
                            <label for="Realisateur5">Réalisateur 5</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmRealisateur" name="filmRealisateur" >
                            <label for="Realisateur6">Réalisateur 6</label>
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <fieldset>
                            <legend>Acteurs</legend>

                            <div>
                            <input type="checkbox" id="filmActeur" name="filmActeur" >
                            <label for="Acteur1">Acteur 1</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmActeur" name="filmActeur" >
                            <label for="Acteur2">Acteur 2</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmActeur" name="filmActeur" >
                            <label for="Acteur3">Acteur 3</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmActeur" name="filmActeur" >
                            <label for="Acteur4">Acteur 4</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmActeur" name="filmActeur" >
                            <label for="Acteur5">Acteur 5</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmActeur" name="filmActeur" >
                            <label for="Acteur6">Acteur 6</label>
                            </div>
                        </fieldset>
                    </div>

                    <div>
                        <fieldset>
                            <legend>Genres</legend>

                            <div>
                            <input type="checkbox" id="filmGenre" name="filmGenre" >
                            <label for="comedie">Comédie</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmGenre" name="filmGenre">
                            <label for="Asie">Asie</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmGenre" name="filmGenre">
                            <label for="horreur">Horreur</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmGenre" name="filmGenre">
                            <label for="tendances">Tendances</label>
                            </div>
                        </fieldset>
                    </div>

                    <div>
                        <fieldset>
                            <legend>Genres</legend>

                            <div>
                            <input type="checkbox" id="filmPays" name="filmPays" >
                            <label for="france">France</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmPays" name="filmPays">
                            <label for="etats-unis">Etats-Unis</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmPays" name="filmPays">
                            <label for="angleterre">Angleterre</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmPays" name="filmPays">
                            <label for="japon">Japon</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmPays" name="filmPays">
                            <label for="chine">Chine</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmPays" name="filmPays">
                            <label for="coree-sud">Corée du Sud</label>
                            </div>

                            <div>
                            <input type="checkbox" id="filmPays" name="filmPays">
                            <label for="coree-nord">Corée du Nord</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form_action--button">
                        <input type="submit" value="Soumettre">
                        <input type="reset" value="Réinitialiser">
                    </div>
                </form>
                <td>
                    <table class="list" id="storeList">
                        <thead>
                            <tr>
                                <th>Film Référence</th>
                                <th>Titre Film</th>
                                <th>Année Film</th>
                                <th>Synopsis Film</th>
                                <th>Teaser Film</th>
                                <th>Vidéo Film</th>
                                <th>Réalisateurs</th>
                                <th>Acteurs</th>
                                <th>Genres</th>
                                <th>Pays</th>
                            </tr>
                        </thead>
                    </table>
                </td>
            </td>
        </tr>
    </table>
</body>
</html>