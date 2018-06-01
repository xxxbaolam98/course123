<?php 

if(isset($_POST['search'])){
	$search=$_POST['searchtext'];
	if(empty($search)){
		header("Location:admin.php?adminpage=adminStudent");
	}

	$sql_search = "SELECT * FROM student WHERE `full_name` LIKE '%$search%' or `student_id` LIKE '%$search%'";
   $list = 0;
   if(!empty($sql_search)){
   
   
    $query_search = mysqli_query($db,$sql_search);
     if($query_search= mysqli_query($db,$sql_search)){
     $search = mysqli_fetch_assoc($query_search);	
     }
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-10 col-md-offset-1">
            <table class="table">
              <form action="index.php?page=updatecart" method="post">
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
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                   
                     
                    <tr>
                         <?php do {  $list = $list + 1;   ?>
                      

                    	<td>
                           
                                <h5><?= $list; ?></h5>
                                                 
                        </td>
                      


                        <td class=""><strong><?= $search['student_id']; ?>
                              </strong></td>



                       
                        <td><strong><?= $search['full_name']; ?></strong></td>
                         <td><strong><?= $search['gender']; ?></strong></td>

                        <td><strong><?php if(isset($search['date_birth'])) { echo date("d-m-Y",strtotime($search['date_birth'])); } ?></strong></td>

                          <td><strong><?= $search['year_begin']; ?></strong></td>

                           <td><strong><?= $search['email']; ?></strong></td>
                            <td><strong><?= $search['address']; ?></strong></td>
                              <td><strong><?= $search['student_condition']; ?></strong></td>

                               <td>
                        <a href = "admin.php?adminpage=editStudent&ID=<?=$search['id'];?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span> Edit</a>
                        </td>
                         
                       
                  
                    </tr>
                  <?php } while($search = mysqli_fetch_assoc($query_search));
                     
                     }


                     if(isset($_POST['search2'])){
	$search2=$_POST['searchtext2'];
	if(empty($search2)){
		header("Location:admin.php?adminpage=adminSubject");
	}

	$sql_search2 = "SELECT * FROM subject WHERE `name` LIKE '%$search2%'";
   $list2 = 0;
   if(!empty($sql_search2)){
   
   
    $query_search2 = mysqli_query($db,$sql_search2);
     if($query_search2= mysqli_query($db,$sql_search2)){
     $search2 = mysqli_fetch_assoc($query_search2);	
     }
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-10 col-md-offset-1">
            <table class="table">
              <form action="index.php?page=updatecart" method="post">
                <thead>
                    <tr>
                       <th>list</th>                  
                        <th >name</th>
                        
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                   
                     
                    <tr>
                         <?php do {  $list2 = $list2 + 1;   ?>
                      

                    	<td>
                           
                                <h5><?= $list2; ?></h5>
                                                 
                        </td>
                      


                        <td class=""><strong><a href="admin.php?adminpage=adminCourse&IDsubject=<?=$search2['id'];?>"><?= $search2['name']; ?></a>
                              </strong></td>



                       
                        

                               <td>
                        <a href = "admin.php?adminpage=editSubject&ID=<?=$search2['id'];?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span> Edit</a>
                        </td>
                         
                           <td>
                        <a href = "admin.php?adminpage=deleteSubject&ID=<?=$search2['id'];?>" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> remove</a>
                        </td>
                         
                       
                  
                    </tr>
                  <?php } while($search2 = mysqli_fetch_assoc($query_search2));
                     
                     }

                   ?>



<?php 

if(isset($_POST['search3'])){
	if(isset($_GET['IDsubject'])) {
		$IDsubject = $_GET['IDsubject'];
	$search3=$_POST['searchtext3'];
	if(empty($search3)){
		header("Location:admin.php?adminpage=adminCourse&IDsubject=$IDsubject");
	}

	$sql_search3 = "SELECT * FROM course WHERE `name` LIKE '%$search3%' AND id_subject= '$IDsubject' ";
   $list = 0;
   if(!empty($sql_search3)){
   
   
    $query_search3 = mysqli_query($db,$sql_search3);
     if($query_search3= mysqli_query($db,$sql_search3)){
     $search3 = mysqli_fetch_assoc($query_search3);	
     }
}


$sql_subject = "SELECT * FROM subject WHERE id= '$IDsubject' ";
   $list3 = 0;
   if(!empty($sql_subject)){
   
   
    $query_subject = mysqli_query($db,$sql_subject);
     if($query_subject= mysqli_query($db,$sql_subject)){
     $subject = mysqli_fetch_assoc($query_subject);	
     }
}



?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-10 col-md-offset-1">	
            <table class="table">
              <form action="index.php?page=updatecart" method="post">
                <thead>
                    <tr>
                       <th>list</th>                  
                        <th >Course name</th>
                        <th >start date</th>

                        <th>max student</th>
                        <th>students registered</th>

                        <th>end registration</th>
                        <th>subject</th>
                        <th></th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                   
                     
                    <tr>
                         <?php do { do {  $list3 = $list3 + 1;   ?>
                      

                    	<td>
                           
                                <h5><?= $list3; ?></h5>
                                                 
                        </td>
                      


                        <td class=""><strong><?= $search3['name']; ?>
                              </strong></td>



                       
                        <td><strong><?php if(isset($search3['start_date'])) { echo date("d-m-Y",strtotime($search3['start_date'])); } ?></strong></td>
                       
                         <td><strong><?= $search3['max_student']; ?></strong></td>

                        <td><strong><?= $search3['student_count']; ?></strong></td>

                          <td><strong><?php if(isset($search3['end_registration'])) { echo date("d-m-Y",strtotime($search3['end_registration'])); } ?></strong></td>

                           <td><strong><?= $subject['name']; ?></strong></td>
                         
                               <td>
                        <a href = "admin.php?adminpage=editCourse&IDsubject=<?=$IDsubject;?>&ID=<?=$search3['id'];?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span> Edit</a>
                        </td>

                         <td>
                        <a href = "admin.php?adminpage=deleteCourse&IDsubject=<?=$IDsubject;?>&ID=<?=$search3['id'];?>" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> remove</a>
                        </td>
                         
                       
                  
                    </tr>
                  <?php } while($search3 = mysqli_fetch_assoc($query_search3));

              } while($subject = mysqli_fetch_assoc($query_subject));
                     
                     }
                  }

                     ?>

