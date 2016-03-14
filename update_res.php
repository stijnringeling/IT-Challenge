<?php
session_start();
include_once("db_connect.inc.php") ;
include_once("User.php");
if(isset($_SESSION["logged_in"], $_SESSION["sessionID"])){
		$user = new User($_SESSION["sessionID"], $db);
	}
	$functies = Array();

$Functies = $_GET['TFuncties'];
$Opleiding_van = $_GET['Opleiding_van'];
$Opleiding_tot = $_GET['Opleiding_tot'];
$Opleiding_vakken = $_GET['Opleiding_vakken'];
$Opleiding_diploma = $_GET['Opleiding_diploma'];
$Opleiding_jaar = $_GET['Opleiding_jaar'];
$Opleiding = $_GET['Opleiding'];
$Cursussen_van = $_GET['Cursussen_van'];
$Cursussen_tot = $_GET['Cursussen_tot'];
$Cursussen = $_GET['Cursussen'];
$Cursussen_omschr = $_GET['Cursussen_omschr'];
$Cursussen_diploma = $_GET['Cursussen_diploma'];
$Cursussen_jaar = $_GET['Cursussen_jaar'];
$vaardigheden = $_GET['vaardigheden'];
$vaardigheden_jaren = $_GET['vaardigheden_jaren'];
$vaardigheden_van = $_GET['vaardigheden_van'];
$vaardigheden_tot = $_GET['vaardigheden_tot'];
$Certificaten_naam = $_GET['Certificaten_naam'];
$Certificaten_omschr = $_GET['Certificaten_omschr'];
$Certficaten_jaar = $_GET['Certficaten_jaar'];
$Skills = $_GET['Skills'];
$Competenties = $_GET['Competenties'];
$Hobby = $_GET['Hobby'];
$Beschikbaarheid_van = $_GET['Beschikbaarheid_van'];
$Beschikbaarheid_tot = $_GET['Beschikbaarheid_tot'];
$Niet_Beschikbaarheid_van = $_GET['Niet_Beschikbaarheid_van'];
$Niet_Beschikbaarheid_tot = $_GET['Niet_Beschikbaarheid_tot'];
$Public = $_GET['Public'];
$Tarief_u = $_GET['Tarief_u'];
$Tarief_klasse = $_GET['Tarief_klasse'];
$Tarief_bruto_maand = $_GET['Tarief_bruto_maand'];
$Tarief_bruto_jaar = $_GET['Tarief_bruto_jaar'];
	
// update data in mysql database 
$query="UPDATE Resources_goed SET Functies='$Functies', Opleiding_van='$Opleiding_van', Opleiding_tot='$Opleiding_tot', Opleiding_vakken='$Opleiding_vakken', Opleiding_diploma='$Opleiding_diploma', Opleiding_jaar='$Opleiding_jaar'
, Opleiding='$Opleiding', Cursussen_van='$Cursussen_van', Cursussen_tot='$Cursussen_tot'
, Cursussen='$Cursussen', Cursussen_omschr='$Cursussen_omschr', Cursussen_diploma='$Cursussen_diploma'
, Cursussen_jaar='$Cursussen_jaar', vaardigheden='$vaardigheden', vaardigheden_jaren='$vaardigheden_jaren'
, vaardigheden_van='$vaardigheden_van', vaardigheden_tot='$vaardigheden_tot', Certificaten_naam='$Certificaten_naam'
, Certificaten_omschr='$Certificaten_omschr', Certficaten_jaar='$Certficaten_jaar', Skills='$Skills'
, Competenties='$Competenties', Hobby='$Hobby', Beschikbaarheid_van='$Beschikbaarheid_van'
, Beschikbaarheid_tot='$Beschikbaarheid_tot', Niet_Beschikbaarheid_van='$Niet_Beschikbaarheid_van', Niet_Beschikbaarheid_tot='$Niet_Beschikbaarheid_tot'
, Public='$Public', Tarief_u='$Tarief_u', Tarief_klasse='$Tarief_klasse'
, Tarief_bruto_maand='$Tarief_bruto_maand', Tarief_bruto_jaar='$Tarief_bruto_jaar' WHERE ID='2'";
$result=mysql_query($query);

// if successfully updated. 
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='show data.php'>View result</a>";
}

else {
echo "ERROR";
}


?>