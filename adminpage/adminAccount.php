<?php 
	$admin_sql = "SELECT * FROM admin";
	if($admin_query = mysqli_query($db,$admin_sql)) {
  $admin = mysqli_fetch_assoc($admin_query);
 }
 $list = 0;
 ?>

	
	<div class = "header">
		<h3 align="center">admin table</h3>
	</div> <br>

	
	<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-10 col-md-offset-1">
            <table class="table">
            
                <thead>
                    <tr>
                       <th>list</th>                  
                        <th>admin</th>
                       
                    </tr>
                </thead>
                <tbody>
                   
                     
                    <tr>
                         <?php do { $list = $list + 1; ?>
                      

                    	<td>
                           
                                <h4><?= $list; ?></h4>
                                                 
                        </td>
                      


                        <td><?= $admin['admin']; ?>
                              </td>



                      
                  
                    </tr>
                  <?php } while($admin = mysqli_fetch_assoc($admin_query)); ?>

                                       
                
                    

                 

                </tbody>

            </table>
             <a href = "admin.php?adminpage=adminSignup" class="btn btn-success">
                            <span class="glyphicon glyphicon-remove"></span> add new admin account</a>
        </div>
    </div>
</div>

