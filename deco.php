 <?php 
 // on ouvre la session
 session_start(); 
 
 //on vire toute les variables
 session_unset(); 
 
 // destroy all the sessions !
 
 session_destroy();  
header('Location:index.php'); // retour à la case départ
 ?> 