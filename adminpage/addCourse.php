<?php 
  if(isset($_GET['IDsubject'])) {

if (isset($_POST['register_button'])) {
	
	$name = $_POST['name'];
	$startdate = $_POST['start_date'];
	$scheduleday = $_POST['schedule'];
	$maxstudent = $_POST['max_student'];
	$location = $_POST['location'];
	$end_registration = $_POST['end_registration'];
    $teacher = $_POST['teacher'];
	$IDsubject = $_GET['IDsubject'];
	$semester = $_POST['semester'];

	$semester1 = explode(" ", $semester);
	$semester3_pattern = '/^[0-9]+$/';

  
    $name1 = substr($name, 0, 3);
    $name1_pattern = '/^[A-Z]+$/';
    $name2 = substr($name, 3, 3);
    $name2_pattern = '/^[0-9]+$/';

    $location1 = substr($location, 0, 1);
    $location1_pattern = '/^[A-Z]+$/';
    $location2 = substr($location, 1, 3);
    $location2_pattern = '/^[0-9]+$/';
    $teacher_pattern = preg_match('/^[A-Z][a-zA-Z -]+$/', $teacher);

    


	$sql1 = "SELECT * FROM course WHERE name = '$name'";
	$result1 = mysqli_query($db, $sql1); 

	if (mysqli_num_rows($result1) >= 1) {
		$_SESSION['message'] = "course existed in database";
	} else {

		
       if(strlen($name) > 6) {
       $_SESSION['message'] = " less than or equal to 6 characters";
                  }
            
            else if(!preg_match($name1_pattern, $name1) || !preg_match($name2_pattern, $name2)) {
       $_SESSION['message'] = "invalid name";
                  }

             else if(strlen($location) > 4) {
           $_SESSION['message'] = "less than or equal to 4 characters";
             }

              else if(!preg_match($location1_pattern, $location1) || !preg_match($location2_pattern, $location2)) {
       $_SESSION['message'] = "invalid location";
                  } 

                  else if(!$teacher_pattern) {
       $_SESSION['message'] = "invalid teacher's name. teacher  must contain letters, dashes and spaces only and must start with upper case letter";
                  

                  }

                  else if (strlen($semester) > 11 || !preg_match($semester3_pattern, $semester1[1]) || $semester1[1] < 2017) {
$_SESSION['message'] = "invalid semester";

                  } else if($semester1[0] !== "Spring" && $semester1[0] !== "Fall")   {
                  	$_SESSION['message'] ="invalid semester";
                  }


            else { 	

		 $sql = "INSERT INTO course(name, start_date, schedule_day, max_student, location, end_registration,teacher, id_subject, semester) VALUES('$name', '$startdate', '$scheduleday', '$maxstudent', '$location', '$end_registration','$teacher' ,'$IDsubject', '$semester')";
			$result = mysqli_query($db, $sql);
			
			
			header("location: admin.php?adminpage=adminCourse&IDsubject=$IDsubject"); //redirect to home after registering successfully
               
			
		} 
	}
	

}

?>






  <div class="row">
   	<div class="col-md-4"></div>
   	<div class="col-md-4">

	<div class="header" align="center"> 
		<h1> Add Course </h1>
 <?php 
	if (isset($_SESSION['message'])) {
		echo "<div id = 'error_msg'>".$_SESSION['message']."</div";
		unset($_SESSION['message']);
	} 
		$IDsubject = $_GET['IDsubject'];

	?>
	
	</div>


	<form method="POST" action="admin.php?adminpage=addCourse&IDsubject=<?= $IDsubject;?>" class="beta-form-checkout">
		<table>
			 <div class="form-group">
			<tr>
				<td>Course name: </td>
				<td><input type="text" name="name" class="form-control" required></td>
			</tr>
		</div>

		<div class="form-group">
		 <div class='input-group date' id='datetimepicker1'>
			<tr>
				<td>start date: </td>
				<td><input type="date" name="start_date" class="form-control" min="2018-05-29" required>
				 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span></td>
			</tr>
		</div>
		</div>

		<div class="form-group">
			<tr>
				<td>schedule: </td>
				<td>
<input type="text"  name="schedule" class="form-control" required>

</td>
			</tr>
		</div>



		 <div class="form-group">
			<tr>
				<td>max students: </td>
				<td><input type="number" max="100" min="25" name="max_student" class="form-control" required></td>
			</tr>
		</div>

 <div class="form-group">
			<tr>
				<td>Location: </td>
				<td><input type="text"  name="location" class="form-control" required></td>
			</tr>
		</div>

		<div class="form-group">
			<tr>
				<td>Teacher: </td>
				<td><input type="text"  name="teacher" class="form-control" required></td>
			</tr>
		</div>

		<div class="form-group">
			<tr>
				<td>Semester: </td>
				<td><input type="text"  name="semester" class="form-control" required></td>
			</tr>
		</div>

<div class="form-group">
		 <div class='input-group date' id='datetimepicker1'>
			<tr>
				<td>end registration: </td>
				<td><input type="date" name="end_registration" class="form-control" required>
				 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span></td>
			</tr>
		</div>
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