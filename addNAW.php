<?php
session_start();
include_once("db_connect.inc.php") ;
include_once("User.php");
if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
	$user = new User($_SESSION["sessionID"], $db);
}
if(!empty($_POST)){


//$query = "INSERT INTO 'itchallenge'.'NAW' ('ID','Achternaam', 'Voorvoegsel', 'Voorletters', 'Voornaam', 'Roepnaam', 'Woonadres', 'Postcode', 'Plaats', 'Land', 'Thuis', 'Werk', 'Mobiel', 'E-mail1', 'E-mail2', 'Geboortedatum', 'Geboorteplaats', 'Nationaliteit', 'Bstaat', 'Rijbewijs', 'Auto')";
//$query .= "VALUES ('5','";
$functie = $_POST["Functie"];
$opleiding_van = $_POST["Opleiding_van"];
$opleiding_tot = $_POST["Opleiding_tot"];
$opleiding = $_POST["Opleiding"];
$opleiding_vakken = $_POST["Opleiding_vakken"];
$opleiding_diploma = $_POST["Opleiding_diploma"];
$opleiding_jaar = $_POST["Opleiding_jaar"];
$cursussen_van = $_POST["Cursussen_van"];
$cursussen_tot = $_POST["Cursussen_tot"];
$cursussen = $_POST["Cursussen"];
$cursussen_diploma = $_POST["Cursussen_diploma"];
$cursussen_omschr = $_POST["Cursussen_omschr"];
$cursussen_jaar = $_POST["Cursussen_jaar"];
$vaardigheden = $_POST["Vaardigheden"];
$vaardigheden_jaren = $_POST["Vaardigheden_jaren"];
$vaardigheden_van = $_POST["Vaardigheden_van"];
$vaardigheden_tot = $_POST["Vaardigheden_tot"];
$certificaten_naam = $_POST["Certificaten_naam"];
$certificaten_omschr = $_POST["Certificaten_omschr"];
$certificaten_jaar = $_POST["Certificaten_jaar"];
$skills = $_POST["Skills"];
$competenties = $_POST["Competenties"];
$hobby = $_POST["Hobby"];
$beschikbaar_van = $_POST["Beschikbaarheid_van"];
$beschikbaar_tot = $_POST["Beschikbaarheid_tot"];
$niet_beschikbaar_van = $_POST["Niet_beschikbaarheid_van"];
$niet_beschikbaar_tot = $_POST["Niet_beschikbaarheid_tot"];
$public = $_POST["Public"];
$tarief_u = $_POST["Tarief_u"];
$tarief_klasse = $_POST["Tarief_klasse"];
$tarief_bruto_maand = $_POST["Tarief_bruto_maand"];
$tarief_bruto_jaar = &$_POST["Taried_bruto_jaar"];
$user_ID = $user->ID;

$query = "INSERT into `ITchallenge` . `Resources_goed` (`Functies`, `Opleiding_van`, `Opleiding_tot`, `Opleiding`, `Opleiding_vakken`, `Opleiding_diploma`, `Opleiding_jaar`, `Cursussen_van`, `Cursussen_tot`
		, `Cursussen`, `Cursussen_omschr`, `Cursussen_diploma`, `Cursussen_jaar`, `vaardigheden`, `vaardigheden_jaren`, `vaardigheden_van`, `vaardigheden_tot`
		, `Certificaten_naam`, `Certificaten_omschr`, `Certificaten_jaar`, `Skills`, `Competenties`, `Hobby's`, `Beschikbaarheid_van`, `Beschikbaarheid_tot`
		, `Niet_Beschikbaarheid_van`, `Niet_Beschikbaarheid_tot`, `Public`, `Tarief_u`, `Tarief_klasse`, `Tarief_bruto_maand`, `Tarief_bruto_jaar`, `user_ID`)
		 VALUES((SELECT ID FROM Picklist WHERE functie LIKE '$functie'), '$opleiding_van', '$opleiding_tot', '$opleiding', '$opleiding_vakken', '$opleiding_diploma'
		 , '$opleiding_jaar', '$cursussen_van', '$cursussen_tot', '$cursussen', '$cursussen_omschr', '$cursussen_diploma', '$cursussen_jaar', '$vaardigheden', '$vaardigheden_jaren'
		 , '$vaardigheden_van',  '$vaardigheden_tot', '$certificaten_naam', '$certificaten_omschr', '$certificaten_jaar', '$skills', '$competenties', '$hobby'
		 , '$beschikbaar_van', '$beschikbaar_tot', '$niet_beschikbaar_van', '$niet_beschikbaar_tot', '$public', '$tarief_u', '$tarief_klasse', '$tarief_bruto_maand'
		 , '$tarief_bruto_jaar', '$user_ID')";
		 if(!$result = mysql_query($query, $db)){
			 echo "fout in query $query " . mysql_errno() . mysql_error();
		 }
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

$query2 = "INSERT INTO `ITchallenge` . `naw_resources` (`id`, `Achternaam`, `Voorvoegsel`, `Voorletters`, `Voornaam`, `Roepnaam`, `Woonadres`, `Postcode`, `Plaats`, `Land`, `Thuis`, `Werk`, `Mobiel`, `E-mail1`, `E-mail2`, `Geboortedatum`, `Geboorteplaats`, `Nationaliteit`, `Bstaat`, `Rijbewijs`, `Auto`) 
VALUES ('$id', '$achternaam', '$voorvoegsel', '$voorletters', '$voornaam', '$roepnaam', '$woonadres', '$postcode', '$plaats', '$land', '$thuis', '$werk', '$mobiel', '$email1', '$email2', '$gdatum', '$gplaats', '$natio', '$bstaat', '$rijb', '$auto')";

if(!mysql_query($query2)){
	echo "Er is een fout opgetreden met nummer ". mysql_errno().":" . mysql_error();
	echo $query2;
	mysql_close($db);
	exit;
}
else{
	$bedankt .="?id=". $id;
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
<tr><td>Opleiding diploma</td><td><input type="radio" name="Opleiding_diploma" value="1">Ja</td><td><input type="radio" name="Opleiding_diploma" value="0">Nee</tr>
<tr><td>Opleiding jaar</td><td><input type="text" name="Opleiding_jaar"/></td></tr>
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
<tr><td>Tarief p/u</td><td><input type="text" name="Tarief_u"></td></tr>
<tr><td>Tarief klasse</td><td><input type="text" name="Tarief_klasse"></td></tr>
<tr><td>Tarief bruto/maand</td><td><input type="text" name="Tarief_bruto_maand"></td></tr>
<tr><td>Tarief bruto/jaar</td><td><input type="text" name="Taried_bruto_jaar"></td></tr>
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





 
 
 
 
 
