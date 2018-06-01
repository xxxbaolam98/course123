<?php
session_start();
$db = mysqli_connect('127.0.0.1','root','','course_registration');
if(mysqli_connect_errno()){
	echo 'Database connection failed with following error: '.mysqli_connect_error();
	die();

}
?>