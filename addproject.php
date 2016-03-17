<?php
if(!empty($_POST)){
	$server = "localhost";
	$user = "ITchallenge";
	$password = "ITchallenge";
	$database = "ITchallenge";
	$query = "";

$db= mysql_connect($server, $user, $password);
mysql_select_db($database);

//$imagename=$_FILES["File"]["name"]; 
 
//$imagetmp=addslashes (file_get_contents($_FILES['File']['tmp_name']));

//<tr><td>Bestand toevoegen: </td><td><input type="file" name="File" size="25" /></td></tr>


$query = "INSERT Projects (P_naam, Omschrijving, Plaats, P_start, P_eind, Functie, W_omschrijving, Vaardigheden, Skills, Omvang, F_start, F_eind, Public) ";
$query .= "VALUES ('";
$query .= $_POST["P_naam"]."','";
$query .= $_POST["Omschrijving"]."','";
$query .= $_POST["Plaats"]."','";
$query .= $_POST["P_start"]."','";
$query .= $_POST["P_eind"]."','";
$query .= $_POST["Functie"]."','";
$query .= $_POST["W_omschrijving"]."','";
$query .= $_POST["Vaardigheden"]."','";
$query .= $_POST["Skills"]."','";
$query .= $_POST["Omvang"]."','";
$query .= $_POST["F_start"]."','";
$query .= $_POST["F_eind"]."','";
//$query .= $_POST[$imagename]."','";
//$query .= $_POST[$imagetmp]."','";
$query .= $_POST["Public"]."')";


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
<h2>Add user</h2>
<form method="post" id="addproject" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"] ?>"><table>
<tr><td>Projectnaam: </td><td><input type="text" name="P_naam"></td></tr>
<tr><td>Omschrijving: </td><td><textarea name="Omschrijving" form="addproject"  ROWS=3 COLS=22></textarea></td></tr>
<tr><td>Plaats: </td><td><input type="text" name="Plaats"></td></tr>
<tr><td>Startdatum: </td><td><input type="text" name="P_start"></td></tr>
<tr><td>Einddatum: </td><td><input type="text" name="P_eind"></td></tr>
<tr><td>Functie: </td><td><input type="text" name="Functie"></td></tr>
<tr><td>Omschrijving van de werkzaamheden: </td><td><textarea name="W_omschrijving" form="addproject"  ROWS=3 COLS=22></textarea></td></tr>
<tr><td>Vaardigheden: </td><td><input type="text" name="Vaardigheden"></td></tr>
<tr><td>Skills: </td><td><input type="text" name="Skills"></td></tr>
<tr><td>Omvang: </td><td><input type="text" name="Omvang"></td></tr>
<tr><td>Functie startdatum: </td><td><input type="text" name="F_start"></td></tr>
<tr><td>Functie einddatum: </td><td><input type="text" name="F_eind"></td></tr>

<tr><td>Public: </td><td><input type="radio" name="Public" value="1" checked> Ja</td><td><input type="radio" name="Public" value="2" checked> Nee</td></tr></table>
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