<html>
<head></head>
<body>

	<form method="post" action="http://projet.massl2.free.fr/traitements/traitement_commentaire.php">
						<label>Notez ce film : </label><select name="note" id="note">
							<option value="-1">---</option>
							<option value="0">0/5</option>
							<option value="1">1/5</option>
							<option value="2">2/5</option>
							<option value="3">3/5</option>
							<option value="4">4/5</option>
							<option value="4.43434343434">25/5</option>
						</select><br>
						<input type="hidden" id="film" name="film" value="Captain America - First Avenger -">

						<p>Ecrivez votre commentaire :</p>
						<textarea type="texte" name="critique" class="critique"></textarea><br>
						<input type="submit" value="Envoyez votre critique" class="valider" id="envoie_critique"/>
						</form>
						<form method="post" action="http://projet.massl2.free.fr/traitements/traitement_connection.php">
					<fieldset class="formulaire">
						<table>
							<tr><td><label>Identifiant :</label></td><td><input type="text" name="pseudo" id="pseudo"></td></tr>	
							<tr><td><label>Mot de passe :</label></td><td><input type="password" name="password" id="password"></td></tr>
						</table>
						<input class="valider" type="submit" value="Me connecter" name="valider">
					</fieldset>
				</form>


</body>

</html>