<?php 
 if(isset($_GET['ID'])) {
  $IDcourse = "";
  $IDcourse = $_GET['ID'];

	$enroll_sql = "SELECT *,student.id AS stuID, student.student_id AS studentID, student.full_name AS studentName, student.date_birth AS studentDATE FROM student JOIN enrollment ON student.id = enrollment.id_student WHERE enrollment.id_course = '$IDcourse'";
	if($enroll_query = mysqli_query($db,$enroll_sql)) {
  $enroll = mysqli_fetch_assoc($enroll_query);

 }


 $list = 0;
 ?>

	
	<div class = "header">
		<h3 align="center">the number of student sign up for the course </h3>
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
                        <th>date of birth</th>


                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                   
                     
                    <tr>
                         <?php 
                          do {  $list = $list + 1;   ?>
                      

                    	<td>
                           
                                <h5><?= $list; ?></h5>
                                                 
                        </td>
                      


                        <td class=""><strong><a href="admin.php?adminpage=studentMark&IDcourse=<?=$IDcourse;?>&IDstudent=<?=$enroll['stuID'];?>"><?= $enroll['studentID']; ?></a>
                              </strong></td>

                               <td class=""><strong><?= $enroll['studentName']; ?>
                              </strong></td>


                                <td class=""><strong><?php if(isset($enroll['studentDATE'])) { echo date("d-m-Y",strtotime($enroll['studentDATE'])); } ?>
                              </strong></td>

                               
                               

                        <td>
                        <a href = "admin.php?adminpage=deleteSlot&IDcourse=<?=$IDcourse;?>&IDstudent=<?=$enroll['stuID'];?>" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove</a>
                        </td>
                  
                    </tr>
                  <?php 

                      
                      } while($enroll = mysqli_fetch_assoc($enroll_query));
                   ?>

                                       
                
                    

                 

                </tbody>

            </table>
             <a href = "admin.php?adminpage=addSlot&IDcourse=<?=$IDcourse;?>" class="btn btn-success">
                            <span class="glyphicon glyphicon-remove"></span> add student</a>
        </div>
    </div>
</div>

<?php 
 }
?>

