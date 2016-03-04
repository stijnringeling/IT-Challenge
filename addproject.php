<?php
if(!empty($_POST)){
	$server = "localhost";
	$user = "ITchallenge";
	$password = "ITchallenge";
	$database = "ITchallenge";
	$query = "";

$db= mysql_connect($server, $user, $password);
mysql_select_db($database);

$query = "INSERT users (User_id, Username, Password) ";
$query .= "VALUES ('";
$query .= $_POST["User_id"]."','";
$query .= $_POST["Username"]."','";
$query .= $_POST["Password"]."','";
$query .= $_POST["Email"]."')";


if(!mysql_query($query)){
	echo "Er is een fout opgetreden met nummer ". mysql_errno().":" . mysql_error();
	echo $query;
	mysql_close($db);
	exit;
}
else{
	$bedankt .="?id=". mysql_insert_id($db);
	mysql_close($db);
header("location:$bedankt");
	}
}
else{
	?>
	
<html>
<head>
<title>Account registration</title>
</head>
<body>
<h2>Add user</h2>
<form method="post" id="addproject" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"] ?>"><table>
<tr><td>Projectnaam: </td><td><input type="text" name="P_naam"></td></tr>
<tr><td>Omschrijving: </td><td><textarea name="Omschrijving" form="addproject"  ROWS=3 COLS=22></textarea></td></tr>
<tr><td>Plaats: </td><td><input type="text" name="Plaats"></td></tr>
<tr><td>Startdatum: </td><td><input type="text" name="S_datum"></td></tr>
<tr><td>Einddatum: </td><td><input type="text" name="E_datum"></td></tr>
<tr><td>Functie: </td><td><input type="text" name="Functie"></td></tr>
<tr><td>Omschrijving van de werkzaamheden: </td><td><textarea name="W_omschrijving" form="addproject"  ROWS=3 COLS=22></textarea></td></tr>
<tr><td>Vaardigheden: </td><td><input type="text" name="Vaardigheden"></td></tr>
<tr><td>Skills: </td><td><input type="text" name="Skills"></td></tr>
<tr><td>Omvang: </td><td><input type="text" name="Omvang"></td></tr>
<tr><td>Functie startdatum: </td><td><input type="text" name="F_start"></td></tr>
<tr><td>Functie einddatum: </td><td><input type="text" name="F_eind"></td></tr>
<tr><td>Bestand toevoegen: </td><td><input type="file" name="photo" size="25" /></td></tr>
<tr><td>Public: </td><td><input type="radio" name="Public" value="Ja" checked> Ja</td><td><input type="radio" name="Public" value="Nee" checked> Nee</td></tr></table>
<input type="submit" name="Verzenden">
<input type="reset" name="Leegmaken">
<hr>
</form>
</body>
</html>
<?php
	}
?>