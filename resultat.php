 <?php session_start(); 
$titre="Resultats des sondages";
include 'includes/haut.php';
include 'includes/menu.php';
include 'includes/fonctions.php';
?>
		<div class="contenu">
			<div class="corps">
				<?php									
					if(isset($_GET['id']))
					{
						//On récupère tout les choix !
						$id = $_GET['id'];
						$sqlc = 'SELECT *  FROM sondages  where id = "'.$id.'" ORDER BY id DESC';  
						$reqc = requete($sqlc);	
						
						while ($datac = reqfetch($reqc)) 
						{
							$nb_question = $datac['nb_question'];	
							$i=1;
							for($i=1; $i <= $nb_question ; $i++) 
							{ 
								$nb_rempli[$i] = $datac['nb_rempli'];
							}
							$titre = $datac['titre'];
						}
						
						$i=1;
						$j=1;
						$sqla = 'SELECT *  FROM question  where id_sondage = "'.$id.'" ORDER BY id ';  
						$reqa = requete($sqla);	
						while ($data = reqfetch($reqa)) 
						{
							$titre_question[$i]=$data['titre'];
							if($i<=$nb_question)
							{
								if ($data['type']==1 || $data['type']==2 ) 
								{
									
									$sqlb = 'SELECT *  FROM multiple  where id_question = "'.$data['id'].'" ORDER BY id DESC';  
									$reqb = requete($sqlb);	
									
									while ($datab = reqfetch($reqb)) 
									{	
										$nb_choix[$i]=$datab['nb_choix'];
										
										for($j=1;$j<=$datab['nb_choix'];$j++) 
										{
											$question[$i][$j]=$datab['choix'.$j];	
											
										}	
									}	
								}
							
								if ($data['type']==3) 
								{
										
										$reponse[$i]='';
										$nb_choix[$i]=0;

								}	
							
								$i=$i+1;
							}
						}	
					
					
						
						for ($i=1;$i<=$nb_question;$i++) 
						{	
							for($j=1;$j<=$nb_choix[$i];$j++)
							{
								$reponse[$i][$j]=0;
							
							}
							
						}

						// on cherche dans la table réponse
						$sqld = 'SELECT *  FROM reponse  where id_sondage = "'.$id.'" ORDER BY id DESC';  
						$reqd = requete($sqld);	
						
					
						while ($datad = reqfetch($reqd)) 
						{
							
							for($i=1;$i<=$nb_question;$i++)	
							{
								if ($datad['reponse'.$i]=='')
								{
									$nb_rempli[$i]=$nb_rempli[$i]-1;
								}

								if ($nb_choix[$i]==0)
								{	
									if($datad['reponse'.$i]!=' ')	
									{	
										$reponse[$i]=$reponse[$i].$datad['reponse'.$i].'<br>';
									}
								}
								else
								{
										
									for($j=1;$j<=$nb_choix[$i];$j++)
									{
										//utilisation d'un regex
										$pos = strpos($datad['reponse'.$i], $question[$i][$j]);
										if ($pos!==False)
										{
											$reponse[$i][$j]=$reponse[$i][$j]+1;
										}
										
    									
									}
								
								}
								
							}	
						}
						
						//on se debrouille maintenant pour diviser $reponse i j par le nombre de fois que la question i a été répondue.
						// il ne faut pas diviser les reponses de type input
						echo '<h1>'.$titre.'</h1>';
						for($i=1;$i<=$nb_question;$i++)
						{
							
							echo '<h2>'.$titre_question[$i].'</h2>';

							if ($nb_choix[$i]!=0) {
								for($j=1;$j<=$nb_choix[$i];$j++)
								{
									$reponse[$i][$j]=round($reponse[$i][$j]*100/$nb_rempli[$i]);
									echo ''.$question[$i][$j].'<br> <div class="pourcent">'.$reponse[$i][$j].'% </div><img src="rectangle.php?pourcentage='.$reponse[$i][$j].'"><br>';
								}

							}
							else
							{
								echo $reponse[$i];

							}
						}	


					}
						
						
		
					
					
					if(!isset($_GET['cat'])&&!isset($_GET['id']))
					{	
						echo '<h1>Clic sur un des sondages pour regarder les réponses associées</h1>'; ?>
						<div class="styled-select">
							<select id="cat" name="categorie" onchange="cat('resultat')">
							<option value="Politique">Politique</option>
							<option value="Jeux">Jeux</option>
							<option value="Sport">Sport</option>
							<option value="Actualité">Actualité</option>
							<option value="Vie quotidienne">Vie quotidienne</option>
							<option selected disabled value=0 >Regarde uniquement une catégorie</option>
							</select>
						</div>
				
				<?php	$sql = 'SELECT *  FROM sondages  where nb_rempli > 0 ORDER BY id DESC';  
						$req = requete($sql);	
						while ($data = reqfetch($req)) 
						{
							$sql2 = 'SELECT *  FROM membres WHERE id='.$data['id_membre'];  
							$req2 = requete($sql2);	
							while ($data2 = reqfetch($req2)) 
							{
								
								echo '<button onclick="window.location=\'resultat.php?id='.$data['id'].'\';" >'.$data['titre'].'</br><span class="petit">
								proposé par '.$data2['pseudo'].' </span></button>';
							}
						}		
					}
					if(isset($_GET['cat']))
					{	
						echo '<h1>Clic sur un des sondages pour regarder les réponses associées ('.$_GET['cat'].')</h1>'; ?>
						<div class="styled-select">
							<select id="cat" name="categorie" onchange="cat('resultat')">
							<option value="Politique">Politique</option>
							<option value="Jeux">Jeux</option>
							<option value="Sport">Sport</option>
							<option value="Actualité">Actualité</option>
							<option value="Vie quotidienne">Vie quotidienne</option>
							<option selected disabled value=0 >Regarde uniquement une catégorie</option>
							</select>
						</div>
				
				<?php	$sql = 'SELECT *  FROM sondages WHERE categorie ="'.$_GET['cat'].'" AND nb_rempli > 0 ORDER BY id DESC';  
						$req = requete($sql);	
						
						while ($data = reqfetch($req)) 
						{
							$sql2 = 'SELECT *  FROM membres WHERE id='.$data['id_membre'];  
							$req2 = requete($sql2);	
							while ($data2 = reqfetch($req2)) 
							{
								
								echo '<button onclick="window.location=\'resultat.php?id='.$data['id'].'\';" >'.$data['titre'].'</br><span class="petit">
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
		<div class="footer">
			<p>2013 Projet informatique L2 MASS</p>
		</div>
		
		
	</div>
	</body>
</html>