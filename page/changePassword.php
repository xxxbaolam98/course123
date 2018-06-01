<?php 
		if(isset($_POST['re_password']))
		{

				if(isset($_SESSION['IDstudent'])) {
	
		$old_pass=$_POST['old_pass'];
		$new_pass=$_POST['new_pass'];
		$re_pass=$_POST['re_pass'];

		 $uppercase = preg_match('@[A-Z]@', $new_pass);
    $lowercase = preg_match('@[a-z]@', $new_pass);
    $number    = preg_match('@[0-9]@', $new_pass);
    $special_char = preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $new_pass);

		$IDstudent = $_SESSION['IDstudent'];
		  $stu_sql  = "SELECT * from student where student_id ='$IDstudent'";
		  $stu_query = mysqli_query($db, $stu_sql);
	
		
		$data_pwd=$stu['password'];
		$id_stu = $stu['id'];
		$old_pass = md5($old_pass);
		if($data_pwd !== $old_pass){
		  $_SESSION['message'] ="Your old password is wrong";
		}
		  else {

		  	  if(strlen($new_pass) < 6) {
			$_SESSION['message'] = "password must be more than 6 characters"; 

		} 

		else if(!$uppercase || !$lowercase || !$special_char || !$number){
          $_SESSION['message'] = "password must have at least 1 uppercase and lowercase and special characters";			
		}


		else if($new_pass !== $re_pass){
             $_SESSION['message'] = "Your new and Retype Password is not match";
         } else {

			$new_pass = md5($new_pass);
			$update_sql = "UPDATE student set password='$new_pass' where id='$id_stu'";
			$update_pwd=mysqli_query($db, $update_sql);
			echo "<script>alert('Update Sucessfully'); window.location='index.php?page=changePassword'</script>";
		}
		}
		
		}
		
	
	    }

	
	?>

	 <div class="row">
   	<div class="col-md-4"></div>
   	<div class="col-md-4">

	<div class="header" align="center"> 
		<h1> change password </h1>
 <?php 
	if (isset($_SESSION['message'])) {
		echo "<div id = 'error_msg'>".$_SESSION['message']."</div";
		unset($_SESSION['message']);
	}    ?>
	</div>


	<form method="POST" action="index.php?page=changePassword"  class="beta-form-checkout">
		<table>
			 <div class="form-group">
			<tr>
				<td>old password: </td>
				<td><input type="password" name="old_pass" class="form-control" required></td>
			</tr>
		</div>

			 
			 <div class="form-group">
			<tr>
				<td>new password: </td>
				<td><input type="password" name="new_pass"  class="form-control" required></td>
			</tr>
		</div>

			 <div class="form-group">
			<tr>
				<td>Re-type Password: </td>
				<td><input type="password" name="re_pass"  class="form-control" required></td>
			</tr>
		</div>

			<tr>
				<td></td>
				<td><input type="submit" name="re_password" value="change password" class="btn btn-primary"></td>
			</tr>
		</table>
	</form>
</div>
</div>