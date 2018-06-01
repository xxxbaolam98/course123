<?php
if(isset($_GET['IDcourse']) && isset($_GET['IDstudent'])) {

$IDcourse = $_GET['IDcourse'];
$IDstudent = $_GET['IDstudent'];


if (isset($_POST['register_button'])) {

	
	$internal = $_POST['internal'];
	$final =  $_POST['final'];
	$result = "";
$total = ($internal/100*40) + ($final/100*60);
            	 if($total < 5) {
            	 	$result = "failed";
            	 } else {
            	 	$result = "passed";
            	 }

	

	if (!is_double($internal) && !is_double($final) && !is_double($total)) {
		$_SESSION['message'] = "the marks must be numeric";
	} 

            else { 	
            	  
            	

		 $sql = "UPDATE enrollment SET internal_mark='$internal', final_mark='$final', total_mark='$total', result = '$result' where id_course = '$IDcourse' and id_student='$IDstudent'";
			$result = mysqli_query($db, $sql);
			
			
			header("location: admin.php?adminpage=studentMark&IDcourse=$IDcourse&IDstudent=$IDstudent"); //redirect to home after registering successfully
               
			
		} 
	
	
     }


?>

<div class="row">
   	<div class="col-md-4"></div>
   	<div class="col-md-4">

	<div class="header" align="center"> 
		<h1> Add marks </h1>
 <?php 
	if (isset($_SESSION['message'])) {
		echo "<div id = 'error_msg'>".$_SESSION['message']."</div";
		unset($_SESSION['message']);
		
	} 
	?>
	</div>


	<form method="POST" action="admin.php?adminpage=addMark&IDcourse=<?=$IDcourse;?>&IDstudent=<?=$IDstudent;?>"  class="beta-form-checkout">
		<table>
			 <div class="form-group">
			<tr>
				<td>internal mark: </td>
				<td><input type="text" name="internal" class="form-control" required></td>
			</tr>
		</div>
		 <div class="form-group">
			<tr>
				<td>final mark: </td>
				<td><input type="text" name="final" class="form-control"></td>
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