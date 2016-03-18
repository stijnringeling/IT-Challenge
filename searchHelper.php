<?php
	include_once("db_connect.inc.php");
	include_once("getHints.php");
	function search($search, $db, $type){
		$functies = getHints($search, $db);
		$querys = Array();
		if($type == "R"){
		foreach($functies as $functie){
				$querys[] = "SELECT * FROM Resources_goed WHERE Functies = (SELECT ID FROM Picklist WHERE functie LIKE \"" . $functie . "\")";
				//echo "SELECT * FROM Resources_goed WHERE Functies = (SELECT ID FROM Picklist WHERE functie LIKE \"" . $functie . "\")";
		}
		}else{
			//echo "Projects";
			$Picklist = getPicklist($db);
			while(list($id, $functie) = mysql_fetch_row($Picklist)){
				if(stristr($search, substr($functie, 0, strlen($search))) && strlen($functie) >= strlen($search)){
					$query = "SELECT * FROM projecten INNER JOIN functies ON ID = functie_ID WHERE ";
					for($i = 1; $i<=10; $i++){
						if($i != 10){
							$query .= "Functie$i = $id OR ";
						}else{
							$query .= "Functie$i = $id";
						}
					}
					$querys[] = $query;
					echo $query;
				}
			}
			
		}
		$results = Array();
		foreach($querys as $query){
			if(!$result = mysql_query($query, $db)){
				echo "Error in query $query";
			}else{
				$results[] = $result;
				//echo $result;
			}
		}
		return $results;
	}
?>
