<?php
    session_start();
    if(isset($_SESSION['email'])){
    include("../includes/connection.php");
    if (isset($_POST['edit_task'])) {
        // Prepare the query with placeholders
        $query = "UPDATE tasks SET uid = ?, description = ?, start_date = ?, end_date = ? WHERE tid = ?";

        // Prepare the statement
        $stmt = mysqli_prepare($connection, $query);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'issss', $_POST['id'], $_POST['description'], $_POST['start_date'], $_POST['end_date'], $_GET['id']);

        // Execute the statement
        $query_run = mysqli_stmt_execute($stmt);
        
        if ($query_run) {
            echo "<script>alert('Task updated Successfully');
            window.location.href ='admin_dashboard.php';
            </script>";
        } else {
            echo "<script>alert('Task updation Failed');
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
    <!-- jQuery File -->
    <script src ="../includes/jquery.min.js"></script>
    <!-- Bootstrap Files -->
    <link rel="stylesheet" href="..\dist\css\bootstrap.min.css">
    <script src="..\dist\js\bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="..\style.css">
</head>
<body>
    <!-- Header code starts here -->
    <div class="col-md-12" id="header">
        <h3><i class="fa fa-solid fa-list" style="padding-right: 15px;">Task Management System</i></h3>
    </div>

    <div class="row">
        <div class="col-md-4 m-auto" style="color: white;">
            <h3 style="color: white;">Edit the Task</h3>
            <?php
                $query = "select * from tasks where tid = $_GET[id]";
                $query_run = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($query_run)){
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label for="">Select User :</label>
                    <select name="id" class="form-control" required>
                        <option value="uid">- Select-</option>
                        <?php
                            $query1 = "select uid,name from user";
                            $query_run1 = mysqli_query($connection, $query1);
                            if (mysqli_num_rows($query_run1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($query_run1)) {
                                    ?>
                                    <option value="<?php echo $row1['uid']; ?>"><?php echo $row1['name']; ?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="">Description</label>
                    <textarea class="form-control" rows = "3" cols = "50" name = "description" required"><?php echo $row['description'];?>
                    </textarea>
                </div>
                <div class="form-group">
                        <label for="">Start date</label>
                        <input type="date" name="start_date" class="form-control" value="<?php echo $row['start_date'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">End date</label>
                        <input type="date" name="end_date" class="form-control" value="<?php echo $row['end_date'];?>" required>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-warning" name="edit_task" value="Edit" required>
            </form>

        <?php
            }
        ?>
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