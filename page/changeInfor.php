<?php 

if (isset($_POST['register_button'])) {

	
	    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];


    $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
                         
	  $IDstudent = $_SESSION['IDstudent'];
	$sql1 = "SELECT * FROM student WHERE student_id = '$IDstudent'";
	$result1 = mysqli_query($db, $sql1); 
    



    if(!preg_match($email_pattern, $email)) {
			$_SESSION['message'] = "Invalid email"; 

		} 


		 

		 else if(!(is_numeric($phone)) || strlen($phone) > 12 || strlen($phone) < 9){
   $_SESSION['message'] = "must be a list of numbers and greater than 10 and less than 12";

      } 

           

		  else {
		
			$sql = "UPDATE student SET email = '$email', address = '$address', phone = '$phone' WHERE student_id= '$IDstudent'";
			$result = mysqli_query($db, $sql);
			
			
			header("location: index.php?page=changeInfor"); //redirect to home after registering successfully
               
			
		} 
	
}
   if(isset($_SESSION['IDstudent'])) {
   	$IDstudent = $_SESSION['IDstudent'];
 
 $student_sql = "SELECT * from student where student_id = '$IDstudent'";
 if($student_query = mysqli_query($db,$student_sql)) {
  $student = mysqli_fetch_assoc($student_query);
 }
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


	<form method="POST" action="index.php?page=changeInfor"  class="beta-form-checkout">
		<table>
			 <div class="form-group">
			<tr>
				<td>Student ID: </td>
				<td><input type="text" name="studentID" class="form-control" value="<?= $student['student_id']; ?>" disabled></td>
			</tr>
		</div>

			 
			 <div class="form-group">
			<tr>
				<td>Full name: </td>
				<td><input type="text" name="fullname"  class="form-control" value="<?= $student['full_name']; ?>" disable></td>
			</tr>
		</div>

		 <div class="form-group">
			<tr>
				<td>Gender: </td>
				<td>

<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if($student['gender'] == "male") { ?> checked <?php } ?> disabled>
  <label class="form-check-label" for="exampleRadios1">
    male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if($student['gender'] == "female") { ?> checked <?php } ?> disabled>
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
				<td><input type="email" name="email" value="<?= $student['email']; ?>"  class="form-control" ></td>
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
				<td><input type="date" name="datebirth" class="form-control" value="<?= $student['date_birth']; ?>" disabled>
				 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span></td>
			</tr>
		</div>
		</div>

		<div class="form-group">
			<tr>
				<td>Freshmen year: </td>
				<td><input type="year" min="2016" name="year" value="<?= $student['year_begin']; ?>"  class="form-control" disabled></td>
			</tr>
		</div>

	
			 <div class="form-group">
			<tr>
				<td>study condition: </td>
				<td>
					
					<div class="radio">
  <label><input type="radio" name="condition" value="Studying" <?php if($student['student_condition'] == "Studying") { ?> checked <?php } ?> disabled>Studying</label>
</div>

<div class="radio">
  <label><input type="radio" name="condition" value="Reserve" <?php if($student['student_condition'] == "Reserve") { ?> checked <?php } ?> disabled>Reserve</label>
</div>

<div class="radio">
  <label><input type="radio" name="condition" value="Quit" <?php if($student['student_condition'] == "Quit") { ?> checked <?php } ?> disabled> Quit</label>
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
