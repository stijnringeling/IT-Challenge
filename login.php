<?php
	session_start();
	include_once("db_connect.inc.php");
	include_once("User.php");
	if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
		$user = new User($_SESSION["sessionID"], $db);
	}
	$from = $_GET["from"];
?>
<html>
<head>
<title>Login</title>


<link rel="stylesheet" type="text/css" href="search.css">
</head>
<body>
<div class="center">
<div class="header">
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="addproject.php">+ Project</a></li>
  <li><a href="addNAW.php">+ Resource</a></li>
  <li><?php
	if(isset($user->ID)){
		echo "<a href=\"logout.php?from=index.php\">Log uit</a>";
	}else{
		echo "<a href=\"login.php?from=index.php\">Log in</a>";
	}?></li>
  <li><a href="adduser.php?from=<?php echo $_SERVER["PHP_SELF"];?>">Register</a></li>
</ul>
</div>
<div class="hidden">
<div class="centermid">
<h2>Login Here</h2>
<form action="login_submit.php" method="post">
<fieldset>
<p>
<label for="Username">Username</label>
<input type="text" id="Username" name="Username" value="" maxlength="20" />
</p>
<p>
<label for="Password">Password</label>
<input type="password" id="Password" name="Password" value="" maxlength="20" />
</p>
<input type="hidden" name="from" value="<?php echo $from;?>"/>
<p>
<input type="submit" value="Login" />
</p>
</fieldset>
</form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.hidden').slideDown(500);
});
</script>
</body>
</html>
