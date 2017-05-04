<?php
session_start("et@br");

if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){
    
  header("Location:https://resultadospesquisasatisfacao.herokuapp.com/index.php");
}
if($_SESSION['permission'] != "admin"){
	
	header("Location: https://resultadospesquisasatisfacao.herokuapp.com/index.php");
}	

$id = $_GET['rule'];
$error = $_GET['effort'];

include "https://resultadospesquisasatisfacao.herokuapp.com/class/Connection.class";
include "https://resultadospesquisasatisfacao.herokuapp.com/class/Activity.class";

$job = new Activity();
$job->setId($id);
$job->setError($error);
$job->includeError();

?>
