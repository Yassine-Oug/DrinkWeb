<?php
	// ouvrir la session
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<title>DrinkWeb</title>
	</head>
	<body>
		<!-- Header part -->
		<header class="p-3 text-bg-dark">
			<div class="container">
				<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
					<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
						<li class="nav-link px-2 text-secondary">
							<a href="#" class="text-decoration-none text-secondary">Accueil</a>
						</li>
						<li class="nav-link px-2 text-white">
							<a href="Cocktails/index.php" class="text-decoration-none text-white"> Cocktails </a>
						</li>
						<li class="nav-link px-2 text-white">
							<a href="mes_recettes_preferes/index.php" class="text-decoration-none text-white">Mes recettes préférées</a>
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
			<div class="col-12 mt-3">
				<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
					Morbi eu leo vel nibh laoreet posuere sed sit amet augue. 
					Nulla eu vulputate sem. Etiam commodo, nulla finibus efficitur semper, purus massa pharetra nunc, sit amet consectetur quam urna in en
					im. Praesent dapibus egestas volutpat. Nunc malesuada, nulla elementum ultrices aliquam, dui odio fringilla ex, eget pharetra erat est
					ut mi. Nulla imperdiet vehicula tortor. Aenean non scelerisque est. Maecenas sed mauris fermentum, tincidunt diam ac, placerat urna. 
					Vestibulum at urna et risus bibendum varius. Nullam eleifend non libero at elementum.

					Pellentesque lobortis turpis erat. Maecenas id nisi diam. Phasellus in dolor tortor. Cras luctus velit at metus egestas luctus. Lorem ipsum dolor sit
					amet, consectetur adipiscing elit. Suspendisse laoreet convallis nisl, aliquam porttitor eros elementum quis. Morbi ultricies a metus vitae sollicit
					udin. Aenean commodo odio velit, vel placerat ante finibus eget. Duis dignissim justo ut tristique varius. Nunc lectus risus, lobortis vulputate ultr
					ices eget, condimentum vitae augue. Donec dignissim rhoncus euismod. Duis non ligula augue. Maecenas varius malesuada vulputate. Vivamus feugiat, er
					at eu dapibus lobortis, tellus tellus pharetra sem, nec elementum risus leo et lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrice
					s posuere cubilia curae; Praesent at diam auctor, facilisis risus at, imperdiet enim. 
					
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
					Morbi eu leo vel nibh laoreet posuere sed sit amet augue. 
					Nulla eu vulputate sem. Etiam commodo, nulla finibus efficitur semper, purus massa pharetra nunc, sit amet consectetur quam urna in en
					im. Praesent dapibus egestas volutpat. Nunc malesuada, nulla elementum ultrices aliquam, dui odio fringilla ex, eget pharetra erat est
					ut mi. Nulla imperdiet vehicula tortor. Aenean non scelerisque est. Maecenas sed mauris fermentum, tincidunt diam ac, placerat urna. 
					Vestibulum at urna et risus bibendum varius. Nullam eleifend non libero at elementum.

					Pellentesque lobortis turpis erat. Maecenas id nisi diam. Phasellus in dolor tortor. Cras luctus velit at metus egestas luctus. Lorem ipsum dolor sit
					amet, consectetur adipiscing elit. Suspendisse laoreet convallis nisl, aliquam porttitor eros elementum quis. Morbi ultricies a metus vitae sollicit
					udin. Aenean commodo odio velit, vel placerat ante finibus eget. Duis dignissim justo ut tristique varius. Nunc lectus risus, lobortis vulputate ultr
					ices eget, condimentum vitae augue. Donec dignissim rhoncus euismod. Duis non ligula augue. Maecenas varius malesuada vulputate. Vivamus feugiat, er
					at eu dapibus lobortis, tellus tellus pharetra sem, nec elementum risus leo et lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrice
					s posuere cubilia curae; Praesent at diam auctor, facilisis risus at, imperdiet enim. 
				</p>
			</div>
		</div>


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
            <a href="Index.php"><img src="images/logoDW.png" width="200px" /></a>
        </div>
        <div class="c"></div>
    </div>
</div>

<div class="copyRight"> Tous droits réservés &copy; </br> Publié en 2022  </div>

<!-- FOOTER END -->




		<script src="./js/bootstrap.min.js"></script>
	</body>
</html>