<?php
include 'validateSession.php';
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
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap1.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap1.min.js"></script>
</head>
<body>

    <?php
include('dbconnect.php');
include 'nav.php';

if(isset($_GET['delete']))
  {
     
       $id= $_GET['id'];
     $qry1="DELETE FROM patient WHERE id=$id";
      $run= mysqli_query($con,$qry1);
      if($run){
          echo 'Record deleted';
      }
  }

?>
    <div class="container">
        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">
           <?php 
         include 'dbconnect.php';
         $pid = "";
         if(isset($_POST['userDId'])){
         $sql = "select * from patient where id=".$_POST['userDId'];
         $pid = $_POST['userDId'];
         if ($result = $con->query($sql)) {

    /* fetch object array */
              $row = $result->fetch_assoc();
       
    
               
              echo $pid;?>. <?php
                echo $row['pName'];
        
       
    $result->close();

    /* free result set */
   
}
            
        
         
         ?>   
          </h4>
        </div>
        <div class="modal-body">
            <table>
                <thead>
                <th>Date</th>
                <th>service</th>
                <th>Price</th>
                </thead>
                
                <tbody>
                    <?php
                    $sql1 = "select date,sname,price from receiptItem where pid=$pid";
                    
                    $result1 = $con->query($sql1);
                    if($result1){
                  while ($row1 = $result1->fetch_assoc()) {
                     
                    ?>
                    <tr>
                        <td><?php echo $row1['date']; ?></td>
                        <td><?php echo $row1['sname']; ?></td>
                        <td><?php echo $row1['price']; ?></td>
                    </tr>
         <?php } }} ?>
                </tbody>
                
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


  </div>
</div>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('images/hsp1.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
                                            Patients
				</span>
                            </div>
                    
  <table class="">
        <thead>
            <tr>
                <th style="width: 100px;"><font style="color:#ffffff">Id</th>
                <th><font style="color:#ffffff">Patient name</th>
                <th><font style="color:#ffffff">Age</th>
                <th><font style="color:#ffffff">Gender</th>
                <th><font style="color:#ffffff">Mobile</th>
                <th><font style="color:#ffffff">Address</th>
                 <th><font style="color:#ffffff">Details</th>
                <th><font style="color:#ffffff">Delete</th>
            </tr>
        </thead>
 <tbody>
           
         <?php 
         include 'dbconnect.php';
         $sql = "select * from patient";
         if ($result = $con->query($sql)) {

    /* fetch object array */
    while ($row = $result->fetch_assoc()) {
       
        ?>
            <tr>
                
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['pName']?></td>
                <td><?php echo $row['pAge']?></td>
                <td><?php echo $row['gender']?></td>
                <td><?php echo $row['mobile']?></td>
                <td><?php echo $row['address']?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" value="<?php echo $row['id']?>" name="userDId" />
                    
                        <button type="submit" class="btn-sm"  name="details">Details</button>
                </form></td>
                
                    <td><a href="records.php?delete=true&id=<?php  echo $row['id'];?>">Delete</a></td>
                
            </tr> 
            <?php  
        
        
    }

    /* free result set */
    $result->close();
}
             
        
         
         ?>   
            
        </tbody>
                        
    </table>
                    <button id="pdbtn" value="triggerModal" style="display:none" data-toggle="modal" data-target="#myModal" ></button>
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
        <?php
        if(isset($_POST['userDId'])){
        ?>
          <script>
            pdbtn.click();
            </script>
       <?php }  ?>
</body>
</html>
