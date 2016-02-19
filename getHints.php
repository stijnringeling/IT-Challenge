<?php
	include_once("db_connect.inc.php");
	include_once("searchHelper.php");
	$request = $_REQUEST["search"];
	if(isset($_REQUEST["search"])){
		$return = Array();
		//Geef een array terug van de namen waar de zoekstring in voorkomt als een javascript object (json, anders kan jquery het niet begrijpen)
		if($request != ""){
			$return[0] = getHints($request, $db);
			$return[1] = getCount($request, $db);
		}else{
			$return[0] = Array();
			$return[1] = 0;
		}
		echo json_encode($return);
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
	
	function getCount($search, $db){
		$results = search($search, $db);
		$i = 0;
		foreach($results as $result){
			while($content  = mysql_fetch_assoc($result)){
				$i++;
			}
		}
		return $i;
	}
	
?>