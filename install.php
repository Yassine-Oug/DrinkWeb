<?php
include 'Donnees.inc.php';
/******/
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "root"); // A préciser dans le rapport
define("DB_DATABASE", "DrinkWeb"); // A préciser dans le rapport
//$db = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

// Connexion à la base de donnée
$server = "mysql:host=localhost;dbname=DrinkWeb;charset=utf8";
$user = "root";
$password = "root";
$base = "DrinkWeb";
try
{
	$db = new PDO($server, $user, $password);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

//Création de la base de donnée
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
        nom_aliment VARCHAR(50) NOT NULL PRIMARY KEY
    );
    
    CREATE TABLE COCKTAIL (
        titre VARCHAR(255) NOT NULL,
        ingredients VARCHAR(1000) NOT NULL,
        preparation VARCHAR(1000) NOT NULL,
        PRIMARY KEY(titre)
    );

    CREATE TABLE LIAISON (
        nom_cocktail VARCHAR(255),
        nom_aliment VARCHAR(50),
        PRIMARY KEY (nom_cocktail, nom_aliment),
        FOREIGN KEY (nom_cocktail) REFERENCES COCKTAIL(titre),
        FOREIGN KEY (nom_aliment) REFERENCES ALIMENT(nom_aliment)
    );
    
    CREATE TABLE PANIER (
        id_panier INT AUTO_INCREMENT,
        id_utilisateur INT,
        nom_cocktail VARCHAR(255),
        PRIMARY KEY(id_panier),
        FOREIGN KEY (id_utilisateur) REFERENCES UTILISATEUR(id_utilisateur),
        FOREIGN KEY (nom_cocktail) REFERENCES COCKTAIL(titre)
    )
";

foreach (explode(';', $Sql) as $requete) {
    //$res = $dp->prepare($requete);
    $db->exec($requete);
}

foreach($Hierarchie as $key => $val){
    /* Insertion des aliments */
    // Préparation de la requête
    $Sql = $db->prepare("INSERT INTO ALIMENT (nom_aliment) VALUES (:nomAliment)");
    $Sql->bindParam(':nomAliment', $key);
    // Exécution de la requête
    try {
        $Sql->execute();
    } catch (PDOException $exception) {
        echo "Erreur lors de l'insertion de $key dans Aliment : $exception->getMessage()";
    }
}

foreach ($Recettes as $key => $value) {
    /* Insertion des cocktails*/
    // Récupération des éléments nécessaire
    $titre = $value['titre'];
    $ingredients = $value['ingredients'];
    $preparation = $value['preparation'];
    // Préparation de la requête
    $Sql = $db->prepare("INSERT INTO COCKTAIL (titre, ingredients, preparation) VALUES (:titre, :ingredients, :preparation)");
    $Sql->bindParam(':titre', $titre);
    $Sql->bindParam(':ingredients', $ingredients);
    $Sql->bindParam(':preparation', $preparation);
    // Exécution de la requête
    try {
        $Sql->execute();
    } catch (PDOException $exception) {
        echo " Erreur lors de l'ajout du cocktail $titre : $exception->getMessage()";
    }
    /* Insertion dans liaison de la liaison entre un aliment et sa recette */
    foreach ($value['index'] as $key1 => $value1) {
        // Préparation de la requête
        $Sql = $db->prepare("INSERT INTO LIAISON (nom_cocktail, nom_aliment) VALUES (:nom_cocktail, :nom_aliment)");
        $Sql->bindParam(':nom_cocktail', $titre);
        $Sql->bindParam(':nom_aliment', $value1);
        // Exécution de la requête
        try {
            $Sql->execute();
        } catch (PDOException $exception) {
            echo " Erreur lors de l'ajout de la liaison $titre -> $value1 : $exception->getMessage()";
        }
    }
}

// Fermeture de la connexion automatique en fin de script
?>

