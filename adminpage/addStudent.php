  <?php 

if (isset($_POST['register_button'])) {

	
	$student_id = mysqli_real_escape_string($db, $_POST['studentID']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$password2 = mysqli_real_escape_string($db, $_POST['password2']);
	$fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $datebirth = $_POST['datebirth'];
    $datebirth1 = date("Y-m-d", strtotime($datebirth));
    $freshmen_year = $_POST['year'];
    $gender = $_POST['gender'];
    $condition = $_POST['condition'];

	 $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $special_char = preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $password);
    $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $name_pattern = '/^[a-zA-Z ]*$/';

       $studentID_pattern = substr($student_id, 0, 2);

    


	$sql1 = "SELECT * FROM student WHERE student_id = '$student_id'";
	$result1 = mysqli_query($db, $sql1); 

	if (mysqli_num_rows($result1) >= 1) {
		$_SESSION['message'] = "Username existed in database";
	} else {

		 if( empty($student_id) || strlen($password) == 0 || strlen($password2) == 0 ) {
			$_SESSION['message'] = "Not enough info!"; 
		}

		else if(!(is_numeric($student_id)) || $studentID_pattern < 18 || strlen($student_id) !== 10) {
   $_SESSION['message'] = "student ID must contain 10 numbers and 2 first numbers must be greater than 17";

      }

      else if(!preg_match($name_pattern, $fullname) || strlen($fullname) > 100) {
       $_SESSION['message'] = "Only alphabets and white space allowed";
                  }

 else if(!preg_match($email_pattern, $email)) {
			$_SESSION['message'] = "Invalid email"; 

		} 

		  else if(strlen($password) < 6) {
			$_SESSION['message'] = "password must be more than 6 characters"; 

		} 

		else if(!$uppercase || !$lowercase || !$special_char || !$number){
          $_SESSION['message'] = "password must have at least 1 uppercase and lowercase and special characters";			
		}

		 

		 else if(!(is_numeric($phone)) || strlen($phone) > 12 || strlen($phone) < 9){
   $_SESSION['message'] = "must be a list of numbers and greater than 10 and less than 12";

      } 
            else if($freshmen_year < 2018) {
       $_SESSION['message'] = "the year must be greater than 2017";            	
            }

             else if($password !== $password2) {
			$_SESSION['message'] = "2 passwords do not match, make sure those 2 are matched!";
		}

		  else if ($password == $password2) {
		
			$password = md5($password); //hash the password.
			$sql = "INSERT INTO student(student_id, password, full_name, email, address, phone, date_birth, year_begin, gender, student_condition) VALUES('$student_id', '$password','$fullname','$email','$address','$phone','$datebirth1','$freshmen_year','$gender', '$condition')";
			$result = mysqli_query($db, $sql);
			
			
			header("location: admin.php?adminpage=addStudent"); //redirect to home after registering successfully
               
			
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


	<form method="POST" action="admin.php?adminpage=addStudent"  class="beta-form-checkout">
		<table>
			 <div class="form-group">
			<tr>
				<td>Student ID: </td>
				<td><input type="text" name="studentID" class="form-control" required></td>
			</tr>
		</div>

			 
			 <div class="form-group">
			<tr>
				<td>Full name: </td>
				<td><input type="text" name="fullname"  class="form-control" required></td>
			</tr>
		</div>

		 <div class="form-group">
			<tr>
				<td>Gender: </td>
				<td>

<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
  <label class="form-check-label" for="exampleRadios1">
    male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="female" value="female">
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
				<td><input type="email" name="email"  class="form-control"></td>
			</tr>
		</div>

 <div class="form-group">
			<tr>
				<td>address: </td>
				<td><input type="text" name="address"  class="form-control"></td>
			</tr>
		</div>

<div class="form-group">
			<tr>
				<td>phone number: </td>
				<td><input type="text" name="phone"  class="form-control"></td>
			</tr>
		</div>

		<div class="form-group">
		 <div class='input-group date' id='datetimepicker1'>
			<tr>
				<td>date of birth: </td>
				<td><input type="date" name="datebirth" class="form-control" max="2001-01-01" required>
				 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span></td>
			</tr>
		</div>
		</div>

		<div class="form-group">
			<tr>
				<td>Freshmen year: </td>
				<td><input type="year" min="2016" name="year"  class="form-control" required></td>
			</tr>
		</div>
          
          <div class="form-group">
          	<tr>
          		<td>study condition: </td>
          		<td>
          			<div class="radio">
  <label><input type="radio" name="condition" value="Studying" checked>Studying</label>
</div>

<div class="radio">
  <label><input type="radio" name="condition" value="Reserve">Reserve</label>
</div>

<div class="radio">
  <label><input type="radio" name="condition" value="Quit"> Quit</label>
</div>

          		</td>
          	</tr>
          </div>



		 <div class="form-group">
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password"  class="form-control" required></td>
			</tr>
		</div>

			 <div class="form-group">
			<tr>
				<td>Re-type Password: </td>
				<td><input type="password" name="password2"  class="form-control" required></td>
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
