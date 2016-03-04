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
$query .= $_POST["Functies"]."','";
$query .= $_POST["Opleiding_van"]."','";
$query .= $_POST["Opleiding_tot"]."','";
$query .= $_POST["Opleiding"]."','";
$query .= $_POST["Opleiding_vakken"]."','";
$query .= $_POST["Opleiding_diploma"]."','";
$query .= $_POST["Opleiding_jaar"]."','";
$query .= $_POST["Cursussen_van"]."','";
$query .= $_POST["Cursussen_tot"]."','";
$query .= $_POST["Cursussen"]."','";
$query .= $_POST["Cursussen_omschr"]."','";
$query .= $_POST["Cursussen_diploma"]."','";
$query .= $_POST["Cursussen_jaar"]."','";
$query .= $_POST["vaardigheden"]."','";
$query .= $_POST["vaardigheden_jaren"]."','";
$query .= $_POST["vaardigheden_van"]."','";
$query .= $_POST["vaardigheden_tot"]."','";
$query .= $_POST["Certificaten_naam"]."','";
$query .= $_POST["Certificaten_omschr"]."','";
$query .= $_POST["Certificaten_jaar"]."','";
$query .= $_POST["Skills"]."','";
$query .= $_POST["Competenties"]."','";
$query .= $_POST["Hobby's"]."','";
$query .= $_POST["Beschikbaarheid_van"]."','";
$query .= $_POST["Beschikbaarheid_tot"]."','";
$query .= $_POST["Niet_Beschikbaarheid_van"]."','";
$query .= $_POST["Niet_Beschikbaarheid_tot"]."','";
$query .= $_POST["Public"]."','";
$query .= $_POST["Tarief_p/u"]."')";
$query .= $_POST["Tarief_klasse"]."')";
$query .= $_POST["Tarief_bruto_maand"]."')";
$query .= $_POST["Tarief_bruto_jaar"]."')";

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
<tr><td>Functies: </td><td><select name="Functies">
<option value="t1">Test 1</option>
<option value="t2">Test 2</option>
<option value="t3">Test 3</option>
<option value="t4">Test 4</option>
<option value="t5">Test 5</option>
<option value="t6">Test 6</option>
</select></td><td>Nieuwe functie toevoegen:</td><td><input type="text" name="Functies"></td></tr>
<tr><td>Opleiding van: </td><td><input type="text" name="Opleiding_van"></td></tr>
<tr><td>Opleiding tot: </td><td><input type="text" name="Opleiding_tot"></td></tr>
<tr><td>Opleiding: </td><td><input type="text" name="Opleiding"></td></tr>
<tr><td>Opleiding vakken: </td><td><input type="text" name="Opleiding_vakken"></td></tr>
<tr><td>Opleiding diploma: </td><td><input type="text" name="Opleiding_diploma"></td></tr>
<tr><td>Opleiding jaar: </td><td><input type="text" name="Opleiding_jaar"></td></tr>
<tr><td>Cursussen van: </td><td><input type="text" name="Cursussen_van"></td></tr>
<tr><td>Cursussen tot: </td><td><input type="text" name="Cursussen_tot"></td></tr>
<tr><td>Cursussen: </td><td><input type="text" name="Cursussen"></td></tr>
<tr><td>Cursussen omschrijving: </td><td><textarea name="Cursussen_omschr" form="resform"  ROWS=3 COLS=22></textarea></td></tr>
<tr><td>Cursussen diploma: </td><td><input type="text" name="Cursussen_diploma"></td></tr>
<tr><td>Cursussen jaar: </td><td><input type="text" name="Cursussen_jaar"></td></tr>
<tr><td>Vaardigheden: </td><td><input type="text" name="Vaardigheden"></td></tr>
<tr><td>Vaardigheden jaren: </td><td><input type="text" name="Vaardigheden_jaren"></td></tr>
<tr><td>Vaardigheden van: </td><td><input type="text" name="Vaardigheden_tot"></td></tr>
<tr><td>Vaardigheden tot: </td><td><input type="text" name="Vaardigheden_tot"></td></tr>
<tr><td>Certificaten naam: </td><td><input type="text" name="Certificaten_naam"></td></tr>
<tr><td>Certificaten omschrijving: </td><td><textarea name="Certificaten_omschr" form="resform"  ROWS=3 COLS=22></textarea></td></tr>
<tr><td>Certificaten jaar: </td><td><input type="text" name="Certificaten_jaar"></td></tr>
<tr><td>Skills: </td><td><input type="text" name="Skills"></td></tr>
<tr><td>Competenties: </td><td><input type="text" name="Competenties"></td></tr>
<tr><td>Hobby's: </td><td><input type="text" name="Hobbys"></td></tr>
<tr><td>Beschikbaarheid van: </td><td><input type="text" name="Beschikbaarheid_van"></td></tr>
<tr><td>Beschikbaarheid tot: </td><td><input type="text" name="Beschikbaarheid_tot"></td></tr>
<tr><td>Niet beschikbaarheid van: </td><td><input type="text" name="Beschikbaarheid_van"></td></tr>
<tr><td>Niet beschikbaarheid tot: </td><td><input type="text" name="Beschikbaarheid_tot"></td></tr>
<tr><td>Tarief per uur: </td><td><input type="text" name="Tarief_p/u">
<tr><td>Tarief klasse: </td><td><select name="Tarief_klasse">
<option value="1">0-5</option>
<option value="2">5-10</option>
<option value="3">10-15</option>
<option value="4">15-20</option>
<option value="5">20-25</option>
<option value="6">25-30</option>
<option value="7">30-40</option>
<option value="8">40-50</option>
<option value="9">50 of hoger</option>
<option value="10">vrijwillig</option>
</select></td></tr>
<tr><td>Tarief bruto per maand: </td><td><input type="text" name="Tarief_bruto_maand"></td></tr>
<tr><td>Tarief bruto per jaar: </td><td><input type="text" name="Tarief_bruto_jaar"></td></tr>
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



