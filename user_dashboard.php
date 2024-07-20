<?php
    session_start();
    if(isset($_SESSION['email'])){
    include("includes/connection.php");
    if(isset($_POST['submit_leave'])){
        $query = "insert into leaves values(null,$_SESSION[uid],'$_POST[subject]','$_POST[message]','No Action')";
        $query_run = mysqli_query($connection,$query);

        if ($query_run) {
            echo "<script>alert('Leave Form Submitted Successfully');
            window.location.href ='user_dashboard.php';
            </script>";
        }
        else{
            echo "<script>alert('Error please try again');
            window.location.href ='user_dashboard.php';
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- jQuery File -->
    <script src ="includes\jquery.min.js"></script>
    <!-- Bootstrap Files -->
    <link rel="stylesheet" href="dist\css\bootstrap.min.css">
    <script src="dist\js\bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- JQuery code -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("task.php");
            });
        });

        $(document).ready(function(){
            $("#apply_leave").click(function(){
                $("#right_sidebar").load("leave_form.php");
            });
        });

        $(document).ready(function(){
            $("#leave_status").click(function(){
                $("#right_sidebar").load("leave_status.php");
            });
        });
    </script>
</head>
<body>
    <!-- Header code starts here -->
    <div class="row" id="header">
        <div class="col-md-12">
            <div class="col-md-4" style="display: inline-block;">
                <h3>Task Management System</h3>
            </div>
            <div class="col-md-6" style="display: inline-block; text-align: right;">
                <b>Email : </b> <?php echo $_SESSION['email']?>
                <span style="margin-left: 25px;"><b>Name : </b><?php echo $_SESSION['name']?></span>
            </div>
        </div>
    </div>
    <!-- Header code ends here -->
    <div class="row">
        <div class="col-md-2" id="left_sidebar">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        <a href="user_dashboard.php" typ="button" class="link" style="color: black";>Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a typ="button" class="link" style="color: black" id="manage_task">Update Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a typ="button" class="link" style="color: black" id="apply_leave">Apply Leave</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a typ="button" class="link" style="color: black" id="leave_status">Leave status</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="logout.php" typ="button" class="link"  style="color: black";>Logout</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-10"  id="right_sidebar">
            <h4>Instructions for Employess</h4>
            <ul style="line-height: 3em;font-size: 1.2em;list-style-type: none">
                <li>1. All the employees should mark their attendene daily.</li>
                <li>2. Everyone must complete the task assigned to them.</li>
                <li>3. Kindly maintain decorum of the office</li>
                <li>4. Keep office and your area neat and clean.</li>
            </ul>
        </div>
    </div>
</body>
</html> 
<?php
    }
    else{
        header("Location: user_login.php");
    }
?>