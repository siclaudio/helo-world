<?php
session_start("et@br");

if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){
    
     header("Location: ../index.php");
}

$login = $_SESSION['login'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

include "../class/Connection.class";
include "../class/User.class";

if($password == $confirm){

	$user = new User();
	$user->setLogin($login);
	$user->setPassword($password);
	$user->changePass();
} else { 
		
		echo "<script text/javascript>alert('Confirm your Password')</script>";
		echo "<meta http-equiv='refresh' content='0;URL=../pages/home.php?option=user'>"; 
	}
?>
