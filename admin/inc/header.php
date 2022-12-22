<?php

include "inc/cookie.php";

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "MyMarket");

    //connect bd
    $db = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);


?>

<!DOCTYPE html>
<html>

    <head>

    <title>Panneau de contrôle</title>

    <meta charset = "utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="inc/ckeditor/ckeditor/ckeditor.js"></script>

    </head>

    <body>
        <div class="all">

            <!-- ADMIN MENU START -->

            <div class="adminMenu">
                <ul>
                    <li><a href="addcat.php"> Ajouter une catégorie </a></li>
                    <li><a href="addpro.php"> Ajouter un produit </a></li>

                </ul>
            </div>

            <!-- ADMIN MENU END -->

            <br/>
