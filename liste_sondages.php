<?php session_start(); 

$titre="Sondages";
include 'includes/haut.php';
include 'includes/menu.php';
include 'includes/fonctions.php';
?>
		<div class="contenu">
			<div class="corps">
				<form method="POST" action="reponse.php">
				
				<?php
					if(isset($_GET['id']))
					{
					
						echo "<input id='id' name='sondage_id' value='".$_GET['id']."' type='hidden'>";
						$sql = 'SELECT *  FROM sondages WHERE id = "'.$_GET['id'].'"';  
						$req = requete($sql);	
						while ($data = reqfetch($req)) 
						{
							$i=0;
							echo '<h1>'.$data['titre'].'</h1><p> Dans la catégorie '.$data['categorie'].'</p>';
							$sql = 'SELECT *  FROM question WHERE id_sondage = "'.$data['id'].'" ORDER BY id ASC';  
							$req = requete($sql);	
									
							while ($question = reqfetch($req)) 
							{
								echo "<h2>".$question['numero'].".".$question['titre']."</h2>";
							
								if($question['type']==1)
								{
									$sql2 = 'SELECT * FROM multiple WHERE id_question = "'.$question['id'].'"';
									$req2 = requete($sql2);
									echo '<div class="checkbox" >';
							
									while ($choix = reqfetch($req2)) 
									{
										$k=1;
									
										for($k=1;$k<=$choix['nb_choix'];$k++)
										{
											echo "<input id='check".$k.$question['numero']."' type='checkbox' name='reponse".$question['numero']."[]' value='".$choix['choix'.$k]."'  >";
											echo "<label for='check".$k.$question['numero']."'>".$choix['choix'.$k]."</label><br><br>";
										}
									}
									
									echo "</div>";
								
								}
										
										
								if($question['type']==2)
								{
									$sql1 = 'SELECT *  FROM multiple WHERE id_question = "'.$question['id'].'"';
									$req1 = requete($sql1);
									echo "<div class='styled-select'>";
									
									while ($choix = reqfetch($req1)) 
									{
										echo "<select  name='reponse".$question['numero']."[]' >";
									
										for($k=1;$k<=$choix['nb_choix'];$k++)
										{
											echo"<option selected value='".$choix['choix'.$k]."'>".$choix['choix'.$k]."</option>";
										}	
									
										echo "<option selected disabled>Cliquez ici pour affichez les choix</option> ";
										echo "</select>	</div>";
									}
								
								}
										
								if($question['type']==3)
								{
									echo "<input type='text' name='reponse".$question['numero']."[]'  placeholder='Votre réponse ici (optionel)'>";
								}
										
							$i++;	
							}
						}	
						
						echo "<button type='submit'>Répondre au sondage !</button>	";
					}
				
					?>				
				
				</form>
				<?php									
					if(!isset($_GET['cat'])&&!isset($_GET['id']))
					{	
						echo '<h1>Liste des sondages</h1>'; ?>
						<div class="styled-select">
							<select id="cat" name="categorie" onchange="cat('liste_sondages')">
							<option value="Politique">Politique</option>
							<option value="Jeux">Jeux</option>
							<option value="Sport">Sport</option>
							<option value="Actualité">Actualité</option>
							<option value="Vie quotidienne">Vie quotidienne</option>
							<option selected disabled value=0 >Regarde uniquement une catégorie</option>
							</select>
						</div>
				
				<?php	$sql = 'SELECT *  FROM sondages ORDER BY id DESC';  
						$req = requete($sql);	
						while ($data = reqfetch($req)) 
						{
							$sql2 = 'SELECT *  FROM membres WHERE id='.$data['id_membre'];  
							$req2 = requete($sql2);	
							while ($data2 = reqfetch($req2)) 
							{
								
								echo '<button onclick="window.location=\'liste_sondages.php?id='.$data['id'].'\';" >'.$data['titre'].'</br><span class="petit">
								proposé par '.$data2['pseudo'].' </span></button>';
							}
						}		
					}
					if(isset($_GET['cat']))
					{	
						echo '<h1>Liste des sondages de '.$_GET['cat'].'</h1>'; ?>
						<div class="styled-select">
							<select id="cat" name="categorie" onchange="cat('liste_sondages')">
							<option value="Politique">Politique</option>
							<option value="Jeux">Jeux</option>
							<option value="Sport">Sport</option>
							<option value="Actualité">Actualité</option>
							<option value="Vie quotidienne">Vie quotidienne</option>
							<option selected disabled value=0 >Regarde uniquement une catégorie</option>
							</select>
						</div>
				
				<?php	$sql = 'SELECT *  FROM sondages WHERE categorie ="'.$_GET['cat'].'" ORDER BY id DESC';  
						$req = requete($sql);	
						
						while ($data = reqfetch($req)) 
						{
							$sql2 = 'SELECT *  FROM membres WHERE id='.$data['id_membre'];  
							$req2 = requete($sql2);	
							while ($data2 = reqfetch($req2)) 
							{
								
								echo '<button onclick="window.location=\'liste_sondages.php?id='.$data['id'].'\';" >'.$data['titre'].'</br><span class="petit">
								proposé par '.$data2['pseudo'].' </span></button>';
							}
						}		
					}
				
				?>		
					
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
		
	
		
		
	</div>
	</body>
</html>