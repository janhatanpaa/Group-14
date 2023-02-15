<!DOCTYPE html>
<html>
<head>
	<title>Kirjaudu sisään - Rastorinte</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>Sign in</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Username</label>
     	<input type="text" name="uname" placeholder="Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Sign in</button><br>
         <p>New user? <a href="signup.php" class="ca">Create an account</a></p> 
     </form>
</body>
</html>