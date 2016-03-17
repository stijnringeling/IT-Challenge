<?php
include_once("db_connect.inc.php") ;
if(!empty($_POST)){


//$query = "INSERT INTO 'itchallenge'.'NAW' ('ID','Achternaam', 'Voorvoegsel', 'Voorletters', 'Voornaam', 'Roepnaam', 'Woonadres', 'Postcode', 'Plaats', 'Land', 'Thuis', 'Werk', 'Mobiel', 'E-mail1', 'E-mail2', 'Geboortedatum', 'Geboorteplaats', 'Nationaliteit', 'Bstaat', 'Rijbewijs', 'Auto')";
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

$query = "INSERT INTO `itchallenge`.`NAW` (`Achternaam`, `Voorvoegsel`, `Voorletters`, `Voornaam`, `Roepnaam`, `Woonadres`, `Postcode`, `Plaats`, `Land`, `Thuis`, `Werk`, `Mobiel`, `E-mail1`, `E-mail2`, `Geboortedatum`, `Geboorteplaats`, `Nationaliteit`, `Bstaat`, `Rijbewijs`, `Auto`) 
VALUES ('$achternaam', '$voorvoegsel', '$voorletters', '$voornaam', '$roepnaam', '$woonadres', '$postcode', '$plaats', '$land', '$thuis', '$werk', '$mobiel', '$email1', '$email2', '$gdatum', '$gplaats', '$natio', '$bstaat', '$rijb', '$auto')";

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
<link rel="stylesheet" type="text/css" href="search.css">
</head>
<body>
<div class="center">
<div class="header">
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="addproject.php">+ Project</a></li>
  <li><a href="addNAW.php">+ Resource</a></li>
  <li><a href="login.php">Log in</a></li>
  <li><a href="adduser.php">Register</a></li>
</ul>
</div>
<div class="hidden">
<div class="centermid">
</head>
<body>
<h2>Add Resource</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>"><table>
<tr><td>Functie</td><td><input type="text" name="Functie"></td></tr>
<tr><td>Opleiding van</td><td><input type="text" name="Opleiding_van"></td></tr>
<tr><td>Opleiding tot</td><td><input type="text" name="Opleiding_tot"></td></tr>
<tr><td>Opleiding</td><td><input type="text" name="Opleiding"></td></tr>
<tr><td>Opleiding vakken</td><td><input type="text" name="Opleiding_vakken"></td></tr>
<tr><td>Opleiding diploma</td><td><input type="radio" name="Opleiding_diploma" value="1">Ja</td><td><td><input type="radio" name="Opleiding_diploma" value="0">Nee</tr>
<tr><td>Cursussen van</td><td><input type="text" name="Cursussen_van"></td></tr>
<tr><td>Cursussen tot</td><td><input type="text" name="Cursussen_tot"></td></tr>
<tr><td>Cursussen</td><td><input type="text" name="Cursussen"></td></tr>
<tr><td>Cursussen omschrijving</td><td><input type="text" name="Cursussen_omschr"></td></tr>
<tr><td>Cursussen diploma</td><td><input type="radio" name="Cursussen_diploma" value="1">Ja</td><td><input type="radio" name="Cursussen_diploma" value="0">Nee</td></tr>
<tr><td>Cursussen jaar</td><td><input type="text" name="Cursussen_jaar"></td></tr>
<tr><td>Vaardigheden</td><td><input type="text" name="Vaardigheden"></td></tr>
<tr><td>Vaardigheden jaren</td><td><input type="text" name="Vaardigheden_jaren"></td></tr>
<tr><td>Vaardigheden van</td><td><input type="text" name="Vaardigheden_van"></td></tr>
<tr><td>Vaardigheden tot</td><td><input type="text" name="Vaardigheden_tot"></td></tr>
<tr><td>Certificaten naam</td><td><input type="text" name="Certificaten_naam"></td></tr>
<tr><td>Certificaten omschrijving</td><td><input type="text" name="Certificaten_omschr"></td></tr>
<tr><td>Certificaten jaar</td><td><input type="text" name="Certificaten_jaar"></td></tr>
<tr><td>Skills</td><td><input type="text" name="Skills"></td></tr>
<tr><td>Competenties</td><td><input type="text" name="Competenties"></td></tr>
<tr><td>Hobby's</td><td><input type="text" name="Hobby"></td></tr>
<tr><td>Beschikbaar van</td><td><input type="text" name="Beschikbaarheid_van"></td></tr>
<tr><td>Beschikbaar tot</td><td><input type="text" name="Beschikbaarheid_tot"></td></tr>
<tr><td>Niet beschikbaar van</td><td><input type="text" name="Niet_beschikbaarheid_van"></td></tr>
<tr><td>Niet beschikbaar tot</td><td><input type="text" name="Niet_beschikbaarheid_tot"></td></tr>
<tr><td>Public</td><td><input type="radio" name="Public" value="1">Ja</td><td><input type="radio" name="Public" value="0">Nee</tr>
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
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.hidden').slideDown(500);
});
</script>
</body>
</html>
<?php
	}
?>





 
 
 
 
 
