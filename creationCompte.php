<?php
//Vérification

	$ClassSexe='ok';
	$ClassNom='ok';
	$ClassPrenom='ok';
	$ClassNaissance='ok';
	$ClassOrigine='ok';
	$ChampsIncorrects='';

	if(isset($_POST['submit']))
	{
		$ClassSexe='ok';
		$ClassNom='ok';
		$ClassPrenom='ok';
		$ClassNaissance='ok';
		$ChampsIncorrects='';

		if(!isset($_POST['sexe']) || ((trim($_POST['sexe'])!='f')&&(trim($_POST['sexe'])!='h')) )
		{
			$ClassSexe='error';
			$ChampsIncorrects=$ChampsIncorrects.'<li>sexe</li>';
		}

		if( (!isset($_POST['nom'])) || (strlen(trim($_POST['nom']))<3) )
		{
			$ClassNom='error';
			$ChampsIncorrects=$ChampsIncorrects.'<li>nom</li>';
		}

		if( !isset($_POST['prenom']) )
		{
			$ClassPrenom='error';
			$ChampsIncorrects=$ChampsIncorrects.'<li>prenom</li>';
		}else{
			//strtolower Convert all characters to lowercase
			$Prenom=strtolower(trim($_POST['prenom']));
			$AuMoinsUneLettre=false;
			$QueDesLettres=true;
			for($i=0;$i<strlen($Prenom);$i++)
			{
				if( ($Prenom[$i]>='a')|| ($Prenom[$i]<='z')){
					$AuMoinsUneLettre=false;
				}else{
					$QueDesLettres=false;
				}
				if( (!$AuMoinsUneLettre) || (!$QueDesLettres))
				{
					$ClassPrenom='error';
					$ChampsIncorrects=$ChampsIncorrects.'<li>nom</li>';
				}

			}
			
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Vos données</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="cssLogin/style.css" />
</head>

<body>

<h1>Vos données</h1>

<form method="post" action="#" >
<fieldset>
    <legend>Informations personnelles</legend>
	
	Vous êtes :  
	<span class="<?php echo $ClassSexe; ?>">
		<input type="radio" name="sexe" value="f"
			<?php if((isset($_POST['sexe']))&&($_POST['sexe'])=='f') echo
			'checked="checked"'; ?>
		/> une femme
		<input type="radio" class="<?php echo $ClassSexe; ?>" name="sexe" value="h"
			<?php if((isset($_POST['sexe']))&&($_POST['sexe'])=='h') echo
			'checked="checked"'; ?>
		/> un homme
	</span>

	<br />
    Nom :    
	<input type="text" class="<?php echo $ClassNom; ?>" name="nom" require="require" value="<?php if(isset($_POST['nom']))  echo $_POST['nom']; ?>"/><br />   
    Prénom : 
	<input type="text" class="<?php echo $ClassPrenom; ?>" name="prenom" value="<?php if(isset($_POST['prenom']))  echo $_POST['prenom']; ?>" /><br /> 	
    Date de naissance : 
	<input type="date" class="<?php echo $ClassNaissance; ?>" name="naissance" value="<?php if(isset($_POST['naissance'])) echo $_POST['naissance']; ?>" /><br /> 	
	Pays d'origine :
    <input name="pays" list="pays" />
	<datalist id="pays">
		<option value="Allemagne" />
		<option value="Belgique" />
		<option value="Chine" />
		<option value="France" />
		<option value="Maroc" />
		<option value="Tunisie" />
	</datalist> 	
	
</fieldset>


	<br />
<input type="submit" value="Valider" name="submit" />
         
</form>
</body>
</html>
