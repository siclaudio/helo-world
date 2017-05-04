<?php
session_start("et@br");

if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){
    
     header("Location: https://resultadospesquisasatisfacao.herokuapp.com/index.php");
}

$login = $_SESSION['login'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

include "https://resultadospesquisasatisfacao.herokuapp.com/class/Connection.class";
include "https://resultadospesquisasatisfacao.herokuapp.com/class/User.class";

if($password == $confirm){

	$user = new User();
	$user->setLogin($login);
	$user->setPassword($password);
	$user->changePass();
} else { 
		
		echo "<script text/javascript>alert('Confirm your Password')</script>";
		echo "<meta http-equiv='refresh' content='0;URL=https://resultadospesquisasatisfacao.herokuapp.com/pages/home.php?option=user'>"; 
	}
?>
