<?php
    session_start();
    include('includes/connection.php');
    if(isset($_POST['userRegistration'])){
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);

        $query = "INSERT INTO user VALUES(NULL, '$name', '$email', '$password', $mobile)";
        $query_run = mysqli_query($connection, $query);
        if($query_run) {
            echo "<script type='text/javascript'>
            alert('User registered successfully...');
            window.location.href = 'index.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Error...please try again');
                window.location.href = 'user_register.php';
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMS | Registration Page</title>
    <!-- jQuery File -->
    <script src ="includes/jquery.min.js"></script>
    <!-- Bootstrap Files -->
    <link rel="stylesheet" href="dist\css\bootstrap.min.css">
    <script src="dist\js\bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="centered-div">
            <div class="col-md-3 m-auto" id="registration_home_page">
                <center><h3 style="background-color: rgb(199, 230, 240); padding: 5px;">User Registration</h3></center>
                <form action="" method="post"> 
                    <div class="form-group">
                        <input type="name" name="name" class="form-control" placeholder="Enter Name" required style="margin-top: 20px;">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required style="margin-top: 20px;">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required style="margin-top: 20px;">
                    </div>
                    <div class="form-group">
                        <input type="tect" name="mobile" class="form-control" placeholder="Enter Mobile Number" required style="margin-top: 20px;">
                    </div>
                    <center>
                        <div class="form-group">
                            <input type="submit" name="userRegistration" value="Register" class="btn btn btn-warning" style="margin-top: 20px;"> 
                        </div>
                    </center>
                </form>
                <br>
                <center>
                    <a href="index.php" class="btn btn-danger">Go to Home</a>
                </center>
            </div>
        </div>
    </div>
</body>
</html>
