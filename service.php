
<?php
include 'validateSession.php';
 include 'dbconnect.php';
  $id=0;
  $sname = $dept = $price ="";
  if(isset($_GET['update'])){
  $id =$_GET['id'];
  $sql="select * from service where id=$id";
      if($result=$con->query($sql)){
          $row =$result->fetch_assoc();
          $sname=$row['sname'];
          $dept=$row['dept'];
          $price=$row['price'];
      }
  }
  
  if(isset($_POST['id'])){
      $id=$_POST['id'];
      if($id>0){
         
 $sname= $_POST['serv']; 
 $dept= $_POST['dept'];
 $price= $_POST['price'];
$qry="Update  service set sname='$sname', dept='$dept', price='$price' where id=$id;";
   
 $run= mysqli_query($con,$qry);
 if($run == true)
    {  
     echo 'record Updated';
     $id=0;
     $sname = $dept = $price ="";
     
    }

          
      }
      
  }
                  

if(isset($_POST['Add']) && $_POST['id']==0)
{  

 $sname= $_POST['serv'];  
 $dept= $_POST['dept'];  
 $price= $_POST['price'];
$qry="INSERT INTO service(sname, dept, price) VALUES ('$sname', '$dept', '$price')";
   
 $run= mysqli_query($con,$qry);
 if($run == true)
    {  
     echo 'record inserted';
    
     $sname = $dept = $price ="";
    }
}

   
  if(isset($_GET['delete']))
  {
     
       $id= $_GET['id'];
     $qry1="DELETE FROM service WHERE id=$id";
      $run= mysqli_query($con,$qry1);
      if($run){
          echo 'Record deleted';
      }
  }
  ?>
          

<!DOCTYPE html>

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
</head>
<body>
    <?php
include('dbconnect.php');
include 'nav.php';
?>

	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Services
				</span>
                 
                            <form class="login100-form validate-form p-b-33 p-t-5" action="service.php" method="post">
                                <input type="hidden" name="id" value="<?php echo  $id;?>" />
					<div class="wrap-input100service validate-input">
                                            <input class="input100" type="text" name="serv" value="<?php echo $sname;?>" placeholder="service name" required />
					</div>

					<div class="wrap-input100service validate-input">
						<input class="input100" type="text" name="dept" value="<?php echo  $dept;?>" placeholder="Dept" required />
					</div>
                                        <div class="wrap-input100service validate-input">
						<input class="input100" type="text" name="price" value="<?php echo  $price;?>" placeholder="service Price" required />
					</div>
					<div class="container-login100-form-btn m-t-18">
                                            <button class="login100-form-btn"  name="Add" value="Add Service">
                                                <?php
                                                if(isset($_GET['update']))
                                                {
                                                ?>
							update Service
                                                 <?php
                                                }
                                                else{
                                                    ?>
                                                        Add service
                                                        <?php
                                                }
                                                
                                                 ?>
						</button>
					</div>
                            </form>
                            </div>
                                     
  <table class="">
        <thead>
            <tr>
                <th style="width: 100px;"><font style="color:#ffffff">Id</th>
                <th><font style="color:#ffffff">Service name</th>
                <th><font style="color:#ffffff">Department</th>
                <th><font style="color:#ffffff">Price</th>
                <th><font style="color:#ffffff">Update</th>
                <th><font style="color:#ffffff">Delete</th>
            </tr>
        </thead>
        <tbody>
           
         <?php 
         include 'dbconnect.php';
         $sql = "select * from service";
         if ($result = $con->query($sql)) {

    /* fetch object array */
    while ($row = $result->fetch_assoc()) {
       
        ?>
            <tr>
                
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['sname']?></td>
                <td><?php echo $row['dept']?></td>
                <td><?php echo $row['price']?></td>
                <td><a href="service.php?update=true&id=<?php  echo $row['id'];?>">Update</a></td>
                <td><a href="service.php?delete=true&id=<?php  echo $row['id'];?>">Delete</a></td>
                
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
	<script src="js/main.js"></script>
 

</body>
</html>
