<?php
session_start("et@br");

if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){
    
  header("Location: ../index.php");
}
if($_SESSION['permission'] != "admin"){
	
	header("Location: ../index.php");
}	

$id = $_GET['rule'];
$error = $_GET['effort'];

include "../class/Connection.class";
include "../class/Activity.class";

$job = new Activity();
$job->setId($id);
$job->setError($error);
$job->includeError();

?>
