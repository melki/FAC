<?php session_start(); 
if(!isset($_SESSION['pseudo'])){header('Location:index.php');}
$titre="Sondages";
include 'includes/haut.php';
include 'includes/menu.php';
include 'includes/fonctions.php';
?>
		<div class="contenu">
			<div class="corps">
				<?php
				
					if(isset($_POST['titre_sondage']) && isset($_POST['categorie']) && isset($_POST['nb_questions'])
					&& $_POST['titre_sondage']!=" " && isset($_POST['categorie'])!=0 && isset($_POST['nb_questions'])!=0)
					{
						$erreur="Les erreurs suivantes sont apparues :";
						$n=$_POST['nb_questions'];
						$titre=$_POST['titre_sondage'];
						$cat=$_POST['categorie'];
						
						$sql = 'SELECT *  FROM sondages WHERE titre="'.$titre.'"';  // on check si le titre n'est pas déjà dans la bdd
						$req = requete($sql);	
						$u=0;
						while ($data = reqfetch($req)) 
						{
							$u++;
						}					
						if($u>0) {$erreur = $erreur."<br> Ce titre existe déjà : ".$titre."<br>" ;}
						$i=1;
						
						for($i=1;$i<=$n;$i++)
							{	
								$titreQuestion[$i]=$_POST['titreQuestion'.$i];	
								$typeQuestion[$i]=$_POST['typeQuestion'.$i];
								
								if(isset($_POST['typeQuestion'.$i])&&$_POST['typeQuestion'.$i]==1 || $_POST['typeQuestion'.$i]==2)
								{$nbChoix[$i]=$_POST['nbChoix'.$i];}
								
								
								if(!isset($titreQuestion[$i])){$erreur = $erreur."<br> Il manque le titre: ".$i;}
								if(!isset($typeQuestion[$i])){$erreur = $erreur."<br> Vous n'avez pas précisé le type de la question: ".$i;}
								if($typeQuestion[$i]==1 || $typeQuestion[$i]==2){
								if(isset($nbChoix[$i]) && $nbChoix[$i]!= 0)
								{
									$n2=$nbChoix[$i];
									$j=1;
									for($j=1;$j<=$n2;$j++)
									{	
										$choix[$i][$j]=$_POST['question'.$i.'choix'.$j];
										if(!isset($choix[$i][$j])){$erreur = $erreur."<br> Il manque le choix: ".$j." de la question ".$i;}
									}
								}
								}
							}
						
						
						
					
					
						if($erreur=="Les erreurs suivantes sont apparues :")
						{
							//on ajoute le sondage dans la bdd
							$sql = 'INSERT INTO sondages VALUES ("", "'.$titre.'","'.$_SESSION['id'].'", "'.$n.'", "'.$cat.'",NOW(), 0)'; 
							$req = requete($sql); 
							$_SESSION['nb_sondages']=$_SESSION['nb_sondages']+1;
							
							$sql = 'UPDATE  membres set nb_sondages = "'.$_SESSION['nb_sondages'].'" WHERE pseudo = "'.$_SESSION['pseudo'].'"'; 
							$req = requete($sql); 	
							
							$sql = 'SELECT *  FROM sondages WHERE titre="'.$titre.'"';
							$req = requete($sql);
							while ($data = reqfetch($req)) 
							{
								$id_sondage=$data['id'];
							}		
							$i=1;
							for($i=1;$i<=$n;$i++)
							{	
								$titreQuestion[$i]=$_POST['titreQuestion'.$i];	
								$typeQuestion[$i]=$_POST['typeQuestion'.$i];	
								// puis chacune des quastions
								$sql = 'INSERT INTO question VALUES ("", "'.$id_sondage.'","'.$i.'", "'.$typeQuestion[$i].'", "'.$titreQuestion[$i].'")'; 
								$req = requete($sql);
								
								if($_POST['typeQuestion'.$i]==1 || $_POST['typeQuestion'.$i]==2)
								{	$nbChoix[$i]=$_POST['nbChoix'.$i];
									$sql = 'SELECT *  FROM question ORDER BY id DESC LIMIT 0,1 ';
									$req = requete($sql);
									while ($data = reqfetch($req)) 
									{
										$id_question=$data['id'];
										
									}
									
									$n2=$nbChoix[$i];
									
									$j=1;
									for($j=1;$j<=$n2;$j++)
									{	
											$choix[$i][$j]=$_POST['question'.$i.'choix'.$j];
											
									}
									for($j=$n2+1;$j<=10;$j++)
									{	
										$choix[$i][$j]="a";
									}

								// et enfin chaque choix pour chaque question (s'il y a des choix)
								$sql = 'INSERT INTO multiple VALUES ("", "'.$id_question.'","'.$n2.'", "'.$choix[$i][1].'", "'.$choix[$i][2].'", "'.$choix[$i][3].'", "'.$choix[$i][4].'", "'.$choix[$i][5].'", "'.$choix[$i][6].'", "'.$choix[$i][7].'", "'.$choix[$i][8].'", "'.$choix[$i][9].'", "'.$choix[$i][10].'")'; 
								$req = requete($sql);
								}	
								
								$erreur="Sondage ajouté avec succès";
							}
						}
						echo $erreur;
						echo '<button  onclick="back()" >Recommencer</button>';
							
					}
				
				
				
				?>
				<form id="signup" method="POST" action="" enctype="multipart/form-data">
				
					<input type="text" name="titre_sondage" placeholder="Le titre du sondage" required="">
					<div class="styled-select">
						<select  name="categorie">
						<option value="Politique">Politique</option>
						<option value="Jeux">Jeux</option>
						<option value="Sport">Sport</option>
						<option value="Actualité">Actualité</option>
						<option value="Vie quotidienne">Vie quotidienne</option>
						<option selected disabled value=0 >Catégorie</option>
						</select>
					</div>
					
					<div class="styled-select">
						<select id="nb_question" name="nb_questions" onchange="affQuestion('nb_question')">
						<option value=0  selected disabled>Nombre de questions</option>
							<?php
								$i=1;
								for($i=1;$i<=10;$i++)
								{
									echo "<option  value='".$i."'>".$i."</option>";
						
								}
							?>
						</select>
					</div>
					<div id="question">
					
					
					</div>
					<button type="submit">Envoyer le sondage !</button>	
				</form>
				
				
				
			</div>
			<div class="barredroite">
				
			
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
		
	
		
		
	</div>
	</body>
</html>
