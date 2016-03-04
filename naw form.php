<?php
if(!empty($_POST)){
	$server = "localhost";
	$user = "ITchallenge";
	$password = "ITchallenge";
	$database = "ITchallenge";
	$query = "";

$db= mysql_connect($server, $user, $wachtwoord);
mysql_select_db($database);

$query = "INSERT Resources (voornaam, achternaam, email, cijfer) ";
$query .= "VALUES ('";
$query .= $_POST["Achternaam"]."','";
$query .= $_POST["Voorvoegsel"]."','";
$query .= $_POST["Voorletters"]."','";
$query .= $_POST["Voornamen"]."','";
$query .= $_POST["Roepnaam"]."','";
$query .= $_POST["Woonadres"]."','";
$query .= $_POST["Postcode"]."','";
$query .= $_POST["Plaats"]."','";
$query .= $_POST["Land"]."','";
$query .= $_POST["Thuis_nr"]."','";
$query .= $_POST["Werk_nr"]."','";
$query .= $_POST["Mobiel_nr"]."','";
$query .= $_POST["Email1"]."','";
$query .= $_POST["Email2"]."','";
$query .= $_POST["Geboortedatum"]."','";
$query .= $_POST["Geboorteplaats"]."','";
$query .= $_POST["Nationaliteit"]."','";
$query .= $_POST["B_staat"]."','";
$query .= $_POST["Rijbewijs"]."','";
$query .= $_POST["Auto"]."')";

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
<title>register</title>
</head>
<body>
<h2>resource toevoegen </h2>
<form method="post" id="resform" action="<?php echo $_SERVER["PHP_SELF"] ?>"><table>
<tr><td>Achternaam: </td><td><input type="text" name="Achternaam"></td></tr>
<tr><td>Voorvoegsel: </td><td><input type="text" name="Voorvoegsel"></td></tr>
<tr><td>Voorletters: </td><td><input type="text" name="Voorletters"></td></tr>
<tr><td>Voornamen: </td><td><input type="text" name="Voornamen"></td></tr>
<tr><td>Roepnaam: </td><td><input type="text" name="Roepnaam"></td></tr>
<tr><td>Woonadres: </td><td><input type="text" name="Woonadres"></td></tr>
<tr><td>Postcode: </td><td><input type="text" name="Postcode"></td></tr>
<tr><td>Plaats: </td><td><input type="text" name="Plaats"></td></tr>
<tr><td>Land: </td><td><input type="text" name="Land"></td></tr>
<tr><td>Telefoon thuis: </td><td><input type="text" name="Thuis_nr"></td></tr>
<tr><td>Telefoon werk: </td><td><input type="text" name="Werk_nr"></td></tr>
<tr><td>Telefoon Mobiel: </td><td><input type="text" name="Mobiel_nr"></td></tr>
<tr><td>E-mail 1: </td><td><input type="text" name="Email1"></td></tr>
<tr><td>E-mail 2: </td><td><input type="text" name="Email2"></td></tr>
<tr><td>Geboortedatum: </td><td><input type="text" name="Geboortedatum"></td></tr>
<tr><td>Geboorteplaats: </td><td><input type="text" name="Geboorteplaats"></td></tr>
<tr><td>Nationaliteit: </td><td><input type="text" name="Nationaliteit"></td></tr>
<tr><td>Burgerlijke staat: </td><td><input type="text" name="B_staat"></td></tr>
<tr><td>Rijbewijs: </td><td><input type="text" name="Rijbewijs"></td></tr>
<tr><td>Auto: </td><td><input type="text" name="Auto"></td></tr></table>
<input type="submit" name="Verzenden">
<input type="reset" name="Leegmaken">
<hr>
</form>

</body>
</html>
<?php
	}
?>
