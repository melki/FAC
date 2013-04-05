<?php session_start(); 
$titre="Sondages";
include 'includes/haut.php';
include 'includes/menu.php';
?>	

		<div class="contenu">
			<div class="corps">
				<button  onclick='window.location="liste_sondages.php";'>Répondre à un sondage</button>
				<button  onclick='window.location="resultat.php";'>Regarder les résultats</button>
				<?php if(isset($_SESSION['pseudo'])){?>
					<button onclick='window.location="poster.php";' >Poster un sondage</button>
				<?php } ?>
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