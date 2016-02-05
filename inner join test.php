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
			FROM NAW AS n, 
			Resource_test AS rt 
			WHERE n.ID = rt.ID";
	$resultaat = "";
	if(!$resultaat = mysqli_query($db, $query)){
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
	<?php while($row = mysqli_fetch_assoc($resultaat)){
		echo $row["ID"] ." - ". $row["Achternaam"] ." - ". $row["Hone"] ." - ". $row["Auto"];
	}
	?>
</body>
</html>
