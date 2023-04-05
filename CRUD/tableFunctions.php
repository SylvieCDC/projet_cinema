<?php
session_start();


////////////////////////////////////// Tableau Users ////////////////////////////////
function afficherTableau($rows, $headers) {
    ?>

    <table border="1">
        <tr>
        <?php foreach ($headers as $header): ?>
            <th><?php echo $header; ?></th>
        <?php endforeach; ?>
        </tr>

        <?php foreach ($rows as $row): ?>
            <tr>
            <?php foreach ($headers as $header): ?>
                <?php if ($header == "Id_utilisateurs"){ ?>
                    <td><?php echo '<a href="formulaireUtilisateur.php?id='.$row['Id_utilisateurs'].'" >'.$row['Id_utilisateurs'].'</a>'; ?></td>

                <?php } else { ?>
                    <td><?php echo $row[$header]; ?></td>
                <?php } ?>
            <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>

    </table>
    <?php
}

function getHeaderTable() {
    $headers = array();
    $headers[] = "Id_utilisateurs";
    $headers[] = "nom_utilisateurs";
    $headers[] = "prenom_utilisateurs";
    $headers[] = "pseudo_utilisateurs";
    $headers[] = "email_utilisateurs";
    $headers[] = "mot_de_passe_utilisateurs";
    return $headers;
}


////////////////////////////////////// Tableau Users ////////////////////////////////

function afficherTableauFilms($rows, $headers) {
    ?>

    <table border="1">
        <tr>
        <?php foreach ($headers as $header): ?>
            <th><?php echo $header; ?></th>
        <?php endforeach; ?>
        </tr>

        <?php foreach ($rows as $row): ?>
            <tr>
            <?php foreach ($headers as $header): ?>
                <?php if ($header == "Id_films"){ ?>
                    <td><?php echo '<a href="formulaireFilms.php?id='.$row['Id_films'].'" >'.$row['Id_films'].'</a>'; ?></td>

                <?php } elseif ($header == "synopsis_films") { ?>
                    <td><?php echo substr($row[$header], 0, 10); ?></td>
                <?php } else { ?>
                    <td><?php echo $row[$header]; ?></td>
                <?php } ?>
            <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>

    </table>
    <?php
}


function getHeaderTableFilms() {
    $headers = array();
    $headers[] = "Id_films";
    $headers[] = "titre_films";
    $headers[] = "annee_films";
    $headers[] = "affiche_films";
    $headers[] = "synopsis_films";
    $headers[] = "teaser_films";
    $headers[] = "video_films";
    return $headers;
}
