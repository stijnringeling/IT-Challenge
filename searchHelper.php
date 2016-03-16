<?php
	include_once("db_connect.inc.php");
	include_once("getHints.php");
	function search($search, $db){
		$functies = getHints($search, $db);
		$querys = Array();
		
		foreach($functies as $functie){
			$querys[] = "SELECT * FROM Resources_goed WHERE Functies = (SELECT ID FROM Picklist WHERE functie LIKE \"" . $functie . "\")";
		}
		$results = Array();
		foreach($querys as $query){
			if(!$result = mysql_query($query, $db)){
				echo "Error in query $query";
			}else{
				$results[] = $result;
			}
		}
		return $results;
	}
?>