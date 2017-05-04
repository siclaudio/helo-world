<?php
session_start("et@br");

if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){
    
     header("Location: https://resultadospesquisasatisfacao.herokuapp.com/index.php");
}

$login = $_SESSION['login'];
$type = $_POST['type'];
$channel = $_POST['channel'];
$note = $_POST['note'];
$customer = $_POST['customer'];

include "https://resultadospesquisasatisfacao.herokuapp.com/class/Connection.class";
include "https://resultadospesquisasatisfacao.herokuapp.com/class/Activity.class";

$job = new Activity();
$job->setLogin($login);
$job->setType($type);
$job->setChannel($channel);
$job->setNote($note);
$job->setCustomer($customer);
$job->effortValue();
$job->insertActivity();

?>
