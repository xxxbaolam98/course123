 <?php 


 if(isset($_GET['IDcourse'])) {
    $IDcourse = "";
   $IDcourse = $_GET['IDcourse'];


if (isset($_POST['register_button'])) {

	
	$student_id = $_POST['studentID'];


	$sql1 = "SELECT * FROM student WHERE student_id = '$student_id'";
	$result_query1 = mysqli_query($db, $sql1);
	$result1 = mysqli_fetch_assoc($result_query1);
	$STUid = $result1['id'];

	$sql2 = "SELECT * FROM enrollment WHERE id_student = '$STUid' and id_course = '$IDcourse'";
	$result2 = mysqli_query($db, $sql2);
       

	if (mysqli_num_rows($result_query1) == 0 || mysqli_num_rows($result_query1) > 1 || mysqli_num_rows($result2) > 0) {
		$_SESSION['message'] = "student not found or student has already registered this course";
	} else {
                  	

		 
		 if(!(is_numeric($student_id)) || strlen($student_id) !== 10) {
   $_SESSION['message'] = "student ID must contain 10 numbers";

      }

     
		  else  {

            $sql_max = "SELECT * from course where id= '$IDcourse'";
			    $max_query = mysqli_query($db, $sql_max);
			    $max = mysqli_fetch_assoc($max_query);
			    $max_stu = $max['max_student'];
			    $count_stu = $max['student_count'];
			    if($count_stu <= $max_stu) {

				$count_stu = $count_stu + 1;
				$student_sql = "UPDATE course SET student_count = '$count_stu' WHERE id = '$IDcourse'";
				$student_query = mysqli_query($db, $student_sql);
			     


		$sql2 = "SELECT * FROM student WHERE student_id = '$student_id'";
	$result2 = mysqli_query($db, $sql2);
		  	if($result = mysqli_fetch_assoc($result2)){
                     $id_Stu = $result['id'];
                                   }
		
			$sql = "INSERT INTO enrollment(id_student, id_course) VALUES('$id_Stu', '$IDcourse')";
			  if($result = mysqli_query($db, $sql)) {


			
			
			header("location: admin.php?adminpage=studentCourse&ID=$IDcourse"); //redirect to home after registering successfully
               }
			} else {
				$_SESSION['message'] = "can not greater than given maximum students";
			}
		} 
	}
	
}

?>






  <div class="row">
   	<div class="col-md-4"></div>
   	<div class="col-md-4">

	<div class="header" align="center"> 
		<h1> Add Student </h1>
 <?php 
	if (isset($_SESSION['message'])) {
		echo "<div id = 'error_msg'>".$_SESSION['message']."</div";
		unset($_SESSION['message']);
	} 
	?>
	</div>


	<form method="POST" action="admin.php?adminpage=addSlot&IDcourse=<?=$IDcourse;?>"  class="beta-form-checkout">
		<table>
			 <div class="form-group">
			<tr>
				<td>Student ID: </td>
				<td><input type="text" name="studentID" class="form-control" required></td>
			</tr>
		</div>

			 
			<tr>
				<td></td>
				<td><input type="submit" name="register_button" value="add" class="btn btn-primary"></td>
			</tr>
		</table>
	</form>
</div>
</div>
<?php
 }
?>