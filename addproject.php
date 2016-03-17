<?php
if(!empty($_POST)){
	include_once("db_connect.inc.php");
	$query = "";

//$imagename=$_FILES["File"]["name"]; 
 
//$imagetmp=addslashes (file_get_contents($_FILES['File']['tmp_name']));

//<tr><td>Bestand toevoegen: </td><td><input type="file" name="File" size="25" /></td></tr>


$query = "INSERT INTO projecten (Naam, Omschrijving, Plaats, Startdatum, Einddatum, Werkomschrijving, Vaardigheden, Skills, Fulltime, Uren, `Public`) ";
$query .= "VALUES ('";
$query .= $_POST["P_naam"]."','";
$query .= $_POST["Omschrijving"]."','";
$query .= $_POST["Plaats"]."','";
$query .= $_POST["P_start"]."','";
$query .= $_POST["P_eind"]."','";
$query .= $_POST["W_omschrijving"]."','";
$query .= $_POST["Vaardigheden"]."','";
$query .= $_POST["Skills"]."','";
$query .= $_POST["Fulltime"]."','";
$query .= $_POST["Uren"] . "','";
//$query .= $_POST["F_start"]."','";
//$query .= $_POST["F_eind"]."','";
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
	$query = "INSERT INTO `ITchallenge` . `naw_projecten` (`ID`, `Achternaam`, `Voornaam`) 
VALUES ('$id', '$achternaam', '$voornaam')";
	if(!mysql_query($query, $db)){
		echo "error in query $query";
	}else{
		$functie = $_POST["Functie"];
		$functies = explode(",", $functie);
		$query = "INSERT INTO `ITchallenge`.`functies` (`functie_ID`,";
		for($i = 1; $i <= 10; $i++){
			if($i == 1){
				$query .= "`Functie$i`";
			}else{
				$query .= ",`Functie$i`";
			}
		}
		$query .= ") VALUES('$id',";
		for($i = 0; $i < 10; $i++){
			if($i < count($functies)){
				if($i == 0){
					$query .= "'$functies[$i]'";
				}else{
					$query .= ",'$functies[$i]'";
				}
			}else{$query .= ",NULL";}
		}
		$query .= ")";
		if(!mysql_query($query, $db)){
			echo "error in query $query";
		}else{
			$bedankt .="?id=". $id;
			mysql_close($db);
			header("location:$bedankt");
		}
	}
	}
}
else{
	?>
	
<html>
<head>
<title>Add Project</title>
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
<h2>Add project</h2>
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
<tr><td>Fulltime: </td><td><input type="radio" name="Fulltime"value="1" checked></td><td><input type="radio" name="Fulltime" value="0">Nee</td></tr>
<tr><td>Aantal uren: </td><td><input type="text" name="Uren">
<tr><td>Public: </td><td><input type="radio" name="Public" value="1" checked> Ja</td><td><input type="radio" name="Public" value="0"> Nee</td></tr>
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
