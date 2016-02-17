<html>
	<head>
	<?php
		include("db_connect.inc.php");
		include("getHints.php");
		$search = $_GET["q"];
		$functies = getHints($search, $db);
		$querys = Array();
		
		foreach($functies as $functie){
			$querys[] = "SELECT * FROM Resources WHERE Functies = (SELECT ID FROM Picklist WHERE functie LIKE \"" . $functie . "\")";
		}
		$results = Array();
		foreach($querys as $query){
			if(!$result = mysql_query($query, $db)){
				echo "Error in query $query";
			}else{
				$results[] = $result;
			}
		}
	?>
	</head>
	<body>
	<?php
		if(sizeof($results) == 0){
		}else{
			foreach($results as $result){
				//echo $result;
				while($row = mysql_fetch_assoc($result)){
					echo $row["ID"] . "<br/>";
				}
			}
		}
	?>
	</body>
</html>