<?php
    session_start();
    if(isset($_SESSION['email'])){
    include '../includes/connection.php';
    if (isset($_POST['create_task'])) {
        // Prepare the SQL statement
        $query = "INSERT INTO tasks VALUES (NULL, ?, ?, ?, ?, 'Not Started')";
        
        // Prepare the statement
        $stmt = mysqli_prepare($connection, $query);
        
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "isss", $_POST['id'], $_POST['description'], $_POST['start_date'], $_POST['end_date']);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Task Created Successfully');
            window.location.href ='admin_dashboard.php';
            </script>";
        } else {
            echo "<script>alert('Task Creation Failed');
            window.location.href ='admin_dashboard.php';
            </script>";
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- jQuery File -->
    <script src ="../includes/jquery.min.js"></script>
    <!-- Bootstrap Files -->
    <link rel="stylesheet" href="..\dist\css\bootstrap.min.css">
    <script src="..\dist\js\bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="..\style.css">
    <!-- JQuery Code -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#create_task").click(function(){
                $("#right_sidebar").load("create_task.php");
            });
        });

        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("manage_task.php");
            });
        });

        $(document).ready(function(){
            $("#view_leave").click(function(){
                $("#right_sidebar").load("view_leave.php");
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
                <b>Email : </b> <?php echo $_SESSION['email']; ?>
                <span style="margin-left: 25px;"><b>Name : </b><?php echo $_SESSION['name']; ?></span>
            </div>
        </div>
    </div>
    <!-- Header code ends here -->
    <div class="row">
        <div class="col-md-2" id="left_sidebar">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        <a href="admin_dashboard.php" type="button" id="logout_link" style="color: black";>Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a type="button" class="link" id="create_task" style="color: black">Create Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a type="button" class="link" id="manage_task" style="color: black">Manage Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a  type="button" class="link" id="view_leave" style="color: black">Leave Applicatiions</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="../logout.php" type="button" id="logout_link" style="color: black">Logout</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-10"  id="right_sidebar">
            <h4>Instructions for Admin</h4>
            <ul style="line-height: 3em;font-size: 1.2em;list-style-type: none">
                <li>1. All the employees should mark their attendance daily.</li>
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
        header("Location: admin_login.php");
    }
?>