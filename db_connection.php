<?php 

function openConn(){
	$dbhost ="localhost";
	$dbuser ="root";
	$dbpass ='';
	$db = "examgame_db";
	
	$conn = new mysqli($dbhost,$dbuser,$dbpass,$db) ;
	
	if(!$conn){
		die("Connection failed");
	}
	return $conn;
	
}

function closeConn($conn){
	$conn -> close();
}
?>