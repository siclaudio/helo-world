<?php
session_start("et@br");

if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){
    
     header("Location: https://resultadospesquisasatisfacao.herokuapp.com/index.php");
}
if($_GET['clear'] == "yes"){
	
	$_SESSION['type'] = "";
	$_SESSION['channel'] = "";
	$_SESSION['user'] = "";
}
	
if($_SESSION['type'] == "" && $_SESSION['channel'] == "" && $_SESSION['user'] == ""){
	$_SESSION['type'] = $_POST['type'];
	$_SESSION['channel'] = $_POST['channel'];
	$_SESSION['user'] = $_POST['user'];
}

$page = $_GET['page'];

include "https://resultadospesquisasatisfacao.herokuapp.com/class/Connection.class";
include "https://resultadospesquisasatisfacao.herokuapp.com/class/Activity.class";

echo "<html><head><title>ET@ Brazil</title></head><body>";
echo "<table align='center' cellpadding='3' bgcolor='#000080'>";
echo "<tr><td bgcolor='#1E90FF' width='60px'>Login</td><td bgcolor='#1E90FF' width='150px'>Type</td><td bgcolor='#1E90FF' width='80px' align='center'>Channel</td>";
echo "<td bgcolor='#1E90FF' width='200px'>Note</td><td bgcolor='#1E90FF' width='150px' align='center'>Start Date</td><td bgcolor='#1E90FF' width='150px' align='center'>End Date</td>"; 
echo "<td bgcolor='#1E90FF' width='50px' align='center'>Error</td>";
if($_SESSION['permission'] == "admin"){
echo "<td bgcolor='#1E90FF' width='50px'>Update</td></tr>";
}else{echo "</tr>";}
$job = new Activity();

if($_SESSION['type'] != "" && $_SESSION['channel'] != "" && $_SESSION['user'] != ""){ 
	
	$option = "all";
	$job->setType($_SESSION['type']);
	$job->setChannel($_SESSION['channel']);
	$job->setLogin($_SESSION['user']);
	$job->consultActivity($option, $page);
	
}
else if($_SESSION['type'] != "" && $_SESSION['channel'] != "" && $_SESSION['user'] == ""){ 
	
	$option = "both1"; 
	$job->setChannel($_SESSION['channel']);
	$job->setType($_SESSION['type']);
	$job->consultActivity($option, $page);
}
else if($_SESSION['type'] != "" && $_SESSION['channel'] == "" && $_SESSION['user'] != ""){ 
	
	$option = "both2"; 
	$job->setLogin($_SESSION['user']);
	$job->setType($_SESSION['type']);
	$job->consultActivity($option, $page);
}
else if($_SESSION['type'] == "" && $_SESSION['channel'] != "" && $_SESSION['user'] != ""){ 
	
	$option = "both3"; 
	$job->setLogin($_SESSION['user']);
	$job->setChannel($_SESSION['channel']);
	$job->consultActivity($option, $page);
}
else if($_SESSION['type'] != "" && $_SESSION['channel'] == "" && $_SESSION['user'] == ""){ 
	
	$option = "type"; 
	$job->setType($_SESSION['type']);
	$job->consultActivity($option, $page);	
}
else if($_SESSION['type'] == "" && $_SESSION['channel'] == "" && $_SESSION['user'] != ""){ 
	
	$option = "user"; 
	$job->setLogin($_SESSION['user']);
	$job->consultActivity($option, $page);	
}
else if($_SESSION['type'] == "" && $_SESSION['channel'] != "" && $_SESSION['user'] == ""){ 
	
	$option = "channel"; 
	$job->setChannel($_SESSION['channel']);
	$job->consultActivity($option, $page);	
}
else if($_SESSION['type'] == "" && $_SESSION['channel'] == "" && $_SESSION['user'] == ""){ 
		
		//echo "<script text/javascript>alert('You should fill one or more fields to complete the search!')</script>";
		echo "<meta http-equiv='refresh' content='0;URL=https://resultadospesquisasatisfacao.herokuapp.com/pages/home.php?option=activity'>";
}
echo "</table></body></html>";  
?>
 
