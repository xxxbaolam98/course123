<?php
   if(isset($_GET['IDcourse'])) {
     $IDcourse = "";
     $IDcourse = $_GET['IDcourse'];
  if(isset($_SESSION['IDstudent'])){
  	$IDstudent = "";
  	$IDstudent = $_SESSION['IDstudent'];
    $stu_sql = "SELECT * from student where student_id = '$IDstudent'";
    $stu_query = mysqli_query($db, $stu_sql);
    $stu = mysqli_fetch_assoc($stu_query);
    $stuID = $stu['id'];

 $delete_sql = "DELETE FROM enrollment WHERE id_course='$IDcourse' and id_student='$stuID'";
 if($delete_query = mysqli_query($db, $delete_sql)) {

      $count_sql = "SELECT * from course where id = '$IDcourse' ";
      $count_query = mysqli_query($db, $count_sql);
      $count = mysqli_fetch_assoc($count_query);
       $delete_stu = $count['student_count'];
       $delete_stu = $delete_stu - 1;


				$student_sql = "UPDATE course SET student_count = '$delete_stu' WHERE id = '$IDcourse'";
				$student_query = mysqli_query($db, $student_sql);

       $subject_sql  = "SELECT * from course where id = '$IDcourse'";
       $subject_query = mysqli_query($db, $subject_sql);
       $subject = mysqli_fetch_assoc($subject_query);
       $id_sub = $subject['id_subject'];


 	header("Location: index.php?page=course&IDsubject=$id_sub");
 }


}
}
?>