<html>
<head>
<?php
	//bestand met connectie info voor verbing met de server.
	//variabelen initialiseren.
	$server = "localhost";
	$user = "ITchallenge";
	$password = "ITchallenge";
	$database = "ITchallenge";
	$query = 	"SELECT 
			n.ID
			n.achternaam
			rt.hond
			rt.auto
			FROM NAW AS n
			INNER JOIN Rescourse_test as rt
			ON n.id = rt.id";
if (!$db =mysql_connect($server, $user, $password)){
	$boodschap = "<h2>De verbinding met de databaseserver is mislukt!</h2>";
}
else{
	$boodschap = "<h2>De verbinding met de databaseserver is tot stand gebracht.</h2><br/>";
	
	if(!mysql_select_db($database)){
		$boodschap .="... maar de database \"database\"kon niet worden gevonden!";
	}
	else{
		$boodschap .="en de database \"$database\"is geselecteerd";
		if(!$resultaat = mysql_query($query, $db)){
			$boodschap .="</br>... maar de query \"$query\" kon niet worden uitgevoerd!";
		}
		else{
			$boodschap .= "</br>De query \"$query\" is met succes uitgevoerd";
		}
	}
}
?>
</head>
<body>
	<?php echo $boodschap; ?></br>
	<p>Deze gegevens zijngevonden: </p>
	<hr>
	<?php while(list($ID, $achternaam, $hond, $auto)= mysql_fetch_row($resultaat)){
		echo "$ID - $achternaam - $hond - $auto";
	}
	?>
</body>
</html>
