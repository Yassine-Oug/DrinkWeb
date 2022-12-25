<?php
    function connexion_database(){
        $user = "root"; // A changer en fonction de l'environnement
        $password = "root"; // A changer en fonction de l'environnement
        $base = "DrinkWeb";
        $server = "mysql:host=localhost;dbname=$base;charset=utf8";
        try
        {
            $db = new PDO($server, $user, $password);
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        return $db;
    }
?>