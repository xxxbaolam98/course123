 <?php 

if (isset($_POST['register_button'])) {

	
	$name = $_POST['name'];
  
    $subject_pattern = '/^[a-zA-Z ]*$/';
    


	$sql1 = "SELECT * FROM subject WHERE name = '$name'";
	$result1 = mysqli_query($db, $sql1); 

	if (mysqli_num_rows($result1) >= 1) {
		$_SESSION['message'] = "subject existed in database";
	} else {

		
       if(!preg_match($subject_pattern, $name) || strlen($name) > 100) {
       $_SESSION['message'] = "Only alphabets and white space allowed";
                  }

            else { 	

		 $sql = "INSERT INTO subject(name) VALUES('$name')";
			$result = mysqli_query($db, $sql);
			
			
			header("location: admin.php?adminpage=addSubject"); //redirect to home after registering successfully
               
			
		} 
	}
	
}

?>






  <div class="row">
   	<div class="col-md-4"></div>
   	<div class="col-md-4">

	<div class="header" align="center"> 
		<h1> Add Subject </h1>
 <?php 
	if (isset($_SESSION['message'])) {
		echo "<div id = 'error_msg'>".$_SESSION['message']."</div";
		unset($_SESSION['message']);
	} 
	?>
	</div>


	<form method="POST" action="admin.php?adminpage=addSubject"  class="beta-form-checkout">
		<table>
			 <div class="form-group">
			<tr>
				<td>Subject name: </td>
				<td><input type="text" name="name" class="form-control" required></td>
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
