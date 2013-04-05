<?php session_start(); 
$titre="Accueil";
include 'includes/fonctions.php';
include 'includes/haut.php';
include 'includes/menu.php';
?>
		<div class="contenu">
			<div class="corps">
				<span class="bandeau" > Derniers sondages </span></br>	
				<ul>
					<?php	$sql = 'SELECT *  FROM sondages ORDER BY id DESC LIMIT 0,3';  
						$req = requete($sql);	
						while ($data = reqfetch($req)) 
						{
							$sql2 = 'SELECT *  FROM membres WHERE id='.$data['id_membre'];  
							$req2 = requete($sql2);	
							while ($data2 = reqfetch($req2)) 
							{
								echo '<a href="liste_sondages.php?id='.$data['id'].'"><li>'.$data['titre'].' ('.$data['date'].')</li></a>';
								
							}
						}		
				?>
				</ul>
				<span class="bandeau" > Derniers inscrits </span></br>	
				<ul>
					<?php	$sql = 'SELECT *  FROM membres ORDER BY id DESC LIMIT 0,3';  
						$req = requete($sql);	
						while ($data = reqfetch($req)) 
						{
								echo '<li>'.$data['pseudo'].'</li>';
								
							
						}		
				?>
				</ul>
			</div>
			<div class="barredroite">
				
				<?php if(!isset($_SESSION['pseudo'])){?>
				<div class="bloc">
					
					<form class="form1" id="start" action="connexion.php" method="post">
					
				<?php if(isset($_GET['erreur'])){echo '<p>Vous avez du vous trompez...</p>'; }?>
						<input type="text" name="pseudo" placeholder="Ton pseudo " required="">
							<input type="password" name="mdp" placeholder="Mot de passe" required="">
							<button type="submit">Connexion</button>
							<a href="inscription.php"class="inscritToi">(pas encore inscris ?)</a>
		 
					</form>
				</div>
				<?php 
				}
				else{
				?>
					<div class="bloc">
					
							<h1><?php echo "Bonjour ".$_SESSION['pseudo']; ?></h1>
							<p>
								<ul>
									<li><?php echo $_SESSION["nb_sondages"]." sondages postés."; ?></li>
									<li><?php echo $_SESSION["nb_reponses"]." sondages répondus."; ?></li>
									
								</ul>	
							</p>
							<button  onclick="window.location='deco.php';">Déconnexion</button>
							
					</form>
				</div>
				
				
				
				
				<?php }				?>
				
				
			</div>
		</div>
		<div class="footer">
			<p>2013 Projet informatique L2 MASS</p>
		</div>
		
		
	</div>
	</body>
</html>