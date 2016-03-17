<?php
	session_start();
	include_once("db_connect.inc.php");
	include_once("User.php");
	if(isset($_SESSION["logged_in"], $_SESSION["sessionID"]) && $_SESSION["logged_in"] == true){
		$user = new User($_SESSION["sessionID"], $db);
	}
?>
<html>
	<body>
		<?php
			if(isset($user->ID)){
				echo "Username: $user->Username <br/>";
				echo "E-mail: $user->email";
			}else{
				echo "Please <a href=\"login.php\">Login</a> to show your account information";
			}
		?>
	</body>
</html>