<?php
session_start();
include_once("db_connect.inc.php") ;
include_once("User.php");
if(isset($_SESSION["logged_in"], $_SESSION["sessionID"])){
		$user = new User($_SESSION["sessionID"], $db);
	}
	$functies = Array();

$Naam = $_GET['Naam'];
$Omschrijving = $_GET['Omschrijving'];
$Plaats = $_GET['Plaats'];
$Startdatum = $_GET['Startdatum'];
$Einddatum = $_GET['Einddatum'];
$Werkomschrijving = $_GET['Werkomschrijving'];
$pVaardigheden = $_GET['pVaardigheden'];
$pSkills = $_GET['pSkills'];
$Fulltime = $_GET['Fulltime'];
$Uren = $_GET['Uren'];
$pPublic = $_GET['pPublic'];

	
// update data in mysql database 
$query="UPDATE projecten SET Naam='$Naam', Omschrijving='$Omschrijving', Plaats='$Plaats'
, Startdatum='$Startdatum', Einddatum='$Einddatum', Werkomschrijving='$Werkomschrijving'
, Vaardigheden='$pVaardigheden', Skills='$pSkills', Fulltime='$Fulltime'
, Uren='$Uren', Public='$pPublic' WHERE ID='1'";
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