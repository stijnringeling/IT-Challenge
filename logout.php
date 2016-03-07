<?php
	session_start();
	include_once("db_connect.inc.php");
	if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]){
		$query = "DELETE FROM sessionID WHERE sessionID LIKE '" . $_SESSION["sessionID"] . "'";
		$result = "";
		if(!$result = mysql_query($query, $db)){
			echo "Could not logout user";
		}else{
			$_SESSION["sessionID"] = "";
			$_SESSION["logged_in"] = false;
			echo "Succesfully logged out";
		}
	}else{
		echo "User was not logged in";
	}
?>