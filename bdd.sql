DROP DATABASE IF EXISTS cineflixbdd;
CREATE DATABASE cineflixbdd;
USE cineflixbdd;

CREATE TABLE roles(
   Id_roles INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nom_roles VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE realisateurs(
   Id_realisateurs INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nom_realisateurs VARCHAR(50) ,
   prenom_realisateurs VARCHAR(50) ,
   date_de_naissance_realisateurs VARCHAR(50) ,
   nationalite_realisateurs VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE acteurs(
   Id_acteurs INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nom_acteurs VARCHAR(50) ,
   prenom_acteurs VARCHAR(50) ,
   date_de_naissance_acteurs VARCHAR(50) ,
   nationalite_acteurs VARCHAR(5)
) ENGINE=InnoDB;

CREATE TABLE films(
   Id_films INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   titre_films VARCHAR(50) ,
   annes_films VARCHAR(50) ,
   synopsis_films VARCHAR(50) ,
   affiche_films VARCHAR(50) ,
   teaser_films VARCHAR(50) ,
   video_films VARCHAR(50) 
) ENGINE=InnoDB;

CREATE TABLE genres(
   Id_genres INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nom_genres VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE images_acteurs(
   Id_images_acteurs INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   date_upload_images_acteurs VARCHAR(50) ,
   Id_acteurs INT UNSIGNED NOT NULL,
   FOREIGN KEY(Id_acteurs) REFERENCES acteurs(Id_acteurs)
) ENGINE=InnoDB;

CREATE TABLE images_profil(
   Id_images_profil INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nom_images_profil VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE images_realisateurs(
   Id_images_realisateurs INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   date_upload_images_realisateurs VARCHAR(50) ,
   Id_realisateurs INT UNSIGNED NOT NULL,
   FOREIGN KEY(Id_realisateurs) REFERENCES realisateurs(Id_realisateurs)
) ENGINE=InnoDB;

CREATE TABLE pays(
   Id_pays INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nom_pays VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE utilisateurs(
   Id_utilisateurs INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nom_utilisateurs VARCHAR(50) ,
   prenom_utilisateurs VARCHAR(50) ,
   pseudo_utilisateurs VARCHAR(50) ,
   email_utilisateurs VARCHAR(100) ,
   mot_de_passe_utilisateurs VARCHAR(250) ,
   inscription_date DATETIME,
   Id_images_profil INT UNSIGNED NOT NULL,
   Id_roles INT UNSIGNED NOT NULL,
   FOREIGN KEY(Id_images_profil) REFERENCES images_profil(Id_images_profil),
   FOREIGN KEY(Id_roles) REFERENCES roles(Id_roles)
) ENGINE=InnoDB;

CREATE TABLE AVOIR(
   Id_films INT UNSIGNED NOT NULL,
   Id_genres INT UNSIGNED NOT NULL,
   PRIMARY KEY (Id_films,Id_genres),
   FOREIGN KEY(Id_films) REFERENCES films(Id_films),
   FOREIGN KEY(Id_genres) REFERENCES genres(Id_genres)
) ENGINE=InnoDB;

CREATE TABLE VENIR(
   Id_films INT UNSIGNED NOT NULL,
   Id_pays INT UNSIGNED NOT NULL,
   PRIMARY KEY (Id_films,Id_pays),
   FOREIGN KEY(Id_films) REFERENCES films(Id_films),
   FOREIGN KEY(Id_pays) REFERENCES pays(Id_pays)
) ENGINE=InnoDB;

CREATE TABLE JOUER(
   Id_acteurs INT UNSIGNED NOT NULL,
   Id_films INT UNSIGNED NOT NULL,
   PRIMARY KEY (Id_acteurs,Id_films),
   FOREIGN KEY(Id_acteurs) REFERENCES acteurs(Id_acteurs),
   FOREIGN KEY(Id_films) REFERENCES films(Id_films)
) ENGINE=InnoDB;

CREATE TABLE REALISER(
   Id_realisateurs INT UNSIGNED NOT NULL,
   Id_films INT UNSIGNED NOT NULL,
   PRIMARY KEY (Id_realisateurs,Id_films),
   FOREIGN KEY(Id_realisateurs) REFERENCES realisateurs(Id_realisateurs),
   FOREIGN KEY(Id_films) REFERENCES films(Id_films)
) ENGINE=InnoDB;

CREATE TABLE REGARDE(
   Id_utilisateurs INT UNSIGNED NOT NULL,
   Id_films INT UNSIGNED NOT NULL,
   PRIMARY KEY (Id_utilisateurs,Id_films),
   FOREIGN KEY(Id_utilisateurs) REFERENCES utilisateurs(Id_utilisateurs),
   FOREIGN KEY(Id_films) REFERENCES films(Id_films)
) ENGINE=InnoDB;

CREATE TABLE FAVORISER(
   Id_utilisateurs INT UNSIGNED NOT NULL,
   Id_films INT UNSIGNED NOT NULL,
   PRIMARY KEY (Id_utilisateurs,Id_films),
   FOREIGN KEY(Id_utilisateurs) REFERENCES utilisateurs(Id_utilisateurs),
   FOREIGN KEY(Id_films) REFERENCES films(Id_films)
) ENGINE=InnoDB;
