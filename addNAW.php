<?php
include_once("db_connect.inc.php") ;
if(!empty($_POST)){


//$query = "INSERT INTO 'itchallenge'.'naw' ('ID','Achternaam', 'Voorvoegsel', 'Voorletters', 'Voornaam', 'Roepnaam', 'Woonadres', 'Postcode', 'Plaats', 'Land', 'Thuis', 'Werk', 'Mobiel', 'E-mail1', 'E-mail2', 'Geboortedatum', 'Geboorteplaats', 'Nationaliteit', 'Bstaat', 'Rijbewijs', 'Auto')";
//$query .= "VALUES ('5','";
$id = mysql_insert_id();
$achternaam = $_POST["Achternaam"]; 
$voorvoegsel = $_POST["Voorvoegsel"];
$voorletters = $_POST["Voorletters"];
$voornaam = $_POST["Voornaam"];
$roepnaam = $_POST["Roepnaam"];
$woonadres = $_POST["Woonadres"];
$postcode = $_POST["Postcode"];
$plaats = $_POST["Plaats"];
$land = $_POST["Land"];
$thuis = $_POST["Thuis"];
$werk = $_POST["Werk"];
$mobiel = $_POST["Mobiel"];
$email1 = $_POST["E-mail1"];
$email2 = $_POST["E-mail2"];
$gdatum = $_POST["Geboortedatum"];
$gplaats = $_POST["Geboorteplaats"];
$natio = $_POST["Nationaliteit"];
$bstaat = $_POST["Bstaat"];
$rijb = $_POST["Rijbewijs"];
$auto = $_POST["Auto"];

$query = "INSERT INTO `itchallenge`.`naw` (`ID`, `Achternaam`, `Voorvoegsel`, `Voorletters`, `Voornaam`, `Roepnaam`, `Woonadres`, `Postcode`, `Plaats`, `Land`, `Thuis`, `Werk`, `Mobiel`, `E-mail1`, `E-mail2`, `Geboortedatum`, `Geboorteplaats`, `Nationaliteit`, `Bstaat`, `Rijbewijs`, `Auto`) 
VALUES ('$id', '$achternaam', '$voorvoegsel', '$voorletters', '$voornaam', '$roepnaam', '$woonadres', '$postcode', '$plaats', '$land', '$thuis', '$werk', '$mobiel', '$email1', '$email2', '$gdatum', '$gplaats', '$natio', '$bstaat', '$rijb', '$auto')";

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
<h2>Add NAW information</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>"><table>
<tr><td>Achternaam: </td><td><input type="text" name="Achternaam"></td></tr>
<tr><td>Voorvoegsel: </td><td><input type="text" name="Voorvoegsel"></td></tr>
<tr><td>Voorletters: </td><td><input type="text" name="Voorletters"></td></tr>
<tr><td>Voornaam: </td><td><input type="text" name="Voornaam"></td></tr>
<tr><td>Roepnaam: </td><td><input type="text" name="Roepnaam"></td></tr>
<tr><td>Woonadres: </td><td><input type="text" name="Woonadres"></td></tr>
<tr><td>Postcode: </td><td><input type="text" name="Postcode"></td></tr>
<tr><td>Plaats: </td><td><input type="text" name="Plaats"></td></tr>
<tr><td>Land: </td><td><input type="text" name="Land"></td></tr>
<tr><td>Telefoonnummers</td></tr>
<tr><td>Thuis: </td><td><input type="text" name="Thuis"></td></tr>
<tr><td>Werk: </td><td><input type="text" name="Werk"></td></tr>
<tr><td>Mobiel: </td><td><input type="text" name="Mobiel"></td></tr>
<tr><td>E-mail 1: </td><td><input type="text" name="E-mail1"></td></tr>
<tr><td>E-mail 2: </td><td><input type="text" name="E-mail2"></td></tr>
<tr><td>Geboortedatum:</td><td><input type="text" name="Geboortedatum"></td><td> (YYYY-MM-DD)</td></tr>
<tr><td>Geboorteplaats: </td><td><input type="text" name="Geboorteplaats"></td></tr>
<tr><td>Nationaliteit: </td><td><input type="text" name="Nationaliteit"></td></tr>
<tr><td>Bstaat: </td><td><input type="radio" name="Bstaat" value="Ongehuwd" checked> Ongehuwd </td><td><input type="radio" name="Bstaat" value="Gehuwd" checked> Gehuwd </td><td><input type="radio" name="Bstaat" value="Gescheiden" checked> Gescheiden</td></tr>
<tr><td>Rijbewijs: </td><td><input type="radio" name="Rijbewijs" value="1" checked> Ja </td><td><input type="radio" name="Rijbewijs" value="0" checked> Nee</td></tr>
<tr><td>Auto: </td><td><input type="text" name="Auto"></td></tr></table>
<input type="submit" name="Verzenden" Value="Upload">
<input type="reset" name="Leegmaken">
<hr>
</form>
</body>
</html>
<?php
	}
?>





 
 
 
 
 