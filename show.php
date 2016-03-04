<?php
	include_once("db_connect.inc.php");
	include_once("User.php");
	$user = new User("1234", $db);
	$functies = Array();
	$errors = "";
?>
<html>
	<head>
		<?php
			if(isset($_GET["ID"])){
				$query = "SELECT * FROM resources_goed WHERE ID = " . $_GET["ID"];
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
			echo $user->ID;
			if($result != ""){
				while($row = mysql_fetch_assoc($result)){
					foreach($row as $key => $value){
						if($key == "Functies"){
							$value = $functies[$value];
						}
						if($key != "Public"){
							echo "$key: $value<br/>";
						}
					}
				}
			}
		?>
	</body>
</html>