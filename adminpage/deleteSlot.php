<?php
   if(isset($_GET['IDcourse'])) {
     $IDcourse = $_GET['IDcourse'];
  if(isset($_GET['IDstudent'])){
  	$IDstudent = "";
  	$IDstudent = $_GET['IDstudent'];
 $delete_sql = "DELETE FROM enrollment WHERE id_course='$IDcourse' and id_student='$IDstudent'";
 if($delete_query = mysqli_query($db, $delete_sql)) {

      $count_sql = "SELECT * from course where id = '$IDcourse' ";
      $count_query = mysqli_query($db, $count_sql);
      $count = mysqli_fetch_assoc($count_query);
       $delete_stu = $count['student_count'];
       $delete_stu = $delete_stu - 1;


				$student_sql = "UPDATE course SET student_count = '$delete_stu' WHERE id = '$IDcourse'";
				$student_query = mysqli_query($db, $student_sql);




 	header("Location: admin.php?adminpage=studentCourse&ID=$IDcourse");
 }


}
}
?>