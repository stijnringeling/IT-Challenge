<?php
session_start();
include_once("db_connect.inc.php") ;
include_once("User.php");
if(isset($_SESSION["logged_in"], $_SESSION["sessionID"])){
		$user = new User($_SESSION["sessionID"], $db);
	}
	$functies = Array();

$query="SELECT * FROM resources_goed WHERE ID='" . $user->ID . "'";
$result= mysql_query($query);
$rows=mysql_fetch_array($result);


$_SESSION['TFuncties'] = $TFuncties;
$_SESSION['Opleiding_van'] = $Opleiding_van;
$_SESSION['Opleiding_tot'] = $Opleiding_tot;
$_SESSION['Opleiding_vakken'] = $Opleiding_vakken;
$_SESSION['Opleiding_diploma'] = $Opleiding_diploma;
$_SESSION['Opleiding_jaar'] = $Opleiding_jaar;
$_SESSION['Opleiding'] = $Opleiding;
$_SESSION['Cursussen_van'] = $Cursussen_van;
$_SESSION['Cursussen_tot'] = $Cursussen_tot;
$_SESSION['Cursussen'] = $Cursussen;
$_SESSION['Cursussen_omschr'] = $Cursussen_omschr;
$_SESSION['Cursussen_diploma'] = $Cursussen_diploma;
$_SESSION['Cursussen_jaar'] = $Cursussen_jaar;
$_SESSION['vaardigheden'] = $vaardigheden;
$_SESSION['vaardigheden_jaren'] = $vaardigheden_jaren;
$_SESSION['vaardigheden_van'] = $vaardigheden_van;
$_SESSION['vaardigheden_tot'] = $vaardigheden_tot;
$_SESSION['Certificaten_naam'] = $Certificaten_naam;
$_SESSION['Certificaten_omschr'] = $Certificaten_omschr;
$_SESSION['Certficaten_jaar'] = $Certficaten_jaar;
$_SESSION['Skills'] = $Skills;
$_SESSION['Competenties'] = $Competenties;
$_SESSION['Hobby'] = $Hobby;
$_SESSION['Beschikbaarheid_van'] = $Beschikbaarheid_van;
$_SESSION['Beschikbaarheid_tot'] = $Beschikbaarheid_tot;
$_SESSION['Niet_Beschikbaarheid_van'] = $Niet_Beschikbaarheid_van;
$_SESSION['Niet_Beschikbaarheid_tot'] = $Niet_Beschikbaarheid_tot;
$_SESSION['Public'] = $Public;
$_SESSION['Tarief_u'] = $Tarief_p/u;
$_SESSION['Tarief_klasse'] = $Tarief_klasse;
$_SESSION['Tarief_bruto_maand'] = $Tarief_bruto_maand;
$_SESSION['Tarief_bruto_jaar'] = $Tarief_bruto_jaar;



?>

