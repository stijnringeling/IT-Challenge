<?php
include_once("db_connect.inc.php");
/*** begin our session ***/
session_start();
$message = "";
/*** check if the users is already logged in ***/
if(isset( $_SESSION['logged_in']) && $_SESSION["logged_in"])
{
    $message = 'User is already logged in';
}
/*** check that both the username, password have been submitted ***/
elseif(!isset( $_POST['Username'], $_POST['Password']))
{
    $message = 'Please enter a valid username and password';
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['Username']) > 20 || strlen($_POST['Username']) < 4)
{
    $message = 'Incorrect Length for Username';
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['Password']) > 20 || strlen($_POST['Password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
/*** check the username has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['Username']) != true)
{
    /*** if there is no match ***/
    $message = "Username must be alpha numeric";
}
/*** check the password has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['Password']) != true)
{
        /*** if there is no match ***/
        $message = "Password must be alpha numeric";
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $Username = filter_var($_POST['Username'], FILTER_SANITIZE_STRING);
    $Password = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);

    $query = "SELECT * FROM users WHERE Username LIKE '$Username'";
	$result = "";
	$logged_in = false;
	if(!$result = mysql_query($query, $db)){
		echo "Error in query $query";
	}else{
		while($row = mysql_fetch_assoc($result)){
			$hash =  $row["Password"];
			if(password_verify($Password, $hash)){
				//$logged_in = true;
				$_SESSION["logged_in"] = true;
				$message = "You are succesfully logged in";
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$sessionID = '';
				for($i = 0; $i < 20; $i++){
					$sessionID .= $characters[rand(0, strlen($characters) - 1)];
				}
				//echo $sessionID;
				$query2 = "INSERT sessionid (ID, sessionID) VALUES('" . $row["User_id"] . "','" . $sessionID . "') ON DUPLICATE KEY UPDATE sessionID = '" . $sessionID . "'";
				$result2 = "";
				if(!$result2 = mysql_query($query2, $db)){
					echo "Error in query $query2";
				}else{
					$_SESSION["sessionID"] = $sessionID;
				}
			}else{
				//$logged_in = false;
				$_SESSION["logged_in"] = false;
				$message = "Wrong username or password";
			}
		}
	}
}
?>

<html>
<head>
<title>Login</title>
</head>
<body>
<p><?php echo $message; ?>
</body>
</html>