<?php
	//bestand met connectie info voor verbing met de server.
	//variabelen initialiseren.
	$server = "localhost";
	$user = "ITchallenge";
	$password = "ITchallenge";
	$database = "ITchallenge";
	$query = "";
	if(!$db = mysql_connect($server, $user, $password)){
		echo "Geen verbinding met de server";
	}else{
		if(!mysql_select_db($database,$db)){
			echo "Geen verbinding met de database";
		}else{
			
		}
	}
?>