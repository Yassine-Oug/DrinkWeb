<?php include "inc/fonctions.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Market Place</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

    <!-- HEADER START -->

    <div class="headerTop">
        <div class="logo w">
            <a href="MarketPlace.php"><img src="images/logo.png" width="300"/></a>
        </div>
    </div>

    <!-- HEADER END -->

    <!-- MENU START -->

    <div class="menuBar">
        <ul class="w">
            <li><a href="MarketPlace.php">Toutes</a></li>
            <?php get_cat();?>
            <div class="c"></div>
        </ul>
    </div>

    <!-- MENU END -->


    <!-- SEARCH AREA START -->

    <div class="search ">
        <?php
            cart();
        ?>
        <div class="w">
            <div class="cart r2"> Votre panier MyMarket - Vos produits : , Sous_total : <a href='#'>Vos paiments</a></div>
            <div class="searchForm l">
                <form action="search.php" method="get">
                    <input type="text" name="searchArea" placeholder="chercher"/>
                    <input type="submit" name="search" value="chercher"/>
                </form>
            </div>
            <div class="sochil l">
                <ul>
                    <li><a href="#"><i class="icon-facebook-sign"></i>Facebook</a></li>
                    <li><a href="#"><i class="icon-twitter"></i>Twitter</a></li>
                    <li><a href="#"><i class="icon-globe"></i>WebSite</a></li>
                    <li><a href="#"><i class="icon-envelope"></i>Mail</a></li>
                    <li><a href="#"><i class="icon-cog"></i>Language</a></li>
                </ul>
            </div>
            <div class="c"></div>
        </div>
    </div>
    <!-- SEARCH AREA END -->


    <br/>
    <br/>

    <!-- CONTENT START -->

    <div class="w content">
