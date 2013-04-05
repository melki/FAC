<?php session_start(); 

$titre="Sondages";
include 'includes/haut.php';
include 'includes/menu.php';
?>
		<div class="contenu">
			<div class="corps">
			<?php
				if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']))
				{
					$nom = $_POST['nom'];
					$prenom = $_POST['prenom'];	
					$mail = $_POST['mail'];
					echo "Salut ".$prenom." ".$nom;
				
				}
			?>
			
		<h1>Comment nous contacter</H1>
			<h2>Humainement</h2>
				<h3>Téléphone</h3>
					<table>
						
							<?php
								$i=0;
								$num=array('0123456789', '0444444443');
								$moyen=array('fax', 'tel');
								
								
								
								for($i=0;$i<=1;$i++)
								{
									echo "<tr><td>".$moyen[$i]." </td><td> ".$num[$i]."</td></tr>";
								}
							?>
						
					</table>
				<h3>Adresse</h3>
					<p>12, rue du projet, 01000 Paris</p> 
				<h3>Réseaux sociaux</h3>
					<table>
						<tr>
							<td><a href="http://www.facebook.com"><img src="http://img.clubic.com/05585275-photo-logo-facebook.jpg" width=120 height=120/></a></td>
							<td><a href="http://www.twitter.com"><img src="http://4.bp.blogspot.com/-5p2pzlJGFmQ/TdpYlzlp6PI/AAAAAAAAAWc/k_J_Kshi6eE/s1600/TwitterIcon.png"width=120 height=120/></a></td>
						</tr>
					</table>
				<h3>Formulaire</h3>
					<form method="POST" action="#">
						<fieldset>
							<legend>Informations personnelles</legend>
								<div>
								<label>Civilité</label>
								<select><option value ="0">    </option>
								<option value ="0">Monsieur</option>
								<option value ="0">Mademoiselle</option></select>
								</div>
								
								<div>
								
								<input placeholder="Votre nom" name="nom" type="text">
								</div>
								
								<div>
								
								<input placeholder="Votre prénom" name="prenom" type="text">
								</div>
								
								<div>
							
								<input placeholder="votre mail" name="mail" type="mail">
								</div>
						<button type="submit">Contacte nous !</button>
						</fieldset>
					</form>
								
								
								
	
			</div>
			<div class="barredroite">
				
				</div>
			
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
				
				
				
				
			
				
				
			</div>
		</div>
		<div class="footer">
			<p>2013 Projet informatique L2 MASS</p>
		</div>
		
		
	</div>
	</body>
</html>