<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<form name="form1" method="get" action="update_res.php">
<td>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>&nbsp;</td>
<td colspan="3"><strong>Update data</strong> </td>
</tr>
<tr>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
</tr>
<tr>
<td align="center">&nbsp;</td>
<td align="center"><strong>Functies</strong></td>
<td align="center"><strong>Opleiding van</strong></td>
<td align="center"><strong>Opleiding tot</strong></td>
<td align="center"><strong>Opleiding</strong></td>
<td align="center"><strong>Opleiding vakken</strong></td>
<td align="center"><strong>Opleiding diploma</strong></td>
<td align="center"><strong>Opleiding jaar</strong></td>
<td align="center"><strong>Cursussen van</strong></td>
<td align="center"><strong>Cursussen tot</strong></td>
<td align="center"><strong>Cursussen</strong></td>
<td align="center"><strong>Cursussen omschrijving</strong></td>
<td align="center"><strong>Cursussen diploma</strong></td>
<td align="center"><strong>Cursussen jaar</strong></td>
<td align="center"><strong>Vaardigheden</strong></td>
<td align="center"><strong>Vaardigheden jaren</strong></td>
<td align="center"><strong>Vaardigheden van</strong></td>
<td align="center"><strong>Vaardigheden tot</strong></td>
<td align="center"><strong>Certificaten</strong></td>
<td align="center"><strong>Certificaten omschrijving</strong></td>
<td align="center"><strong>Certificaten jaar</strong></td>
<td align="center"><strong>Skills</strong></td>
<td align="center"><strong>Competenties</strong></td>
<td align="center"><strong>Hobby's</strong></td>
<td align="center"><strong>Beschikbaar van</strong></td>
<td align="center"><strong>Beschikbaar tot</strong></td>
<td align="center"><strong>Niet beschikbaar van</strong></td>
<td align="center"><strong>Niet beschikbaar tot</strong></td>
<td align="center"><strong>Public</strong></td>
<td align="center"><strong>Tarief p/u</strong></td>
<td align="center"><strong>Tarief klasse</strong></td>
<td align="center"><strong>Tarief bruto per maand</strong></td>
<td align="center"><strong>Tarief bruto per jaar</strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="center">
<input name="TFuncties" type="text" id="TFuncties" value="<?php echo $rows['Functies']; ?>">
</td>
<td align="center">
<input name="Opleiding_van" type="text" id="Opleiding_van" value="<?php echo $rows['Opleiding_van']; ?>" size="20">
</td>
<td align="center">
<input name="Opleiding_tot" type="text" id="Opleiding_tot" value="<?php echo $rows['Opleiding_tot']; ?>" size="20">
</td>
<td align="center">
<input name="Opleiding" type="text" id="Opleiding" value="<?php echo $rows['Opleiding']; ?>">
</td>
<td align="center">
<input name="Opleiding_vakken" type="text" id="Opleiding_vakken" value="<?php echo $rows['Opleiding_vakken']; ?>" size="20">
</td>
<td align="center">
<input name="Opleiding_diploma" type="text" id="Opleiding_diploma" value="<?php echo $rows['Opleiding_diploma']; ?>" size="20">
</td>
<td align="center">
<input name="Opleiding_jaar" type="text" id="Opleiding_jaar" value="<?php echo $rows['Opleiding_jaar']; ?>">
</td>
<td align="center">
<input name="Cursussen_van" type="text" id="Cursussen_van" value="<?php echo $rows['Cursussen_van']; ?>" size="20">
</td>
<td align="center">
<input name="Cursussen_tot" type="text" id="Cursussen_tot" value="<?php echo $rows['Cursussen_tot']; ?>" size="20">
</td>
<td align="center">
<input name="Cursussen" type="text" id="Cursussen" value="<?php echo $rows['Cursussen']; ?>">
</td>
<td align="center">
<input name="Cursussen_omschr" type="text" id="Cursussen_omschr" value="<?php echo $rows['Cursussen_omschr']; ?>" size="20">
</td>
<td align="center">
<input name="Cursussen_diploma" type="text" id="Cursussen_diploma" value="<?php echo $rows['Cursussen_diploma']; ?>" size="20">
</td>
<td align="center">
<input name="Cursussen_jaar" type="text" id="Cursussen_jaar" value="<?php echo $rows['Cursussen_jaar']; ?>">
</td>
<td align="center">
<input name="vaardigheden" type="text" id="vaardigheden" value="<?php echo $rows['vaardigheden']; ?>" size="20">
</td>
<td align="center">
<input name="vaardigheden_jaren" type="text" id="vaardigheden_jaren" value="<?php echo $rows['vaardigheden_jaren']; ?>" size="20">
</td>
<td align="center">
<input name="vaardigheden_van" type="text" id="vaardigheden_van" value="<?php echo $rows['vaardigheden_van']; ?>">
</td>
<td align="center">
<input name="vaardigheden_tot" type="text" id="vaardigheden_tot" value="<?php echo $rows['vaardigheden_tot']; ?>" size="20">
</td>
<td align="center">
<input name="Certificaten_naam" type="text" id="Certificaten_naam" value="<?php echo $rows['Certificaten_naam']; ?>" size="20">
</td>
<td align="center">
<input name="Certificaten_omschr" type="text" id="Certificaten_omschr" value="<?php echo $rows['Certificaten_omschr']; ?>">
</td>
<td align="center">
<input name="Certficaten_jaar" type="text" id="Certficaten_jaar" value="<?php echo $rows['Certficaten_jaar']; ?>" size="20">
</td>
<td align="center">
<input name="Skills" type="text" id="Skills" value="<?php echo $rows['Skills']; ?>" size="20">
</td>
<td align="center">
<input name="Competenties" type="text" id="Competenties" value="<?php echo $rows['Competenties']; ?>">
</td>
<td align="center">
<input name="Hobby" type="text" id="Hobby" value="<?php echo $rows['Hobby']; ?>" size="20">
</td>
<td align="center">
<input name="Beschikbaarheid_van" type="text" id="Beschikbaarheid_van" value="<?php echo $rows['Beschikbaarheid_van']; ?>" size="20">
</td>
<td align="center">
<input name="Beschikbaarheid_tot" type="text" id="Beschikbaarheid_tot" value="<?php echo $rows['Beschikbaarheid_tot']; ?>">
</td>
<td align="center">
<input name="Niet_Beschikbaarheid_van" type="text" id="Niet_Beschikbaarheid_van" value="<?php echo $rows['Niet_Beschikbaarheid_van']; ?>" size="20">
</td>
<td align="center">
<input name="Niet_Beschikbaarheid_tot" type="text" id="Niet_Beschikbaarheid_tot" value="<?php echo $rows['Niet_Beschikbaarheid_tot']; ?>" size="20">
</td>
<td align="center">
<input name="Public" type="text" id="Public" value="<?php echo $rows['Public']; ?>">
</td>
<td align="center">
<input name="Tarief_u" type="text" id="Tarief_u" value="<?php echo $rows['Tarief_u']; ?>" size="20">
</td>
<td align="center">
<input name="Tarief_klasse" type="text" id="Tarief_klasse" value="<?php echo $rows['Tarief_klasse']; ?>" size="20">
</td>
<td align="center">
<input name="Tarief_bruto_maand" type="text" id="Tarief_bruto_maand" value="<?php echo $rows['Tarief_bruto_maand']; ?>">
</td>
<td align="center">
<input name="Tarief_bruto_jaar" type="text" id="Tarief_bruto_jaar" value="<?php echo $rows['Tarief_bruto_jaar']; ?>" size="20">
</td>
</tr>
<tr>
<td align="center">
<input type="submit" name="Submit" value="Submit">
</td>
<td>&nbsp;</td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<?php
// close connection 
mysql_close();
?>
