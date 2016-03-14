<?php
	include_once("db_connect.inc.php");
	include_once("getHints.php");
	include_once("searchHelper.php");
	$functies = Array();
?>
<html>
	<head>
	<?php
		$search = $_GET["q"];
		$results= Array();
		if(isset($_GET["q"])){
			$results = search($search, $db);
		}
		$functie_query = "SELECT * FROM Picklist";
		if(!$functie_result = mysql_query($functie_query, $db)){
			echo "Error in query " . $functie_query;
		}else{
			while($functie = mysql_fetch_assoc($functie_result)){
				$functies[$functie["ID"]] = $functie["functie"];
			}
		}
	?>
	<link rel="stylesheet" type="text/css" href="index.css">
	</head>
	<body>
	<div class="header">
		<a href="index.php"><div id="homebutton" class="headerbutton">
Home
		</div></a>
		<div id="addprojectbutton" class="headerbutton">
Project toevoegen
		</div>
		<div id="addresourcebutton" class="headerbutton">
Resource toevoegen
		</div>
		<a href="login.php"><div id="inlogbutton" class="headerbutton">
Inloggen
		</div></a>
		</div>
	<?php
		if(sizeof($results) == 0){
		}else{
			echo "<table border=1px>";
			echo "<tr><td>ID</td><td>Functie</td><td>Opleiding</td><td>Cursussen</td><td>Vaardigheden</td><td>Certificaten</td><td>Skills</td><td>Competenties</td><td>beschikbaar-van</td><td>beschikbaar-tot</td><td>Niet beschikbaar-van</td><td>Niet beschikbaar-tot</td><td>prijsklasse</td></tr>";
			foreach($results as $result){
				//echo $result;
				while($row = mysql_fetch_assoc($result)){
					echo "<tr><td><a href=\"show.php?ID=" . $row["ID"] . "\">" . $row["ID"] . "</a></td><td>" . $functies[$row["Functies"]] . "</td><td>" . $row["Opleiding"] . "</td><td>" . $row["Cursussen"] . "</td><td>" . $row["vaardigheden"] . "</td><td>" . $row["Certificaten_naam"] . "</td><td>" . $row["Skills"] . "</td><td>"  . $row["Competenties"] . "</td><td>" . $row["Beschikbaarheid_van"] . "</td><td>" . $row["Beschikbaarheid_tot"] . "</td><td>" . $row["Niet_Beschikbaarheid_van"] . "</td><td>" . $row["Niet_Beschikbaarheid_tot"] . "</td><td>" . $row["Tarief"] . "</td></tr>";
				}
			}
			echo "</table>";
		}
	?>
	</body>
</html>