<?php
    session_start();
    include('../includes/connection.php');
    if(isset($_POST['adminLogin'])){
        $query = "select email,password,name,uid from admin where email = '$_POST[email]' AND password='$_POST[password]'";
        $query_run = mysqli_query($connection,$query);
        if (mysqli_num_rows($query_run)) {
            echo "<script type='text/javascript'>
            window.location.href = 'admin_dashboard.php';
            </script>";
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
            }
        }
        else {
            echo "<script type='text/javascript'>
            alert('Please enter correct details');
            window.location.href = 'admin_login.php';
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMS | Login Page</title>
    <!-- jQuery File -->
    <script src ="../includes/jquery.min.js"></script>
    <!-- Bootstrap Files -->
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <script src="../dist/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-3 m-auto" id="login_home_page">
                <center><h3 style="background-color: rgb(199, 230, 240); padding: 5px;">Admin Login</h3></center>
                <form action="" method="post"> 
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required style="margin-top: 20px;">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required style="margin-top: 20px;">
                    </div>
                    <center>
                        <div class="form-group">
                            <input type="submit" name="adminLogin" value="login" class="btn btn btn-warning" style="margin-top: 20px;"> 
                        </div>
                    </center>
                </form>
                <br>
                <center>
                    <a href="../index.php" class="btn btn-danger">Go to Home</a>
                </center>
            </div>
        </div>
    </div>
</body>
</html>
