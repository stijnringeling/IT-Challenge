<?php
	include_once("db_connect.inc.php");
	include_once("searchHelper.php");
	$request = $_REQUEST["search"];
	$type = $_REQUEST["type"];
	if(isset($_REQUEST["search"])){
		$return = Array();
		//Geef een array terug van de namen waar de zoekstring in voorkomt als een javascript object (json, anders kan jquery het niet begrijpen)
		if($request != ""){
			$return[0] = getHints($request, $db);
			$return[1] = getCount($request, $db, $type);
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
		//$query = "SELECT * FROM Picklist";
		//$query = "SELECT * FROM picklist WHERE funtie LIKE '$search'";
		$result = "";
		if(!$result = getPicklist($db)){
			echo "Fout in query";
			//echo $db;
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
	
	function getPicklist($db){
		$query = "SELECT * FROM Picklist";
		return mysql_query($query, $db);
	}
	
	function getCount($search, $db, $type){
		$results = search($search, $db, $type);
		$i = 0;
		foreach($results as $result){
			while($content  = mysql_fetch_assoc($result)){
				$i++;
			}
		}
		return $i;
	}
	
?>