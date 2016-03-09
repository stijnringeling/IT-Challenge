<?php
include_once("db_connect.inc.php");
if(!empty($_POST)){
	$username = $_POST["Username"];
	$password = $_POST["Password"];
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$email = $_POST["Email"];
	$query = "";
	if(isset($_POST["Username"], $_POST["Password"], $_POST["Email"])){
		if(strlen($username) <= 20 && strlen($username) >= 4 && strlen($password) <= 20 && strlen($password) >= 4){
			if(ctype_alnum($username)){
				if(ctype_alnum($password)){
					$query = "INSERT users (Username, Password, email) ";
					$query .= "VALUES ('";
					$query .= $username."','";
					$query .= $hash."','";
					$query .= $email."')";


					if(!mysql_query($query)){
						echo "The user already exists";
						/*echo "Er is een fout opgetreden met nummer ". mysql_errno().":" . mysql_error();
						echo $query;
						mysql_close($db);
						exit;*/
					}
					else{
						$bedankt .="?id=". mysql_insert_id($db);
						mysql_close($db);
						header("location:$bedankt");
						}
					}else{
						echo "Your password must be alpha numeric";
					}
				}else{
					echo "Your username must be alpha numeric";
				}
			}else{
				echo "Your username or password must be at least 5 and at most 19";
			}
		}else{
			echo "Please fill in all fields";
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