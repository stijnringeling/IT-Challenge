<?php
	session_start();
	include_once("db_connect.inc.php");
	include_once("User.php");
	if(isset($_SESSION["logged_in"], $_SESSION["sessionID"]) && $_SESSION["logged_in"] == true){
		$user = new User($_SESSION["sessionID"], $db);
	}
	$functies = Array();
	$errors = "";
?>
<html>
	<head>
		<?php
			if(isset($_GET["ID"], $_GET["type"])){
				if($_GET["type"] == "R"){
					$query = "SELECT * FROM Resources_goed WHERE ID = " . $_GET["ID"];
					if(isset($user->ID)){
						$query2 = "SELECT * FROM betalingen_resources INNER JOIN naw_resources ON naw_ID = ID WHERE user_id = " . $user->ID . " AND naw_ID = " . $_GET["ID"];
					}
				}else{
					$query = "SELECT * FROM projecten INNER JOIN functies ON ID = functie_ID WHERE ID = " . $_GET["ID"];
					if(isset($user->ID)){
						$query2 = "SELECT * FROM betalingen_projecten INNER JOIN naw_projecten ON naw_ID = ID WHERE user_ID = " . $user->ID . " AND naw_ID = " . $_GET["ID"];
					}
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
				if(isset($query2)){
					$result2 = "";
					if(!$result2 = mysql_query($query2, $db)){
						$errors .= "error in query $query2";
					}
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
							if($key != "Public" && $key != "functie_ID" && $key != "user_ID"){
								echo "$key: $value<br/>";
							}
						}
					}
				}
				$userCorrect = false;
				if(isset($result2)){
					while($row = mysql_fetch_assoc($result2)){
						$userCorrect = true;
						foreach($row as $key => $value){
							if($key == "Bstaat"){
								$key = "Burgerlijke staat";
							}
							if($key == "Rijbewijs"){
								$value = $value == 1 ? "Ja" : "Nee";
							}
							if($key != "ID" && $key != "user_ID" && $key != "naw_ID"){
								echo "$key: $value<br/>";
							}
						}
					}
					if(!$userCorrect){
						echo "Om de NAW gegevens te zien moet u ze kopen";
					}
				}else{
					echo "Log in om NAW gegevens te kunnen zien";
				}
			}
		?>
	</body>
</html>