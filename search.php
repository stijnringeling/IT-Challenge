<html>
	<head>
	<?php
		include("db_connect.inc.php");
		$search = $_GET["q"];
		$query = "SELECT * FROM Resources";
		$result = "";
		if(!$result = mysql_query($query, $db)){
			echo "Error in query $query";
		}
	?>
	</head>
	<body>
	<?php
		if(!result){
		}else{
			while($row = mysql_fetch_assoc($result)){
				echo $row["ID"];
			}
		}
	?>
	</body>
</html>