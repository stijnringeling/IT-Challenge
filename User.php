<?php
	class User {
		function __construct($sessionID, $db){
			$this->sessionID = $sessionID;
			$this->db = $db;
			$this->getData($this->db);
		}
		
		function getData($db){
			$query = "SELECT * FROM sessionIDs WHERE sessionID = " . $this->sessionID;
			$row = $this->query($query, $this->db);
			$this->ID = $row["ID"];
		}
		function query($query, $db){
			$result = mysql_query($query, $db);
			while($row = mysql_fetch_assoc($result)){
				return $row;
			}
		}
	}
?>