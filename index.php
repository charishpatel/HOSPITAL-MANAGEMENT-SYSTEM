


<!DOCTYPE html>

<html lang="en">
<head>
	<title>Hospital</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
    <?php
    
include('dbconnect.php');
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['pass'];

    $qry="SELECT * FROM `admin` WHERE username='$username' AND password='$password';";
    $run= mysqli_query($con, $qry);
    $row = mysqli_num_rows($run);
    if($row <1)
    {
        ?>
        <script>
        alert('Invalid Credentials !!');
        window.open('index.php','_self');
        
        </script>
        <?php
    }
 else {
    
     $data= mysqli_fetch_assoc($run);
     $id=$data['id'];
     session_start();
     $_SESSION['uid']=$id;
     header('location:admin.php');
    }
}
?>

	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					LOGIN
				</span>
                            <form class="login100-form validate-form p-b-33 p-t-5" action="index.php" method="post">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
                                            <button class="login100-form-btn" type="submit" name="login" value="Login">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

<!--===============================================================================================-->
	<script src="js/main.js"></script>
 

</body>
</html>