<?php
/******/
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "root"); // A préciser dans le rapport
define("DB_DATABASE", "DrinkWeb"); // A préciser dans le rapport
//$db = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

/******/


  function query($link,$requete)
  { 
    $resultat=mysqli_query($link,$requete) or die("$requete : ".mysqli_error($link));
    return($resultat);
  }

  
//$mysqli=mysqli_connect('127.0.0.1', 'root', '') or die("Erreur de connexion");
//echo 'hello';
$mysqli = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD) or die("Erreur de connexion");

$base=DB_DATABASE;
$Sql="
    DROP DATABASE IF EXISTS $base;

    CREATE DATABASE $base;
    
    USE $base;

    CREATE TABLE UTILISATEUR ( 
        id_utilisateur INT AUTO_INCREMENT, 
        nom VARCHAR(50), 
        prenom VARCHAR(50), 
        username VARCHAR(50),
        mail VARCHAR(50) UNIQUE NOT NULL,
        mot_de_passe VARCHAR(50) NOT NULL,
        sexe VARCHAR(25),
        date_naissance DATE,
        adresse VARCHAR(255),
        code_postal VARCHAR(5),
        ville VARCHAR(100),
        tel VARCHAR(10),
        PRIMARY KEY(id_utilisateur)
    );
    
    CREATE TABLE ALIMENT (
        id_aliment INT AUTO_INCREMENT,
        nom_aliment VARCHAR(50) NOT NULL,
        PRIMARY KEY(id_aliment)
    );
    
    CREATE TABLE COCKTAIL (
        id_cocktail INT AUTO_INCREMENT,
        titre VARCHAR(255) NOT NULL,
        ingredients VARCHAR(255) NOT NULL,
        preparation VARCHAR(255) NOT NULL,
        id_aliment INT,
        PRIMARY KEY(id_cocktail),
        FOREIGN KEY (id_aliment) REFERENCES ALIMENT(id_aliment)
    );
    
    CREATE TABLE PANIER (
        id_panier INT AUTO_INCREMENT,
        id_utilisateur INT,
        id_cocktail INT,
        PRIMARY KEY(id_panier),
        FOREIGN KEY (id_utilisateur) REFERENCES UTILISATEUR(id_utilisateur),
        FOREIGN KEY (id_cocktail) REFERENCES COCKTAIL(id_cocktail)
    )
";

foreach(explode(';',$Sql) as $Requete) query($mysqli,$Requete);

mysqli_close($mysqli);

/*
foreach ($Recettes as $var => $value) {
    foreach ($value as $key => $val) {
        if ($key=="titre") {
            echo "$val";
            echo "<br/>";
        }
        if(is_array($key)){
            #echo print_r($key, true);
        } else {
            #echo $val;
        }
    }
}
*/
?>

