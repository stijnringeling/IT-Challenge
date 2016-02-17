<?php
	include("db_connect.inc.php");
	$request = $_REQUEST["search"];
	if(isset($_REQUEST["search"])){
		//Geef een array terug van de namen waar de zoekstring in voorkomt als een javascript object (json, anders kan jquery het niet begrijpen)
		echo json_encode(getHints($request, $db));
	}

		
	function getHints($search, $db){
		$hints = Array();
		$search = strtolower($search);
		$len = strlen($search);
		$query = "SELECT * FROM picklist";
		//$query = "SELECT * FROM picklist WHERE funtie LIKE '$search'";
		$result = "";
		if(!$result = mysql_query($query, $db)){
			echo "Fout in query \"$query\"";
			echo $db;
		}else{
			$i = 0;
			while(list($id, $functie) = mysql_fetch_row($result)){
				if(stristr($search, substr($functie, 0, $len)) && strlen($functie) >= strlen($search)){
					$hints[$i] = $functie;
					$i++;
				}
			}
		}
		return $hints;
	}
	
?>