<?php

session_start("et@br");

$user = $_POST['user'];
$password = $_POST['password'];
$name = "Thiago";

include "https://resultadospesquisasatisfacao.herokuapp.com/class/Connection.class";
include "https://resultadospesquisasatisfacao.herokuapp.com/class/User.class";

$validate = new User();
$validate->setLogin($user);
$validate->logon();
echo $validate->getId();
echo $validate->getName();
echo $validate->getLogin();
echo $validate->getPassword();
echo $validate->getPermission();

if($password == $validate->getPassword()){
    
    echo $_SESSION['id'] = $validate->getId();
    echo $_SESSION['name'] = $validate->getName();
    echo $_SESSION['login'] = $validate->getLogin();
    echo $_SESSION['password'] = $validate->getPassword();
    echo $_SESSION['permission'] = $validate->getPermission();
	
    header("Location: https://resultadospesquisasatisfacao.herokuapp.com/pages/home.php?option=home");
}else{
    
    echo "<script text/javascript>alert('User or password invalid')</script>";
    echo "<meta http-equiv='refresh' content='0;URL=https://resultadospesquisasatisfacao.herokuapp.com/index.php'>";
}

?>
