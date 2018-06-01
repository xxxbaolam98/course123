<?php
if(isset($_GET['IDcourse'])) {
 $IDcourse = $_GET['IDcourse'];
  $course_sql  =  "SELECT * FROM course WHERE id = '$IDcourse'";
  $course_query = mysqli_query($db, $course_sql);
  $course = mysqli_fetch_assoc($course_query);
  $subject = $course['id_subject'];
  $subject_sql = "SELECT * FROM subject WHERE id = '$subject'";
$subject_query = mysqli_query($db, $subject_sql);
  $subject = mysqli_fetch_assoc($subject_query);

}


?>









<<div class = "header">
		<h3 align="center"><?= $course['name']; ?></h3>
	</div> <br>

	
	<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-10 col-md-offset-1">
            <table class="table">
            
                <thead>
                    <tr>
                        <th>course name</th>               
                        <th>start date</th>
                        <th>teacher</th>
                        <th>schedule</th>
                        <th>location</th>
                        <th>subject</th>
                        <th>semester</th>


                    </tr>
                </thead>
                <tbody>
                   
                     
                    <tr>
                     
                          



                        <td class=""><strong><?= $course['name']; ?>
                              </strong></td>

                                <td class=""><strong><?php if(isset($course['start_date'])) { echo date("d-m-Y",strtotime($course['start_date'])); } ?>
                              </strong></td>
                               <td class=""><strong><?= $course['teacher']; ?>
                              </strong></td>


                               <td class=""><strong><?= $course['schedule_day']; ?>
                              </strong></td>

                                <td class=""><strong><?= $course['location']; ?>
                              </strong></td>

                                <td class=""><strong><?= $subject['name']; ?>
                              </strong></td>

                               <td class=""><strong><?= $course['semester']; ?>
                              </strong></td>

                    </tr>
     
                </tbody>

            </table>
            
        </div>
    </div>
</div>

<?php
  if(isset($_GET['IDcourse']) && isset($_SESSION['IDstudent'])) {
      $IDcourse = $_GET['IDcourse'];
      $IDstudent = $_SESSION['IDstudent'];
      $stu_sql = "SELECT * FROM student where student_id = '$IDstudent'";
      $stu_query = mysqli_query($db, $stu_sql);
      $stu = mysqli_fetch_assoc($stu_query);
      $stu_id = $stu['id'];

$mark_sql = "SELECT * FROM enrollment WHERE id_course = '$IDcourse' and id_student = '$stu_id'";
$mark_query = mysqli_query($db, $mark_sql);
$mark = mysqli_fetch_assoc($mark_query);
}
?>




<div class="container">
  <h3 align="center">student's mark </h3>
           
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>internal mark</th>
        <th>final mark</th>
        <th>total mark</th>
        <th>Result</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?= $mark['internal_mark']; ?></td>
        <td><?= $mark['final_mark']; ?></td>
        <td><?= $mark['total_mark']; ?></td>
        <td><?= $mark['result']; ?></td>

      </tr>
     
    </tbody>
  </table>
</div>
