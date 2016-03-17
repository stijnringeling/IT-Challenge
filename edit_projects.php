<?php
session_start();
include_once("db_connect.inc.php") ;
include_once("User.php");
if(isset($_SESSION["logged_in"], $_SESSION["sessionID"])){
		$user = new User($_SESSION["sessionID"], $db);
	}
	$functies = Array();

$query="SELECT * FROM projecten WHERE ID='" . $user->ID . "'";
$result= mysql_query($query);
$rows=mysql_fetch_array($result);


$_SESSION['Naam'] = $Naam;
$_SESSION['Omschrijving'] = $Omschrijving;
$_SESSION['Plaats'] = $Plaats;
$_SESSION['Startdatum'] = $Startdatum;
$_SESSION['Einddatum'] = $Einddatum;
$_SESSION['Werkomschrijving'] = $Werkomschrijving;
$_SESSION['pVaardigheden'] = $pVaardigheden;
$_SESSION['pSkills'] = $pSkills;
$_SESSION['Fulltime'] = $Fulltime;
$_SESSION['Uren'] = $Uren;
$_SESSION['pPublic'] = $pPublic;




?>

<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<form name="form1" method="get" action="update_pro.php">
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
<td align="center"><strong>Naam</strong></td>
<td align="center"><strong>Omschrijving</strong></td>
<td align="center"><strong>Plaats</strong></td>
<td align="center"><strong>Startdatum</strong></td>
<td align="center"><strong>Einddatum</strong></td>
<td align="center"><strong>Werkomschrijving</strong></td>
<td align="center"><strong>Vaardigheden</strong></td>
<td align="center"><strong>Skills</strong></td>
<td align="center"><strong>Fulltime</strong></td>
<td align="center"><strong>Uren</strong></td>
<td align="center"><strong>Public</strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="center">
<input name="Naam" type="text" id="Naam" value="<?php echo $rows['Naam']; ?>">
</td>
<td align="center">
<input name="Omschrijving" type="text" id="Omschrijving" value="<?php echo $rows['Omschrijving']; ?>" size="20">
</td>
<td align="center">
<input name="Plaats" type="text" id="Plaats" value="<?php echo $rows['Plaats']; ?>" size="20">
</td>
<td align="center">
<input name="Startdatum" type="text" id="Startdatum" value="<?php echo $rows['Startdatum']; ?>">
</td>
<td align="center">
<input name="Einddatum" type="text" id="Einddatum" value="<?php echo $rows['Einddatum']; ?>" size="20">
</td>
<td align="center">
<input name="Werkomschrijving" type="text" id="Werkomschrijving" value="<?php echo $rows['Werkomschrijving']; ?>" size="20">
</td>
<td align="center">
<input name="pVaardigheden" type="text" id="pVaardigheden" value="<?php echo $rows['pVaardigheden']; ?>">
</td>
<td align="center">
<input name="pSkills" type="text" id="pSkills" value="<?php echo $rows['pSkills']; ?>" size="20">
</td>
<td align="center">
<input name="Fulltime" type="text" id="Fulltime" value="<?php echo $rows['Fulltime']; ?>" size="20">
</td>
<td align="center">
<input name="Uren" type="text" id="Uren" value="<?php echo $rows['Uren']; ?>">
</td>
<td align="center">
<input name="pPublic" type="text" id="pPublic" value="<?php echo $rows['Public']; ?>" size="20">
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
