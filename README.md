# DrinkWeb

Projet de troisième année proposant un site e-commerce de boissons.

# Problème avec l'insertion en mode non objet (sans PDO)
    - A chaque erreur de ligne d'insertion, le reste n'est pas effectué

# Problème avec l'insertion de (ip client && ip products) dans la bd
    - mysqli_num_rows expects parameter

# Architecture de $_SESSION
    - $_SESSION['est_connecte'] : vaut "1" si l'utilisateur est donnecté, "0" ou inexistant sinon
    - $_SESSION['nom'] : contient le nom de l'user identifié
    - $_SESSION['prenom'] : contient le prénom de l'user identifié
    - $_SESSION['email'] : contient l'adresse mail de l'user identifié
    - $_SESSION['nbRecettesPreferes'] : contiens le nombre de recettes préférés
    - $_SESSION['recetteN'] : contiens le nom d'une recette, avec N pour identifiant