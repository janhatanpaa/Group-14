<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) 
	&& isset($_POST['password'])
    && isset($_POST['firstname']) 
	&& isset($_POST['lastname'])
	&& isset($_POST['email'])
	&& isset($_POST['phn'])
	&& isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$firstname = validate($_POST['firstname']);
	$lastname = validate($_POST['lastname']);
	$email = validate($_POST['email']);
	$phn = validate($_POST['phn']);

	$user_data = 'uname='. $uname. '&firstname='. $firstname. '&lastname='. $lastname. '&email='. $email. '&phn='. $phn;


	if (empty($uname)) {
		header("Location: signup.php?error=Enter username&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Enter password&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re-enter password&$user_data");
	    exit();
	}

	else if(empty($firstname)){
        header("Location: signup.php?error=Enter first name&$user_data");
	    exit();
	}
	else if(empty($lastname)){
        header("Location: signup.php?error=Enter last name&$user_data");
	    exit();
	}
	else if(empty($email)){
        header("Location: signup.php?error=Enter email address&$user_data");
	    exit();
	}
	else if(empty($phn)){
        header("Location: signup.php?error=Enter phonenumber&$user_data");
	    exit();
	}
	else if($pass !== $re_pass){
        header("Location: signup.php?error=Passwords are not the same&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);
		
	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=Käyttäjänimi on varattu&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(user_name, password, firstname, lastname, email, phn) VALUES('$uname', '$pass', '$firstname', '$lastname', '$email', '$phn')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 echo "Account has been created succesfully <br>";
			 echo ' <a href="login.php">Sign in</a>';
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}