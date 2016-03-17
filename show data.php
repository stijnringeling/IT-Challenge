
<?php
include_once("db_connect.inc.php") ;
include_once("User.php");
if(isset($_SESSION["logged_in"], $_SESSION["sessionID"])){
		$user = new User($_SESSION["sessionID"], $db);
	}
	$functies = Array();
	
$table = $_POST["choice"];
if($_POST) {
if($table == "projecten"){
	$query="SELECT * FROM projecten WHERE ID='1'";
	$result= mysql_query($query);
	echo "Projects";
	echo "<table>"; // start a table tag in the HTML

	while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
	echo "<tr><td>ID:</td><td>" . $row['ID'] . "</td></tr><tr><td>Achternaam:</td><td>" . $row['Achternaam'] . "</td></tr><tr><td>Voornaam:</td><td>" . $row['Voornaam'] . "</td></tr>";
	}

	echo "</table>"; //Close the table in HTML
	?>
	<a href=edit_projects.php>Edit data</a>
	<?php
}
else{
	$query="SELECT * FROM resources_goed WHERE ID='2'";
$result=mysql_query($query);
echo "Resources";
echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>ID:</td><td>" . $row['ID'] . "</td></tr><tr><td>Functies:</td><td>" . $row['Functies'] . "</td></tr><tr><td>Opleiding van:</td><td>" . $row['Opleiding_van'] . "</td></tr>
	<tr><td>Opleiding tot:</td><td>" . $row['Opleiding_tot'] . "</td></tr><tr><td>Opleiding:</td><td>" . $row['Opleiding'] . "</td></tr><tr><td>Opleiding vakken:</td><td>" . $row['Opleiding_vakken'] . "</td></tr>
	<tr><td>Opleiding diploma:</td><td>" . $row['Opleiding_diploma'] . "</td></tr><tr><td>Opleiding jaar:</td><td>" . $row['Opleiding_jaar'] . "</td></tr><tr><td>Cursussen van:</td><td>" . $row['Cursussen_van'] . "</td></tr>
	<tr><td>Cursussen tot:</td><td>" . $row['Cursussen_tot'] . "</td></tr><tr><td>Cursussen:</td><td>" . $row['Cursussen'] . "</td></tr><tr><td>Cursussen omschrijving:</td><td>" . $row['Cursussen_omschr'] . "</td></tr>
	<tr><td>Cursussen diploma:</td><td>" . $row['Cursussen_diploma'] . "</td></tr><tr><td>Cursussen jaar:</td><td>" . $row['Cursussen_jaar'] . "</td></tr><tr><td>Vaardigheden:</td><td>" . $row['vaardigheden'] . "</td></tr>
	<tr><td>Vaardigheden jaren:</td><td>" . $row['vaardigheden_jaren'] . "</td></tr><tr><td>Vaardigheden van:</td><td>" . $row['vaardigheden_van'] . "</td></tr><tr><td>Vaardigheden tot:</td><td>" . $row['vaardigheden_tot'] . "</td></tr>
	<tr><td>Certificaten naam:</td><td>" . $row['Certificaten_naam'] . "</td></tr><tr><td>Certificaten omschrijving:</td><td>" . $row['Certificaten_omschr'] . "</td></tr><tr><td>Certificaten jaar:</td><td>" . $row['Certficaten_jaar'] . "</td></tr>
	<tr><td>Skills:</td><td>" . $row['Skills'] . "</td></tr><tr><td>Competenties:</td><td>" . $row['Competenties'] . "</td></tr><tr><td>Hobby's:</td><td>" . $row['Hobby'] . "</td></tr>
	<tr><td>Beschikbaarheid van:</td><td>" . $row['Beschikbaarheid_van'] . "</td></tr><tr><td>Beschikbaarheid tot:</td><td>" . $row['Beschikbaarheid_tot'] . "</td></tr><tr><td>Niet beschikbaar van:</td><td>" . $row['Niet_Beschikbaarheid_van'] . "</td></tr>
	<tr><td>Niet beschikbaar tot:</td><td>" . $row['Niet_Beschikbaarheid_tot'] . "</td></tr><tr><td>Public:</td><td>" . $row['Public'] . "</td></tr><tr><td>Tarief p/u:</td><td>" . $row['Tarief_u'] . "</td></tr>
	<tr><td>Tarief klasse:</td><td>" . $row['Tarief_klasse'] . "</td></tr><tr><td>Tarief bruto per maand:</td><td>" . $row['Tarief_bruto_maand'] . "</td></tr><tr><td>Tarief bruto per jaar:</td><td>" . $row['Tarief_bruto_jaar'] . "</td></tr>";
}

echo "</table>"; //Close the table in HTML
?>
	<a href=edit_resources.php>Edit data</a>
	<?php
}
}

else{
echo "";}

mysql_close(); //Make sure to close out the database connection
?>

<html>
<head>
<title>edit data</title>
</head>
<body>
<h2>choose project or resource</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>"><table>
<tr><td>What do you want to edit: </td><td><input type="radio" name="choice" value="projecten" checked> Project </td><td><input type="radio" name="choice" value="resources_goed" checked> Resource</td></tr>
<tr><td><input type="submit" name="Verzenden" Value="Go"></td></tr>
</table>
</form>
<hr>

</body>
</html>
