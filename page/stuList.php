<?php 
 if(isset($_GET['ID'])) {
  $IDcourse = "";
  $IDcourse = $_GET['ID'];

	$enroll_sql = "SELECT *,student.id AS stuID, student.gender AS gender, student.full_name AS studentName, student.date_birth AS studentDATE FROM student JOIN enrollment ON student.id = enrollment.id_student WHERE enrollment.id_course = '$IDcourse'";
	if($enroll_query = mysqli_query($db,$enroll_sql)) {
  $enroll = mysqli_fetch_assoc($enroll_query);

 }


 $list = 0;
 ?>

	
	<div class = "header">
		<h3 align="center">students sign up for the course </h3>
	</div> <br>

	
	<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-10 col-md-offset-1">
            <table class="table">
             
                <thead>
                    <tr>
                       <th>list</th>                  
                        <th>Student name</th>
                        <th>date of birth</th>
                        <th>gender</th>               


                    </tr>
                </thead>
                <tbody>
                   
                     
                    <tr>
                         <?php 
                          do {  $list = $list + 1;   ?>
                      

                    	<td>
                           
                                <h5><?= $list; ?></h5>
                                                 
                        </td>
                      


                       

                               <td class=""><strong><?= $enroll['studentName']; ?>
                              </strong></td>


                                <td class=""><strong><?php if(isset($enroll['studentDATE'])) { echo date("d-m-Y",strtotime($enroll['studentDATE'])); } ?>
                              </strong></td>

                               <td class=""><strong><?= $enroll['gender']; ?>
                              </strong></td>
                  
                    </tr>
                  <?php 

                      
                      } while($enroll = mysqli_fetch_assoc($enroll_query));
                   ?>

              </tbody>

            </table>
            <div class="row" text-align="right">
              <a href="index.php?page=subject"> go back to subjects</a>

<?php
                             $IDcourse = "";
                             $IDcourse = $_GET['ID'];
                             $student_id = "";

                             if(isset($_SESSION['IDstudent'])) {
                             $student_id = $_SESSION['IDstudent'];



$sql1 = "SELECT * FROM student WHERE student_id = '$student_id'";
  $result_query1 = mysqli_query($db, $sql1);
  $result1 = mysqli_fetch_assoc($result_query1);
  $STUid = $result1['id'];

  $sql2 = "SELECT * FROM enrollment WHERE id_student = '$STUid' and id_course = '$IDcourse'";

  $result2 = mysqli_query($db, $sql2);    

  if (mysqli_num_rows($result2) == 0) {

                             ?>

                        <a href = "index.php?page=registerStu&IDcourse=<?=$IDcourse;?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span> register</a>
                        
                          <?php 
                            }  else {


                         ?>



            
             <a href = "index.php?page=cancel&IDcourse=<?=$IDcourse;?>" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> cancel registration</a>
                     <?php
                      }
                    }



                     ?>
      </div>

        </div>
    </div>
</div>

<?php 
 }
?>

