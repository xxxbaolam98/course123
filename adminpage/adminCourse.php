<?php 
  if(isset($_GET['IDsubject'])) {
    $IDsubject = $_GET['IDsubject'];

	$course_sql = "SELECT * FROM course WHERE id_subject= '$IDsubject'";
	if($course_query = mysqli_query($db,$course_sql)) {
  $course = mysqli_fetch_assoc($course_query);

 }
$subject_sql = "SELECT * FROM subject where id = '$IDsubject'";
  if($subject_query = mysqli_query($db,$subject_sql)) {
  $subject = mysqli_fetch_assoc($subject_query);
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
                        <th>subject</th>
                        <th>semester</th>


                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                   
                     
                    <tr>
                         <?php 
                          do {
                          do {  $list = $list + 1;   ?>
                      

                    	<td>
                           
                                <h5><?= $list; ?></h5>
                                                 
                        </td>
                      


                        <td class=""><strong><a href="admin.php?adminpage=studentCourse&ID=<?=$course['id'];?>"><?= $course['name']; ?></a>
                              </strong></td>

                                <td class=""><strong><?php if(isset($course['start_date'])) { echo date("d-m-Y",strtotime($course['start_date'])); } ?>
                              </strong></td>

                                <td class=""><strong><?= $course['max_student']; ?>
                              </strong></td>

                                <td class=""><strong><?= $course['student_count']; ?>
                              </strong></td>

                                <td class=""><strong><?php if(isset($course['end_registration'])) { echo date("d-m-Y",strtotime($course['end_registration'])); } ?>
                              </strong></td>

                               <td class=""><strong><?= $subject['name']; ?>
                              </strong></td>

                               <td class=""><strong><?= $course['semester']; ?>
                              </strong></td>

                         <td>
                        <a href = "admin.php?adminpage=editCourse&IDsubject=<?=$IDsubject;?>&ID=<?=$course['id'];?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span> Edit</a>
                        </td>
                        <td>
                        <a href = "admin.php?adminpage=deleteCourse&IDsubject=<?=$IDsubject;?>&ID=<?=$course['id'];?>" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove</a>
                        </td>
                  
                    </tr>
                  <?php 

                      } while($course = mysqli_fetch_assoc($course_query));
                      } while($subject = mysqli_fetch_assoc($subject_query));
                   ?>

                                       
                
                    

                 

                </tbody>

            </table>
             <a href = "admin.php?adminpage=addCourse&IDsubject=<?= $IDsubject;?>" class="btn btn-success">
                            <span class="glyphicon glyphicon-remove"></span> add new course</a>
        </div>
    </div>
</div>

<?php 
 }
?>

