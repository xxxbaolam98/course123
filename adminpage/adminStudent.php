<?php 
	$student_sql = "SELECT * FROM student";
	if($student_query = mysqli_query($db,$student_sql)) {
  $student = mysqli_fetch_assoc($student_query);
 }
 $list = 0;
 ?>
   <div align ="right">
 <form  class="form-inline" action="admin.php?adminpage=search" method="post" enctype="multipart/form-data">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchtext">
      <button class="btn btn-outline-success" type="submit" name="search">Search</button>
    </form> </div>
	
	<div class = "header">
		<h3 align="center">Student table</h3>
	</div> <br>

	
	<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-10 col-md-offset-1">
            <table class="table">
             
                <thead>
                    <tr>
                       <th>list</th>                  
                        <th >Student ID</th>
                        <th>Full Name</th>
                        <th>Gender</th>

                        <th>date of birth</th>
                        <th>Freshmen year</th>
                        <th>email</th>
                        <th>address</th>
                        <th>condition</th>
                       
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                   
                     
                    <tr>
                         <?php do {  $list = $list + 1;   ?>
                      

                    	<td>
                           
                                <h5><?= $list; ?></h5>
                                                 
                        </td>
                      


                        <td class=""><strong><?= $student['student_id']; ?>
                              </strong></td>



                       
                        <td><strong><?= $student['full_name']; ?></strong></td>
                         <td><strong><?= $student['gender']; ?></strong></td>

                        <td><strong><?php if(isset($student['date_birth'])) { echo date("d-m-Y",strtotime($student['date_birth'])); } ?></strong></td>

                          <td><strong><?= $student['year_begin']; ?></strong></td>

                           <td><strong><?= $student['email']; ?></strong></td>
                            <td><strong><?= $student['address']; ?></strong></td>
                              <td><strong><?= $student['student_condition']; ?></strong></td>
                         
                         <td>
                        <a href = "admin.php?adminpage=editStudent&ID=<?=$student['id'];?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span> Edit</a>
                        </td>
                       
                  
                    </tr>
                  <?php } while($student = mysqli_fetch_assoc($student_query)); ?>

                                       
                
                    

                 

                </tbody>

            </table>
             <a href = "admin.php?adminpage=addStudent" class="btn btn-success">
                            <span class="glyphicon glyphicon-remove"></span> add new student account</a>
        </div>
    </div>
</div>

