<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />

    <title>DrinkWeb - Cocktails </title>
    <?php
        include '../fonctions/fonctions.php';
        $db = connexion_database();
    ?>
</head>
<body>
    <!-- Header part -->
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li class="nav-link px-2">
                        <a href="../Index.php" class="text-decoration-none text-secondary">Accueil</a>
                    </li>
                    <li class="nav-link px-2 text-white">Cocktails</li>
                    <li class="nav-link px-2">
                        <a href="#" class="text-decoration-none text-white">Mes recettes préférées</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- End Header part -->




<!-- MENU START -->

<div class="menuBar">
        <ul class="w">
        <div class="sochil l">
                <ul>
                    <li><a href="#"><i class="icon-facebook-sign"></i>Facebook</a></li>
                    <li><a href="#"><i class="icon-twitter"></i>Twitter</a></li>
                    <li><a href="#"><i class="icon-globe"></i>WebSite</a></li>
                    <li><a href="#"><i class="icon-envelope"></i>Mail</a></li>
                    <li><a href="#"><i class="icon-cog"></i>Language</a></li>
                </ul>
            </div>
            <div>

            <div class="searchForm l">
                <form action="#" method="post">
                    <input type="text" name="searchArea" placeholder="chercher"/>
                    <input type="submit" name="search" value="chercher"/>
                </form>
            </div>
            <div class="c"></div>
        </ul>
    </div>

    <!-- MENU END -->

    <!-- COCKTAILS CONTAINER START -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3 mb-3">
                <h2> Cocktails </h2>
            </div>
            <?php
            
                // Récupération des cocktails
                if(isset($_POST['search'])) {
                    if(isset($_POST['searchArea'])){
                        $searchArea = htmlspecialchars($_POST['searchArea']);
                    }
                    if (empty($searchArea)) {
                        $sql = $db->prepare("select * from COCKTAIL");
                    }else{
                        $sql = $db->prepare("select * from COCKTAIL where titre like '%$searchArea%'");
                    }
                }else{
                    $sql = $db->prepare("select * from COCKTAIL");
                }
                
                try {
                    $sql->execute();
                }  catch (PDOException $exception) {
                    echo "Erreur lors de la récupération de l'utilisateur";
                }
                $res = $sql->fetch();
                try {
                    $sql->execute();
                }  catch (PDOException $exception) {
                    echo "Erreur lors de la récupération de l'utilisateur";
                }
                $res = $sql->fetchAll();
                
                foreach ($res as $key) {
                    $name_img = get_name($key['titre']);
                    $nom_cocktail = $key['titre'];
                    $path = "../Donnees/Photos/$name_img.jpg";
                    echo "
                    <div class=\"card col-12 col-lg-3 m-2 d-flex justify-content-center\">
                        <a href=\"../recette/index.php?nomCocktail=$nom_cocktail&path=$path\" class=\"text-decoration-none\">
                            <img src=\"$path\" class=\"card-img-top rounded mx-auto d-block h-75\" alt=\"\">
                            <div class=\"card-body\">
                                <h5 class=\"card-text text-center text-black\">$nom_cocktail</h5>
                            </div>
                        </a>
                    </div>
                    ";
                }
            ?>
            
        </div>
    </div>

    <!-- COCKTAILS CONTAINER START -->

</br>
</br>


<!-- FOOTER START -->

<div class="footer">
    <div class="w">
        <div class="footerMenu">
            <ul class="r">
                <li><a href="#">À propos du site</a></li>
                <li><a href="#">Politiques et confidentialité</a></li>
                <li><a href="#">Conditions d'utilisation</a></li>
            </ul>
        </div>
        <div class="footerLogo l">
            <a href="Index.php"><img src="../images/logoDW.png" width="200px" /></a>
        </div>
        <div class="c"></div>
    </div>
</div>

<div class="copyRight"> Tous droits réservés &copy; </br> Publié en 2022  </div>

<!-- FOOTER END -->

    <script src="../js/bootstrap.min.js"></script>
</body>
</html>