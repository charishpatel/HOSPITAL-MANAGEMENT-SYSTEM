<?php
include 'validateSession.php';
 include 'dbconnect.php';
  $id=0;
  $fName = $desg = $avb ="";
  if(isset($_GET['update'])){
  $id =$_GET['id'];
  $sql="select * from faculty where id=$id";
      if($result=$con->query($sql)){
          $row =$result->fetch_assoc();
          $fName=$row['fName'];
          $desg=$row['desg'];
          $avb=$row['Avb'];
      }
  }
  
  if(isset($_POST['id'])){
      $id=$_POST['id'];
      if($id>0){
         
          $fName= $_POST['fName'];  
 $desg= $_POST['desg'];  
 $avb= $_POST['avb'];
$qry="Update  faculty set fName='$fName', desg='$desg', Avb='$avb' where id=$id;";
   
 $run= mysqli_query($con,$qry);
 if($run == true)
    {  
     echo 'record Updated';
     $id=0;
    $fName = $desg = $avb ="";
     
    }

          
      }
      
  }
                  

if(isset($_POST['Add']) && $_POST['id']==0)
{  

 $fName= $_POST['fName'];  
 $desg= $_POST['desg'];  
 $avb= $_POST['avb'];
$qry="INSERT INTO faculty(fName, desg, Avb) VALUES ('$fName', '$desg', '$avb')";
   
 $run= mysqli_query($con,$qry);
 if($run == true)
    {  
     echo 'record inserted';
    
     $fName = $desg = $avb ="";
    }
}

   
  if(isset($_GET['delete']))
  {
     
       $id= $_GET['id'];
     $qry1="DELETE FROM faculty WHERE id=$id";
      $run= mysqli_query($con,$qry1);
      if($run){
          echo 'Record deleted';
      }
  }
  ?>



<html lang="en">
<head>
	<title>Hospital</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="css/bootstrap1.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap1.min.js"></script>
</head>
<body>
   <?php
include('dbconnect.php');
include 'nav1.php';
?>
    <div class="container">
        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">   
          </h4>
        </div>
        <div class="modal-body">
            xyz
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/fct.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Faculty
				</span>
                 
                            
                            </div>
                                     
  <table class="">
        <thead>
            <tr>
                <th style="width: 100px;"><font style="color:#ffffff">Id</th>
                <th><font style="color:#ffffff">Faculty name</th>
                <th><font style="color:#ffffff">Designation</th>
                <th><font style="color:#ffffff">Available</th>
                <th><font style="color:#ffffff">Update</th>
                <th><font style="color:#ffffff">Delete</th>
            </tr>
        </thead>
        <tbody>
           
         <?php 
         include 'dbconnect.php';
         $sql = "select * from faculty";
         if ($result = $con->query($sql)) {

    /* fetch object array */
    while ($row = $result->fetch_assoc()) {
       
        ?>
            <tr>
                
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['fName']?></td>
                <td><?php echo $row['desg']?></td>
                <td><?php echo $row['avb']?></td>
                <td><a href="addfaculty.php?update=true&id=<?php  echo $row['id'];?>">Update</a></td>
                <td><a href="faculty.php?delete=true&id=<?php  echo $row['id'];?>">Delete</a></td>
                
            </tr> 
            <?php
        
        
    }

    /* free result set */
    $result->close();
}
             
        
         
         ?>   
            
        </tbody>
        
    </table>

			</div>
		</div>
	
    
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
 

</body>
</html>
