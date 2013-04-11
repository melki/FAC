<?php
	session_start();
	include 'includes/fonctions.php';
	// on vérifie tout et on envoie la réponses  sur la BDD
	if(isset($_POST['sondage_id']))
	{
		$id=$_POST['sondage_id'];
		$sql = 'SELECT *  FROM sondages WHERE id = "'.$id.'"';  
		$req = requete($sql);	
		while ($data = reqfetch($req)) 
		{
			$nb_question=$data['nb_question'];
			$id_membre=$data['id_membre'];
			$titre=$data['titre'];
			$i=1;
			$j=1;
			for($i=1;$i<=$nb_question;$i++)
			{
				$reponse[$i]="";	
				if(!isset($_POST['reponse'.$i]))
				{
					echo"<script type='text/javascript'> history.go(-1);</script>";
				}
				foreach($_POST['reponse'.$i] as $checkbox)
				{
					$reponse[$i]=$reponse[$i]." ".$checkbox;
					$reponse[$i]=stripslashes($reponse[$i]);

				}
			}
			for($j=$nb_question+1;$j<=10;$j++)
			{
				$reponse[$j]='none';
			}
						
			$sql2='INSERT INTO reponse VALUES("","'.$id.'","'.$id_membre.'","'.$nb_question.'","'.$reponse[1].'","'.$reponse[2].'","'.$reponse[3].'","'.$reponse[4].'","'.$reponse[5].'","'.$reponse[6].'","'.$reponse[7].'","'.$reponse[8].'","'.$reponse[9].'","'.$reponse[10].'")';
			$req2 = requete($sql2);	
			if(isset($_SESSION['pseudo']))
			{
				$_SESSION['nb_reponses']=$_SESSION['nb_reponses']+1;
				$sql3='UPDATE membres set nb_reponses="'.$_SESSION['nb_reponses'].'" WHERE pseudo="'.$_SESSION['pseudo'].'" ';
				$req3=requete($sql3);
			} 
				$nb_repondu=$data['nb_rempli']+1;
				$sql4='UPDATE sondages set nb_rempli="'.$nb_repondu.'" WHERE id="'.$id.'" ';
				$req4=requete($sql4);
				
			//une fois la réponse envoyé on prévient l'user qui a posté le sondage si tel était son désir (ou pas) lors de l'inscription
			$sql='SELECT * FROM membres WHERE id = "'.$id_membre.'"';	
			$req=requete($sql);
			while ($data = reqfetch($req)) 
			{
				$mail=$data['mail'];
				$pseudo=$data['pseudo'];


			}
			$objet="Vous avez une nouvelle réponse ! ";
			$content="Vous avez une nouvelle réponse pour votre sondage intitulé '".$titre."' ! 
Venez consulter toutes les réponses ici : http://fool-concept.fr/FAC/resultat.php?id=".$id."


Encore un grand merci de la part de l'équipe du site. ";
			mail($mail, $objet, $content);
			 header("Location: resultat.php");
		}	
	}
	else
	{
		echo"<script type='text/javascript'> history.go(-1);</script>";
	}
	
?>