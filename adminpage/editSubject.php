<?php 

if (isset($_POST['register_button'])) {

if(isset($_GET['ID'])) {
$subject_ID = "";
 $subject_ID = $_GET['ID']; 
	

	$name = $_POST['name'];
  
    $subject_pattern = '/^[a-zA-Z ]*$/';

   


	$sql1 = "SELECT * FROM subject WHERE name = '$name' and id != '$subject_ID'";
	$result1 = mysqli_query($db, $sql1); 

	if (mysqli_num_rows($result1) >= 1) {
		$_SESSION['message'] = "subject existed in database";
	} else {

		
       if(!preg_match($subject_pattern, $name) || strlen($fullname) > 100) {
       $_SESSION['message'] = "Only alphabets and white space allowed";
                  }

            else { 	

		 $sql = " UPDATE subject SET  name = '$name' WHERE id ='$subject_ID'";
			$result = mysqli_query($db, $sql);
			
			
			header("location: admin.php?adminpage=adminSubject"); //redirect to home after registering successfully
               
			
		} 
	}
  }	
}

if(isset($_GET['ID'])) {
 $subject_ID = "";
 $subject_ID = $_GET['ID'];
 $subject_sql = "SELECT * from subject where id = '$subject_ID'";
 if($subject_query = mysqli_query($db,$subject_sql)) {
  $subject = mysqli_fetch_assoc($subject_query);
 }

?>






  <div class="row">
   	<div class="col-md-4"></div>
   	<div class="col-md-4">

	<div class="header" align="center"> 
		<h1> Edit Subject </h1>
 <?php 
	if (isset($_SESSION['message'])) {
		echo "<div id = 'error_msg'>".$_SESSION['message']."</div";
		unset($_SESSION['message']);
	} 
	?>
	</div>


	<form method="POST" action="admin.php?adminpage=editSubject&ID=<?= $subject_ID; ?>"  class="beta-form-checkout">
		<table>
			 <div class="form-group">
			<tr>
				<td>Subject name: </td>
				<td><input type="text" name="name" class="form-control" value="<?=$subject['name'];?>" required></td>
			</tr>
		</div>

			 		
			<tr>
				<td></td>
				<td><input type="submit" name="register_button" value="edit" class="btn btn-primary"></td>
			</tr>
		</table>
	</form>
</div>
</div>

<?php
}
?>
