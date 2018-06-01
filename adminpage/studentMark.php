<?php 
 if(isset($_GET['IDcourse']) && isset($_GET['IDstudent'])) {
  $IDcourse = "";
  $IDstudent = "";
  $IDcourse = $_GET['IDcourse'];
  $IDstudent = $_GET['IDstudent'];

	$enroll_sql = "SELECT * FROM enrollment WHERE id_course = '$IDcourse' and id_student = '$IDstudent'";
	if($enroll_query = mysqli_query($db,$enroll_sql)) {
  $enroll = mysqli_fetch_assoc($enroll_query);

 }

  $student_sql = "SELECT * FROM student WHERE id = '$IDstudent'";
if($student_query = mysqli_query($db,$student_sql)) {
  $student = mysqli_fetch_assoc($student_query);

 }

 $list = 0;
 ?>


	
	<div class = "header">
		<h3 align="center">Student' marks </h3>
	</div> <br>

	
	<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-10 col-md-offset-1">
            <table class="table">
             
                <thead>
                    <tr>
                       <th>list</th>                  
                        <th>student ID</th>               
                        <th>Student name</th>
                        <th>Internal mark</th>
                        <th>Final mark</th>
                        <th>Total mark</th>
                        <th>result</th>


                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                   
                     
                    <tr>
                         <?php 
                         do { do {  $list = $list + 1;   ?>
                      

                    	<td>
                           
                                <h5><?= $list; ?></h5>
                                                 
                        </td>
                      


                        <td class=""><strong><?= $student['student_id']; ?>
                              </strong></td>

                               <td class=""><strong><?= $student['full_name']; ?>
                              </strong></td>

                               <td class=""><strong><?= $enroll['internal_mark']; ?>
                              </strong></td>


                                <td class=""><strong><?= $enroll['final_mark']; ?>
                              </strong></td>

                        
                           <td class=""><strong><?= $enroll['total_mark']; ?>
                              </strong></td>

                            <td class=""><strong><?= $enroll['result']; ?>
                              </strong></td>

                               
                               

                        <td>
                        <a href = "admin.php?adminpage=addMark&IDcourse=<?=$IDcourse;?>&IDstudent=<?=$IDstudent;?>" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Edit</a>
                        </td>
                  
                    </tr>
                  <?php 

                      
                      } while($enroll = mysqli_fetch_assoc($enroll_query));
                    } while($student = mysqli_fetch_assoc($student_query));
                   ?>

                                       
                
                    

                 

                </tbody>

            </table>
            
        </div>
    </div>
</div>

<?php 
 }
?>

