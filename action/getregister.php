<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/User.php');
	$usr = new User();

	$name	  = $_POST['name'];
	$username = $_POST['username'];
	$email 	  = $_POST['email'];
	$password = $_POST['password'];
	$getRegi  = $usr->userRegistration($name, $username, $email, $password);
?>