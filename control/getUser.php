<?php
session_start("et@br");

if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){
    
     header("Location: https://resultadospesquisasatisfacao.herokuapp.com/index.php");
}

$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$permission = $_POST['permission'];

include "https://resultadospesquisasatisfacao.herokuapp.com/class/Connection.class";
include "https://resultadospesquisasatisfacao.herokuapp.com/class/User.class";

if($_SESSION['permission'] != "admin"){
	
	echo "<script text/javascript>alert('You do not have privilege to create a new Administrator User')</script>";
	echo "<meta http-equiv='refresh' content='0;URL=https://resultadospesquisasatisfacao.herokuapp.com/pages/home.php?option=user'>";
}else if($password == $confirm){

	$user = new User();
	$user->setName($name);
	$user->setLogin($login);
	$user->setPassword($password);
	$user->setPermission($permission);
	$user->insertUser();
} else { 
		
		echo "<script text/javascript>alert('Confirm your Password')</script>";
		echo "<meta http-equiv='refresh' content='0;URL=https://resultadospesquisasatisfacao.herokuapp.com/pages/home.php?option=user'>"; 
	}
?>
