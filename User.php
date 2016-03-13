<?php
	class User {
		function __construct($sessionID, $db){
			$this->sessionID = $sessionID;
			$this->db = $db;
			$querys = Array();
			$querys[] = "SELECT ID FROM sessionid WHERE sessionID LIKE '" . $this->sessionID . "'";
			$this->getData($querys);
			$querys2 = Array();
			$querys2[] = "SELECT Username, email FROM users WHERE User_id = '" . $this->ID . "'";
			$this->getData($querys2);
			
		}
		
		function getData($querys = Array()){
			foreach($querys as $query){
				$row = $this->query($query, $this->db);
				foreach($row as $key => $value){
					$this->$key = $value;
				}
			}
		}
		function query($query, $db){
			$result = mysql_query($query, $db);
			while($row = mysql_fetch_assoc($result)){
				return $row;
			}
		}
	}
?>