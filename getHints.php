<?php
	include("db_connect.inc.php");
	$request = $_REQUEST["search"];
	$hints =[];
	if($request != ""){
		$request = strtolower($request);
		$len = strlen($request);
		$query = "SELECT * FROM Picklist";
		//$query = "SELECT * FROM Picklist WHERE funtie LIKE '$request'";
		$result = "";
		if(!$result = mysql_query($query, $db)){
			echo "Fout in query \"$query\"";
		}else{
	
			while(list($id, $functie) = mysql_fetch_row($result)){
				if(stristr($request, substr($functie, 0, $len)) && strlen($functie) >= strlen($request)){
					$hints[] = $functie;
				}
			}
		}
	}

		//Geef een array terug van de namen waar de zoekstring in voorkomt als een javascript object (json, anders kan jquery het niet begrijpen)
		echo json_encode($hints);
	
?>