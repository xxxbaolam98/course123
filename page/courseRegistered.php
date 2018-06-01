<?php 

  if(isset($_SESSION['IDstudent'])) {
  $IDstudent = $_SESSION['IDstudent'];
  $stu_sql = "SELECT * from student where student_id = '$IDstudent'";
  $stu_query = mysqli_query($db, $stu_sql);
  $stu = mysqli_fetch_assoc($stu_query);
  $stu_id = $stu['id'];


  $course_sql = "SELECT *, course.id AS IDcourse ,course.name AS courseName, course.teacher AS courseTeacher, course.semester AS courseSemester, course.id_subject AS subject FROM course join enrollment on course.id = enrollment.id_course WHERE enrollment.id_student = '$stu_id'";
  if($course_query = mysqli_query($db,$course_sql)) {
  $course = mysqli_fetch_assoc($course_query);

 }
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
                        <th>teacher</th>
                        <th>semester</th>
                        <th>Subject</th>
                        
                    </tr>
                </thead>
                <tbody>
                   
                     
                    <tr>
                         <?php 


                          do {  $list = $list + 1; 
                               $IDsubject = $course['subject']; 
                              
                              $subject_sql = "SELECT * FROM subject where id = '$IDsubject'";
  if($subject_query = mysqli_query($db,$subject_sql)) {
  $subject = mysqli_fetch_assoc($subject_query);
}



                           ?>
                      

                      <td>
                           
                                <h5><?= $list; ?></h5>
                                                 
                        </td>
                      


                        <td class=""><strong><a href="index.php?page=courseStudent&IDcourse=<?=$course['IDcourse'];?>"><?= $course['courseName']; ?></a>
                              </strong></td>

                               

                                

                               <td class=""><strong><?= $course['courseTeacher']; ?>
                              </strong></td>

                               <td class=""><strong><?= $course['courseSemester']; ?>
                              </strong></td>
                              
                              <td class=""><strong><?= $subject['name']; ?>
                              </strong></td>
                        
                  
                    </tr>
                  <?php 

                      } while($course = mysqli_fetch_assoc($course_query));
                     
                   ?>

                                       
                
                    

                 

                </tbody>

            </table>
           
        </div>
    </div>
</div>


