<html>
<head>
<?php
	//bestand met connectie info voor verbing met de server.
	//variabelen initialiseren.
	include("db_connect.inc.php");
	if($_POST) {
  	try {
      // First of all, let's begin a transaction
      $db->beginTransaction();
      
      $insert_query = "INSERT INTO "
  
      // A set of queries; if one fails, an exception should be thrown
      $db->query('first query');
      $db->query('second query');
  
      // If we arrive here, it means that no exception was thrown
      // i.e. no query has failed, and we can commit the transaction
      $db->commit();
      echo "de query \"$query\" kon niet worden uitgevoerd!";
    } catch (Exception $e) {
      // An exception has been thrown
      // We must rollback the transaction
      echo "De query \"$query\" is met succes uitgevoerd";
      $db->rollback();
    }
	}
?>
</head>
<body>
	<form method="POST">
	  <input type="textbox" name="voornaam" placeholder="Voornaam">
	  <input type="textbox" name="achternaam" placeholder="Achternaam">
	  <input type="textbox" name="woonplaats" placeholder="Woonplaats">
	  <input type="textbox" name="telefoon" placeholder="telefoon">
	  <input type="submit" value="Submit">
	</form>
</body>
</html>
