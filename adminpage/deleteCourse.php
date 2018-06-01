<?php
   if(isset($_GET['IDsubject'])) {
     $IDsubject = $_GET['IDsubject'];
  if(isset($_GET['ID'])){
  	$delete_ID = "";
  	$delete_ID = $_GET['ID'];
 $delete_sql = "DELETE FROM course WHERE id='$delete_ID'";
 if($delete_query = mysqli_query($db, $delete_sql)) {
 	header("Location: admin.php?adminpage=adminCourse&IDsubject=$IDsubject");
 }


}
}
?>