<?php session_start(); 
$titre="Inscriptions";
include 'includes/haut.php';

?>
	
    <body>
	<?php include 'includes/fonctions.php';
	
	if(isset($_POST["pseudo"])&&isset($_POST["mail"])&&isset($_POST["mdp1"])&&isset($_POST["mdp2"])&&isset($_POST["age"])&&isset($_POST["sexe"])) //on vérifie que tout les champs soit remplis
	{
		$mail=$_POST["mail"];
		$age=$_POST["age"];
		$sexe=$_POST["sexe"];
		$mdp1=$_POST["mdp1"]; //on renomme le tout
		$mdp2=$_POST["mdp2"];
		$pseudo=$_POST["pseudo"];
		$erreur="Erreur : <br>";	
		$sql = 'SELECT *  FROM membres WHERE pseudo="'.$pseudo.'"';  // on check si les pseudo n'est pas déjà dans la bdd
	
		$req = requete($sql);	
		$u=0;
				while ($data = reqfetch($req)) 
						{
							$u++;
						}					
		if($u>0) {$erreur = $erreur."Ce pseudo existe déjà : ".$pseudo."<br>" ;}	
		$sql = 'SELECT *  FROM membres WHERE mail="'.$mail.'"';  // on check si le mail n'est pas déjà dans la bdd
	
		$req = requete($sql);	
		$u=0;
				while ($data = reqfetch($req)) 
						{
							$u++;
						}					
		if($u>0) {$erreur = $erreur." Un utilisateur utilise déjà ce mail : ".$mail."<br>" ;}	
		
		if($mdp1!=$mdp2){$erreur =$erreur." Les mots de passe ne correspondent pas <br>"; } //assez clair
	
		if($erreur=="Erreur : <br>") // on inscris le bonhomme
		{
			$mdp=crypt($mdp1);
			$sql = 'INSERT INTO membres VALUES ("", "'.$pseudo.'","'.$mdp.'", 0, 0, "'.$mail.'","'.$age.'","'.$sexe.'")'; 
			$req = requete($sql); 				
			$erreur="Bravo te voilà inscris, tu peux désormais te connecter via la page d'accueil : <a href='index.php'>ici</a>";	
		}
		echo "<div id='popup' class='popup'>".$erreur."<br>";
		echo "<button onclick='cacher();' type='submit'>OK</button></div>";
	}

	
	
	
	
	
	
	
	
	
	
	include 'includes/menu.php';
	?>
	
	<div class="contenu">
			<div class="corps">
				<h1>Inscriptions</h1>
				<h3>Pourquoi s'inscrire ?</h3>
				<p>S'inscrire permet de poster des sondages et nous permet d'obtenir des résultats plus pertinent lors de la complétion des sondages existants.</p>
				<h3>Formulaire d'inscription</h3>
				<form id="signup" method="POST" action="" enctype="multipart/form-data">
				
				<input type="text" name="pseudo" placeholder="Ton pseudo " required="">
				<input type="email" name="mail" placeholder="pierre.dupont@email.com" required="">
				<input type="password" name="mdp1" placeholder="Choisis ton mot de passe" required="">
				<input type="password" name="mdp2" placeholder="Confime le mot de passe" required="">					
				<div class="styled-select">
				<select name="age">
					<option value="1">14- ans</option>
					<option value="2">14-18 ans</option>
					<option value="3" selected>19-25 ans</option>
					<option value="4">25-35 ans</option>
					<option value="5">35-50 ans</option>
					<option value="6">50+ ans</option>
				</select>
				</div>	
				<div class="styled-select">
				<select name="sexe">
					<option selected value="Homme">Homme</option>
					<option value="Femme">Femme</option>
				</select>
				</div>				
				<button type="submit">Inscris toi !</button>	
			</form>
				
				
				
				
			</div>
			<div class="bloc">
					
					<form class="form1" id="start" action="connexion.php" method="post">
					
						<input type="text" name="pseudo" placeholder="Ton pseudo " required="">
							<input type="password" name="mdp" placeholder="Mot de passe" required="">
							<button type="submit">Connexion</button>
							<a href="inscription.php"class="inscritToi">(pas encore inscris ?)</a>
		 
					</form>
				</div>
		</div>
		<div class="footer">
			<p>2013 Projet informatique L2 MASS</p>
		</div>
		
		
	</div>
	</body>
</html>
