<!DOCTYPE html>
<html>
<head>
	<title>Create account - Rastorinte</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>Create account</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>First name</label>
          <?php if (isset($_GET['firstname'])) { ?>
               <input type="text" 
                      name="firstname" 
                      placeholder="Firstname"
                      value="<?php echo $_GET['firstname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="firstname" 
                      placeholder="Firstname"><br>
          <?php }?>
          
          <label>Last name</label>
          <?php if (isset($_GET['lastname'])) { ?>
               <input type="text" 
                      name="lastname" 
                      placeholder="Lastname"
                      value="<?php echo $_GET['lastname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="lastname" 
                      placeholder="lastname"><br>
          <?php }?>


          <label>Username</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Username"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Username"><br>
          <?php }?>
          <label>Phone number</label>
          <?php if (isset($_GET['phn'])) { ?>
               <input type="text" 
                      name="phn" 
                      placeholder="Phone number"
                      value="<?php echo $_GET['phn']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="phn" 
                      placeholder="Phone number"><br>
          <?php }?>
          <label>Email</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="text" 
                      name="email" 
                      placeholder="Email"
                      value="<?php echo $_GET['email']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="email" 
                      placeholder="Email"><br>
          <?php }?>

     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Re-enter password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re-enter password"><br>

     	<button type="submit">Create account</button>
          <p>If you already have an account, <br><a href="index.php" class="ca">sign in</a> </p>
     </form>
</body>
</html>