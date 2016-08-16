<?php

function connectDB()
{
	$sqlHost = 'localhost';
	$sqlUser = 'root';
	$sqlPass = '';
	$database = 'mydatabase';
	
	$con = mysql_connect($sqlHost, $sqlUser, $sqlPass);
	mysql_select_db($database, $con);

	return $con;
}

?>