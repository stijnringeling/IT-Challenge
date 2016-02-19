<?php
	include_once("db_connect.inc.php");
	include_once("getHints.php");
	include_once("searchHelper.php");
	
?>
<html>
	<head>
	<?php
		$search = $_GET["q"];
		$results= Array();
		if(isset($_GET["q"])){
			$results = search($search, $db);
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