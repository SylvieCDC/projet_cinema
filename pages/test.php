<?php
require '../config/connx.php';


$stmt = $db-> prepare ("SELECT * FROM films");
$stmt-> execute();
while ($film = $stmt -> fetch()){
    echo $film['Id_films'];
    echo $film['titre_films'];
    echo "<br>";
}

?>



SELECT * FROM films f, acteurs a, jouer j WHERE j.Id_acteurs=a.Id_acteurs AND j.Id_films=f.Id_films AND f.Id_films=1;