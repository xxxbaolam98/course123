 <?php 

if (isset($_POST['register_button'])) {

	$student_id = mysqli_real_escape_string($db, $_POST['studentID']);
	
	$fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $datebirth = $_POST['datebirth'];
    $datebirth1 = date("Y-m-d", strtotime($datebirth));
    $freshmen_year = $_POST['year'];
    $gender = $_POST['gender'];
      $condition = $_POST['condition'];


    $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $name_pattern = '/^[a-zA-Z ]*$/';
        $studentID_pattern = substr($student_id, 0, 2);


if(isset($_GET['ID'])) {
$student_ID = "";
 $student_ID = $_GET['ID'];
                       
	
	$sql1 = "SELECT * FROM student WHERE student_id = '$student_id' and id != '$student_ID'";
	$result1 = mysqli_query($db, $sql1); 
    

	if (mysqli_num_rows($result1) >= 1) {
		$_SESSION['message'] = "Username existed in database";
	}  else{

		 if( empty($student_id)) {
			$_SESSION['message'] = "Not enough info!"; 
		}

		else if(!(is_numeric($student_id)) || $studentID_pattern < 18  || strlen($student_id) !== 10) {
   $_SESSION['message'] = "student ID must contain 10 numbers and 2 first numbers must be greater than 17";

      }

      else if(!preg_match($name_pattern, $fullname) || strlen($fullname) > 100) {
       $_SESSION['message'] = "Only alphabets and white space allowed";
                  }

 else if(!preg_match($email_pattern, $email)) {
			$_SESSION['message'] = "Invalid email"; 

		} 


		 

		 else if(!(is_numeric($phone)) || strlen($phone) > 12 || strlen($phone) < 9){
   $_SESSION['message'] = "must be a list of numbers and greater than 10 and less than 12";

      } 
            else if($freshmen_year < 2018) {
       $_SESSION['message'] = "the year must be greater than 2017";            	
            }

           

		  else {
		
			$sql = "UPDATE student SET student_id='$student_id', full_name = '$fullname', email = '$email', address = '$address', phone = '$phone', date_birth = '$datebirth1', year_begin = '$freshmen_year', gender = '$gender', student_condition = '$condition' WHERE id=".$_GET['ID'];
			$result = mysqli_query($db, $sql);
			
			
			header("location: admin.php?adminpage=adminStudent"); //redirect to home after registering successfully
               
			
		} 
	}
	}
}

 if(isset($_GET['ID'])) {
 $student_ID = "";
 $student_ID = $_GET['ID'];
 $student_sql = "SELECT * from student where id = '$student_ID'";
 if($student_query = mysqli_query($db,$student_sql)) {
  $student = mysqli_fetch_assoc($student_query);
 }



?>






  <div class="row">
   	<div class="col-md-4"></div>
   	<div class="col-md-4">

	<div class="header" align="center"> 
		<h1> Edit Student </h1>
 <?php 
	if (isset($_SESSION['message'])) {
		echo "<div id = 'error_msg'>".$_SESSION['message']."</div";
		unset($_SESSION['message']);
	} 
	?>
	</div>


	<form method="POST" action="admin.php?adminpage=editStudent&ID=<?=$student_ID;?>"  class="beta-form-checkout">
		<table>
			 <div class="form-group">
			<tr>
				<td>Student ID: </td>
				<td><input type="text" name="studentID" class="form-control" value="<?= $student['student_id']; ?>" required></td>
			</tr>
		</div>

			 
			 <div class="form-group">
			<tr>
				<td>Full name: </td>
				<td><input type="text" name="fullname"  class="form-control" value="<?= $student['full_name']; ?>" required></td>
			</tr>
		</div>

		 <div class="form-group">
			<tr>
				<td>Gender: </td>
				<td>

<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if($student['gender'] == "male") { ?> checked <?php } ?>>
  <label class="form-check-label" for="exampleRadios1">
    male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if($student['gender'] == "female") { ?> checked <?php } ?>>
  <label class="form-check-label" for="exampleRadios2">
    female
  </label>
</div>
 
				</td>
			</tr>
		</div>

			 <div class="form-group">
			<tr>
				<td>email: </td>
				<td><input type="email" name="email" value="<?= $student['email']; ?>"  class="form-control"></td>
			</tr>
		</div>

 <div class="form-group">
			<tr>
				<td>address: </td>
				<td><input type="text" name="address" value="<?= $student['address']; ?>"  class="form-control"></td>
			</tr>
		</div>

<div class="form-group">
			<tr>
				<td>phone number: </td>
				<td><input type="text" name="phone" value="<?= $student['phone']; ?>"  class="form-control"></td>
			</tr>
		</div>

		<div class="form-group">
		 <div class='input-group date' id='datetimepicker1'>
			<tr>
				<td>date of birth: </td>
				<td><input type="date" name="datebirth" class="form-control" value="<?= $student['date_birth']; ?>" required>
				 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span></td>
			</tr>
		</div>
		</div>

		<div class="form-group">
			<tr>
				<td>Freshmen year: </td>
				<td><input type="year" min="2016" name="year" value="<?= $student['year_begin']; ?>"  class="form-control" required></td>
			</tr>
		</div>

	
			 <div class="form-group">
			<tr>
				<td>study condition: </td>
				<td>
					
					<div class="radio">
  <label><input type="radio" name="condition" value="Studying" <?php if($student['student_condition'] == "Studying") { ?> checked <?php } ?>>Studying</label>
</div>

<div class="radio">
  <label><input type="radio" name="condition" value="Reserve" <?php if($student['student_condition'] == "Reserve") { ?> checked <?php } ?>>Reserve</label>
</div>

<div class="radio">
  <label><input type="radio" name="condition" value="Quit" <?php if($student['student_condition'] == "Quit") { ?> checked <?php } ?>> Quit</label>
</div>
				</td>
			</tr>
		</div>
			
			<tr>
				<td></td>
				<td><input type="submit" name="register_button" value="Edit" class="btn btn-primary"></td>
			</tr>
		</table>
	</form>
</div>
</div>
<?php
  }
?>