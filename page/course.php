<?php 
  if(isset($_GET['IDsubject'])) {
    $IDsubject = $_GET['IDsubject'];

date_default_timezone_set('Asia/Ho_Chi_Minh');
$nowdate = date('Y-m-d');



	$course_sql = "SELECT * FROM course WHERE id_subject= '$IDsubject' AND end_registration >= '$nowdate'";
	if($course_query = mysqli_query($db,$course_sql)) {
  $course = mysqli_fetch_assoc($course_query);

 }


 $list = 0;
 ?>

 <div align ="right">
 <form  class="form-inline" action="admin.php?adminpage=search&IDsubject=<?=$IDsubject;?>" method="post" enctype="multipart/form-data">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchtext3">
      <button class="btn btn-outline-success" type="submit" name="search3">Search</button>
    </form> </div>



	
	<div class = "header">
		<h3 align="center">course table</h3>
	</div> <br>

	
	<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-10 col-md-offset-1">
            <table class="table">
            
                <thead>
                    <tr>
                       <th>list</th>                  
                        <th>course name</th>               
                        <th>start date</th>
                        <th>max students</th>
                        <th>Students registered</th>
                        <th>end regisration</th>
                        <th>semester</th>
                        <th>shedule</th>


                       
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
                      


                        <td class=""><strong><?= $course['name']; ?>
                              </strong></td>

                                <td class=""><strong><?php if(isset($course['start_date'])) { echo date("d-m-Y",strtotime($course['start_date'])); } ?>
                              </strong></td>

                                <td class=""><strong><?= $course['max_student']; ?>
                              </strong></td>

                                <td class=""><strong><?= $course['student_count']; ?>
                              </strong></td>

                                <td class=""><strong><?php if(isset($course['end_registration'])) { echo date("d-m-Y",strtotime($course['end_registration'])); } ?>
                              </strong></td>

                              

                               <td class=""><strong><?= $course['semester']; ?>
                              </strong></td>

                               <td class=""><strong><?= $course['schedule_day']; ?>
                              </strong></td>

                         <td>
                             <?php
                             $IDcourse = "";
                             $IDcourse = $course['id'];
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

                        <a href = "index.php?page=registerStu&IDcourse=<?=$course['id'];?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span> register</a>
                        
                          <?php 
                            }  else {


                         ?>
                         <a href = "index.php?page=cancel&IDcourse=<?=$course['id'];?>" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> cancel</a>

                            <?php
                             }
                           }

                           

                            ?>


                        </td>

                    
                        
                  
                    </tr>
                  <?php 

                      } while($course = mysqli_fetch_assoc($course_query));
                     
                   ?>

                                       
                
                    

                 

                </tbody>

            </table>
           
        </div>
    </div>
</div>

<?php 
 }
?>

