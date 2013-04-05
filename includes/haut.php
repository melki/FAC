
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titre; ?></title>
		<meta name="description" content="Projet d'informatique L2 MASS">
		<link href="css/design.css" rel="stylesheet">
		<LINK REL="SHORTCUT ICON" href="img/icon.png">
		<SCRIPT language="Javascript">
		
				function cacher()
				{
					var cach= document.getElementById('popup');
					cach.style.visibility = "hidden";	
				
				}
				
				function back()
				{
					history.go(-1);
				}	
				
				function cat(page)
				{
					
					var select = document.getElementById('cat');
					var valeur = select.options[select.selectedIndex].value;
					window.location=page+'.php?cat='+valeur;
				}
				
				function affQuestion(id)
				{	
					var select = document.getElementById(id);
					var valeur = select.options[select.selectedIndex].value;
					var zonequestion = document.getElementById('question');
					var i=1;
					var contenu = "";
					for(i=1;i<=valeur;i++)
					{
						contenu = contenu + "<div id=question'"+i+"'> <input type='text' name='titreQuestion"+i+"' placeholder='La question "+i+"' required=''>"+
						"<div class='styled-select'>"+
						"<select name='typeQuestion"+i+"' id='typeQuestion"+i+"' onchange='affType("+i+")'>"+
						"<option value='1'>Choix multiple</option>"+
						"<option value='2'>Choix unique</option>"+
						"<option value='3'>Réponse écrite</option>"+
						"<option selected disabled>Type de la question</option> </select> </div><div id='type"+i+"'></div></div>";
						contenu= contenu + "<br>";
					}
					zonequestion.innerHTML=contenu;
				}
				
				function affType(idQuestion)
				{
					var select = document.getElementById("typeQuestion"+idQuestion);
					var valeur = select.options[select.selectedIndex].value;
					var zonetype = document.getElementById('type'+idQuestion);
					var contenu = "";
					if(valeur==1 || valeur == 2)
					{
						var liste="";
						var a=1;
						for(a=1;a<=10;a++)
						{
							liste=liste + "<option value='"+a+"'>"+a+"</option>";
						}
						contenu = contenu + ""+
						"<div class='styled-select'>"+
						"<select name='nbChoix"+idQuestion+"' id='nbChoix"+idQuestion+"' onchange='affChoix("+idQuestion+")'>"+liste+
						"<option selected disabled value=0>Nombre de choix possible</option> </select> </div> <div id='choix"+idQuestion+"'></div>";
					}
					
					
					zonetype.innerHTML=contenu;
					
				
				}
				function affChoix(id)
				{
					var select = document.getElementById("nbChoix"+id);
					var valeur = select.options[select.selectedIndex].value;
					var zonechoix = document.getElementById('choix'+id);
					var i=1;
					var contenu = "";
					for(i=1;i<=valeur;i++)
					{
						contenu = contenu + "<div > <input type='text' name='question"+id+"choix"+i+"' placeholder='Le choix "+i+"' required=''>"+
						"</div>";
					}
						contenu= contenu + "<br>";
					zonechoix.innerHTML=contenu;
				}
				
			</SCRIPT>
		
    </head>
 
    <body>