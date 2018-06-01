<?php 
session_destroy();
unset($_SESSION['IDstudent']);
$SESSION['message'] = "Logged out";
header("location: index.php?page=login");
 ?>