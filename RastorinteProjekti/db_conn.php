<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "test_db";

$conn = mysqli_connect("db", "root", "password", "test_db");

if (!$conn) {
	echo "Connection failed!";
}