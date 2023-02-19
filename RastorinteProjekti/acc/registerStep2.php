<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['firstname']) 
	&& isset($_POST['lastname'])
    && isset($_POST['uname']) 
	&& isset($_POST['phn'])
	&& isset($_POST['email'])
	&& isset($_POST['password'])
	&& isset($_POST['confirm_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$firstname = validate($_POST['firstname']);
	$lastname = validate($_POST['lastname']);
	$uname = validate($_POST['uname']);
	$phn = validate($_POST['phn']);
	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);
	$confirm_pass = validate($_POST['confirm_password']);

	$user_data = 'firstname='. $firstname. '&lastname='. $lastname. '&uname='. $uname. '&phn='. $phn; '&email='. $email;

	
	if(empty($firstname)){
        header("Location: register.php?error=Enter first name&$user_data");
	    exit();
	}
	
	else if(empty($lastname)){
        header("Location: register.php?error=Enter last name&$user_data");
	    exit();
	}

	else if (empty($uname)) {
		header("Location: register.php?error=Enter username&$user_data");
	    exit();
	}

	else if( ! filter_var($uname)){
        header("Location: register.php?error=Valid username is required&$user_data");
	    exit();
	}
	
	else if(empty($phn)){
        header("Location: register.php?error=Enter phonenumber&$user_data");
	    exit();
	}

	else if(empty($email)){
        header("Location: register.php?error=Enter email address&$user_data");
	    exit();
	}

	else if( ! filter_var($email)){
        header("Location: register.php?error=Valid email is required&$user_data");
	    exit();
	}

	else if(empty($pass)){
        header("Location: register.php?error=Enter password&$user_data");
	    exit();
	}

	else if (strlen($pass) < 8) {
		header("Location: register.php?error=Password must be at least 8 characters&$user_data");
	}

	else if ( ! preg_match("/[a-z]/i",($pass))) {
		header("Location: register.php?error=Password must contain at least one letter&$user_data");
	}

	else if ( ! preg_match("/[0-9]/",($pass))) {
		header("Location: register.php?error=Password must contain at least one number&$user_data");
	}

	else if(empty($confirm_pass)){
        header("Location: register.php?error=Re-enter password&$user_data");
	    exit();
	}

	else if($pass !== $confirm_pass){
        header("Location: register.php?error=Passwords are not the same&$user_data");
	    exit();
	}

	else{

        $pass = md5($pass);
		
	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: register.php?error=Käyttäjänimi on varattu&$user_data");
	        exit();
		}

		$sql = "SELECT * FROM users WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: register.php?error=sähköposti on varattu&$user_data");
	        exit();
		}
		else {
           $sql2 = "INSERT INTO users(user_name, password, firstname, lastname, email, phn) VALUES('$uname', '$pass', '$firstname', '$lastname', '$email', '$phn')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 echo "Account has been created succesfully <br>";
			 echo ' <a href="login.php">Sign in</a>';
	         exit();
           }else {
	           	header("Location: register.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: register.php");
	exit();
}