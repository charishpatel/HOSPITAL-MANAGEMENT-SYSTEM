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
          $avb=$row['avb'];
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
include 'nav.php';
?>
   	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/fct.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Faculty
				</span>
                 
                            <form class="login100-form validate-form p-b-33 p-t-5" action="faculty.php" method="post">
                                <input type="hidden" name="id" value="<?php echo  $id;?>" />
					<div class="wrap-input100service validate-input">
                                            <input class="input100" type="text" name="fName" value="<?php echo $fName;?>" placeholder="Faculty name" required />
					</div>

					<div class="wrap-input100service validate-input">
						<input class="input100" type="text" name="desg" value="<?php echo  $desg;?>" placeholder="Designation" required />
					</div>
                                        <div class="wrap-input100service validate-input">
						<input class="input100" type="text" name="avb" value="<?php echo  $avb;?>" placeholder="Available" required />
					</div>
					<div class="container-login100-form-btn m-t-18">
                                            <button class="login100-form-btn"  name="Add" value="Add Faculty">
                                                <?php
                                                if(isset($_GET['update']))
                                                {
                                                ?>
							update Faculty
                                                 <?php
                                                }
                                                else{
                                                    ?>
                                                        Add Faculty
                                                        <?php
                                                }
                                                
                                                 ?>
						</button>
					</div>
                            </form>
                            </div>