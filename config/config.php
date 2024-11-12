<?php 
session_start();
$siteTitle = "www.faculty.com |welcome to skit";
$siteURL = "http://".$_SERVER['HTTP_HOST']."/skit_faculty";
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'booking';
$conn =  mysqli_connect ($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
	echo"database connection error";
}
?>