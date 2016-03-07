<?php
include_once("db_connect.inc.php");
if(!empty($_POST)){
	$password = $_POST["Password"];
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$query = "";

$query = "INSERT users (Username, Password, email) ";
$query .= "VALUES ('";
$query .= $_POST["Username"]."','";
$query .= $hash."','";
$query .= $_POST["Email"]."')";


if(!mysql_query($query)){
	echo "Er is een fout opgetreden met nummer ". mysql_errno().":" . mysql_error();
	echo $query;
	mysql_close($db);
	exit;
}
else{
	$bedankt .="?id=". mysql_insert_id($db);
	mysql_close($db);
	header("location:$bedankt");
	}
}
else{
	?>
	
<html>
<head>
<title>Account registration</title>
</head>
<body>
<?php
	
?>
<h2>Add user</h2>
<form method="post" id="userreg" action="<?php echo $_SERVER["PHP_SELF"] ?>"><table>
<fieldset>
<p>
<label for="Username">Username</label>
<input type="text" id="username" name="Username" value="" maxlength="20" />
</p>
<p>
<label for="Password">Password</label>
<input type="text" id="password" name="Password" value="" maxlength="20" />
</p>
<p>
<label for="Email">E-mail</label>
<input type="text" id="Email" name="Email" value="" maxlength="20" />
</p>
<p>
<input type="submit" value="Login" />
</p>
</fieldset>
</form>
</body>
</html>
<?php
	}
?>