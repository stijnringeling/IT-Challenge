<?php
	session_start();
	include_once("db_connect.inc.php");
	$from = $_GET["from"];
	if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]){
		$query = "DELETE FROM sessionid WHERE sessionID LIKE '" . $_SESSION["sessionID"] . "'";
		$result = "";
		if(!$result = mysql_query($query, $db)){
			echo "Could not logout user";
			$_SESSION["logged_in"] = false;
		}else{
			$_SESSION["sessionID"] = "";
			$_SESSION["logged_in"] = false;
			if($from != ""){
				header("Refresh:3; url=$from");
			}
			echo "Succesfully logged out. You will be redirected in 3 seconds.";
		}
	}else{
		echo "User was not logged in";
	}
?>