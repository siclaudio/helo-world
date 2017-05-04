<?php
session_start("et@br");

if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){
    
     header("Location: https://resultadospesquisasatisfacao.herokuapp.com/index.php");
}

$login = $_SESSION['login'];
$start = $_POST['start'];
$end = $_POST['end'];
$kind = $_GET['kind'];
$type = $_GET['type'];
if($type == "customer"){
	$customer = $_POST['customer'];
}	

include "https://resultadospesquisasatisfacao.herokuapp.com/class/Connection.class";
include "https://resultadospesquisasatisfacao.herokuapp.com/class/Activity.class";

$job = new Activity();
$job->setLogin($login);
$job->setStartDate($start);
$job->setEndDate($end);
$job->setCustomer($customer);
$job->report($kind, $type);


?>
