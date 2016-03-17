<html>
<head>
<title>Account registration</title>

<link rel="stylesheet" type="text/css" href="search.css">
</head>
<body>
<div class="center">
<div class="header">
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="addproject.php">+ Project</a></li>
  <li><a href="addNAW.php">+ Resource</a></li>
  <li><a href="login.php">Log in</a></li>
  <li><a href="adduser.php">Register</a></li>
</ul>
</div>
<div class="hidden">
<div class="centermid">
</head>
<body>
<h2>Add user</h2>
<form action="adduser_submit.php" method="post">
<fieldset>
<p>
<label for="Username">Username</label>
<input type="text" id="username" name="Username" value="" maxlength="20" />
</p>
<p>
<label for="Password">Password</label>
<input type="password" id="password" name="Password" value="" maxlength="20" />
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
