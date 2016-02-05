<html>
<head>
<?php
	//bestand met connectie info voor verbing met de server.
	//variabelen initialiseren.
	include("db_connect.inc.php");
	$query = 	"SELECT 
			n.ID
			n.achternaam
			rt.hond
			rt.auto
			FROM NAW AS n
			INNER JOIN Rescourse_test as rt
			ON n.id = rt.id";
	$resultaat = "";
	if(!$resultaat = mysql_query($query, $db)){
		echo "de query \"$query\" kon niet worden uitgevoerd!";
	}
	else{
		echo "De query \"$query\" is met succes uitgevoerd";
	}
?>
</head>
<body>
	<p>Deze gegevens zijngevonden: </p>
	<hr>
	<?php while(list($ID, $achternaam, $hond, $auto)= mysql_fetch_row($resultaat)){
		echo "$ID - $achternaam - $hond - $auto";
	}
	?>
</body>
</html>
