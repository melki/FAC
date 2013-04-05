<?php

		
				include 'sql.php'; 
				
			   function connectoi() {
						   global $connSQL;
						   if(function_exists("mysqli_connect")) {
								   $connSQL['conn']=@mysqli_connect($connSQL['hote'],$connSQL['util'],$connSQL['pass'],$connSQL['base'])
			or die();
						   } else {
								   $connSQL['conn']=@mysql_connect($connSQL['hote'],$connSQL['util'],$connSQL['pass'])
			or die();
								   @mysql_select_db($connSQL['base'],$connSQL['conn']);
						   }
						   return $connSQL['conn'];
			   }
			    
						
			   function requete($requete) {
				   global $connSQL;

			
						   if(function_exists("mysqli_query")) {
							   $resultat=@mysqli_query($connSQL['conn'],$requete) or
			die("<font color=\"#AD0018\"><b>$requete<br>erreur</b></font>");
						   } else {
							   $resultat=@mysql_query($requete) or die("<font
			color=\"#AD0018\">".erreur(3)."</b></font>");
						   }
				   

				   return $resultat;
			   }

			   function reqfetch($resultat) {
				   if(function_exists("mysqli_fetch_array")) {
					   return mysqli_fetch_array($resultat);
				   } else {
					   return mysql_fetch_array($resultat);
				   }
			   }
					connectoi();
					