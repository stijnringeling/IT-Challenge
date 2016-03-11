<?php
	include_once("db_connect.inc.php");
	include_once("User.php");
	$functies = Array();
	$errors = "";
?>
<html>
	<head>
		<?php
			if(isset($_GET["ID"], $_GET["type"])){
				if($_GET["type"] == "R"){
					$query = "SELECT * FROM Resources_goed WHERE ID = " . $_GET["ID"];
				}else{
					$query = "SELECT * FROM projecten INNER JOIN functies ON ID = functie_ID WHERE ID = " . $_GET["ID"];
				}
				$functie_query = "SELECT * FROM Picklist";
				if(!$functie_result = mysql_query($functie_query, $db)){
					$errors  .= "Error";
				}
				while($row = mysql_fetch_assoc($functie_result)){
					$functies[$row["ID"]] = $row["functie"];
				}
				$result = "";
				if(!$result = mysql_query($query, $db)){
					$errors .=  "error in query " . $query;
				}
			}
		?>			
	</head>
	<body>
		<?php
			echo $errors;
			if($result != ""){
				while($row = mysql_fetch_assoc($result)){
					foreach($row as $key => $value){
						if($value != ""){
							if($key == "Functies"){
								$value = $functies[$value];
							}
							for($i = 1; $i <= 10; $i++){
								if($key == "Functie$i"){
									$value = $functies[$value];
								}
							}
							if($key == "Fulltime"){
								$value = $value == 1 ? "Ja" : "Nee";
							}
							if($key != "Public" && $key != "functie_ID"){
								echo "$key: $value<br/>";
							}
						}
					}
				}
			}
		?>
	</body>
</html>