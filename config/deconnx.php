<?php
session_start();

unset($_SESSION["id_utilisateurs"]);
unset($_SESSION["pseudo"]);

header("Location:../index.php");

?>