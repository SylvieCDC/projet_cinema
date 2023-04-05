<?php
session_start();
require 'connx.php';



function get_image()
{
   if(require("connx.php"))
    {
        $req=$bdd->prepare("SELECT images_profil['lien_images_profil'] FROM images_profil");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
}

?>