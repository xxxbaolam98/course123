<?php 
	$subject_sql = "SELECT * FROM subject";
	if($subject_query = mysqli_query($db,$subject_sql)) {
  $subject = mysqli_fetch_assoc($subject_query);
 }
 $list = 0;
 ?>

  <div align ="right">
 <form  class="form-inline" action="admin.php?adminpage=search" method="post" enctype="multipart/form-data">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchtext2">
      <button class="btn btn-outline-success" type="submit" name="search2">Search</button>
    </form> </div>


	
	<div class = "header">
		<h3 align="center">subject table</h3>
	</div> <br>

	
	<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-10 col-md-offset-1">
            <table class="table">
             
                <thead>
                    <tr>
                       <th>list</th>                  
                        <th>subject</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                   
                     
                    <tr>
                         <?php do {  $list = $list + 1;   ?>
                      

                    	<td>
                           
                                <h5><?= $list; ?></h5>
                                                 
                        </td>
                      


                        <td class=""><strong><a href="admin.php?adminpage=adminCourse&IDsubject=<?=$subject['id'];?>" style="text-decoration-color: none;"><?= $subject['name']; ?>
                             </a> </strong></td>

                         <td>
                        <a href = "admin.php?adminpage=editSubject&ID=<?=$subject['id'];?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span> Edit</a>
                        </td>
                        <td>
                        <a href = "admin.php?adminpage=deleteSubject&ID=<?=$subject['id'];?>" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove</a>
                        </td>
                  
                    </tr>
                  <?php } while($subject = mysqli_fetch_assoc($subject_query)); ?>

                                       
                
                    

                 

                </tbody>
           

            </table>
             <a href = "admin.php?adminpage=addSubject" class="btn btn-success">
                            <span class="glyphicon glyphicon-remove"></span> add new subject</a>
        </div>
    </div>
</div>

