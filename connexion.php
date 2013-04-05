<?php
 session_start(); 
 include 'includes/fonctions.php';
 if(isset($_POST['pseudo'])&&isset($_POST['mdp']))
	{
		$pseudo=$_POST['pseudo'];
		$mdp=$_POST['mdp'];
		$sql = 'SELECT *  FROM membres WHERE pseudo="'.$pseudo.'"';  // on check si les pseudo n'est pas déjà dans la bdd
		$req = requete($sql);	
		$u=0;
				while ($data = reqfetch($req)) 
						{
							if (crypt($mdp, $data['mdp']) == $data['mdp']) 
								{
									$_SESSION['pseudo']=$pseudo;
									$_SESSION['id']=$data['id'];
									$_SESSION['nb_sondages']=$data['nb_sondages'];
									$_SESSION['nb_reponses']=$data['nb_reponses'];
												
									header('Location:index.php');
								}
							
						}					
		
	}
			header('Location:index.php?erreur=1');
	
	
?>