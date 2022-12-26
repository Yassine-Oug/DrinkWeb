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
    <title>DrinkWeb - Mes recettes préférés</title>
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
                
                <?php 
                    if (isset($_SESSION['est_connecte']) && $_SESSION['est_connecte']=="1") {
                        # L'utilisateur est connecté, proposer la déconnexion 
                        echo '
                            <div class="text-end">
                                <a href="deconnexion/deconnexion.php" class="btn btn-outline-light active" >Déconnexion</a>
                            </div>
                        ';
                        
                    } else {
                        echo '
                            <div class="text-end">
                                <a href="connexion/index.php" class="btn btn-outline-light" >Connexion</a>
                                <a href="creer_compte/index.php" class="btn btn-outline-warning" >S\'inscrire</a>
                            </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </header>
    <!-- End Header part -->
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3 mb-3">
                <h2>Mes recettes préférées</h2>
            </div>
            <?php
                // Récupération de l'id user
                $sql = $db->prepare("SELECT * FROM UTILISATEUR WHERE mail LIKE :mail");
                $sql->bindParam(":mail", $_SESSION['email']);
                try {
                    $sql->execute();
                }  catch (PDOException $exception) {
                    echo "Erreur lors de la récupération de l'utilisateur";
                }
                $res = $sql->fetch();
                $id_user = $res['id_utilisateur'];
                // Récupération des cocktails
                $sql = $db->prepare("SELECT nom_cocktail FROM PANIER WHERE id_utilisateur = :id_utilisateur");
                $sql->bindParam(":id_utilisateur", $id_user);
                try {
                    $sql->execute();
                }  catch (PDOException $exception) {
                    echo "Erreur lors de la récupération de l'utilisateur";
                }
                $res = $sql->fetchAll();
                foreach ($res as $key) {
                    $name_img = get_name($key['nom_cocktail']);
                    $nom_cocktail = $key['nom_cocktail'];
                    echo "
                    <div class=\"card col-3 m-2 justify-content-between\">
                        <img src=\"../Donnees/Photos/$name_img.jpg\" class=\"card-img-top\" alt=\"\">
                        <div class=\"card-body\">
                            <h5 class=\"card-text text-center\">$nom_cocktail</h5>
                        </div>
                    </div>
                    ";
                }
            ?>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>