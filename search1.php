<?php
	session_start();
	include_once("db_connect.inc.php");
	include_once("getHints.php");
	include_once("searchHelper.php");
	$functies = Array();
?>
<html>
	<head>
	<?php
		$search = $_GET["q"];
		$type = $_GET["type"];
		$results= Array();
		if(isset($_GET["q"], $_GET["type"])){
			$results = search($search, $db, $type);
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
	</head>
	<body>
	
	<?php
		if(sizeof($results) == 0){
		}else{
			echo "<table border=1px>";
			if($type == "R"){
				echo "<tr><td>ID</td><td>Functie</td><td>Opleiding</td><td>Cursussen</td><td>Vaardigheden</td><td>Certificaten</td><td>Skills</td><td>Competenties</td><td>beschikbaar-van</td><td>beschikbaar-tot</td><td>Niet beschikbaar-van</td><td>Niet beschikbaar-tot</td><td>prijsklasse</td></tr>";
			}else{
				echo "<tr><td>ID</td><td>Functie</td><td>Naam</td><td>Plaats</td><td>Startdatum</td><td>Werktijd</td></tr>";
			}
			foreach($results as $result){
				//echo $result;
					while($row = mysql_fetch_assoc($result)){
						if($row["Public"] == 1){
							if($type == "R"){
							echo "<tr><td><a href=\"show.php?ID=" . $row["ID"] . "&type=$type\">" . $row["ID"] . "</a></td><td>" . $functies[$row["Functies"]] . "</td><td>" . $row["Opleiding"] . "</td><td>" . $row["Cursussen"] . "</td><td>" . $row["vaardigheden"] . "</td><td>" . $row["Certificaten_naam"] . "</td><td>" . $row["Skills"] . "</td><td>"  . $row["Competenties"] . "</td><td>" . $row["Beschikbaarheid_van"] . "</td><td>" . $row["Beschikbaarheid_tot"] . "</td><td>" . $row["Niet_Beschikbaarheid_van"] . "</td><td>" . $row["Niet_Beschikbaarheid_tot"] . "</td><td>" . $row["Tarief_p/u"] . "</td></tr>";
							}else{
								$tr = "<tr><td><a href=\"show.php?ID=" . $row["ID"] . "&type=$type\">" . $row["ID"] . "</a></td><td>";
								for($i= 1; $i <= 10; $i++){
									if($functies[$row["Functie$i"]] != ""){
										$tr .= $functies[$row["Functie$i"]];
									}
								}
								$tr .= "</td>";
								$tr .= "<td>" . $row["Naam"] . "</td>";
								$tr .= "<td>" . $row["Plaats"] . "</td>";
								$tr .= "<td>" . $row["Startdatum"] . "</td>";
								$tr .= "<td>" . $row["Uren"] . "</td>";
								$tr .= "</tr>";
								echo $tr;
							}
						}
					}
				}
			echo "</table>";
		}
	?>
	</body>
</html>