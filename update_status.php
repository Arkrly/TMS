<?php
include("includes/connection.php");
if (isset($_POST['update'])) {
    // Sanitize input and prevent SQL injection
    $status = mysqli_real_escape_string($connection, $_POST['status']);
    $id = mysqli_real_escape_string($connection, $_GET['id']);

    // Prepare the query with placeholders
    $query = "UPDATE tasks SET status = '$status' WHERE tid = $id";

    // Execute the statement
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo "<script>alert('Status updated Successfully');
            window.location.href ='user_dashboard.php';
            </script>";
    } else {
        echo "<script>alert('Status updation Failed');
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
    <!-- jQuery File -->
    <script src="includes/jquery.min.js"></script>
    <!-- Bootstrap Files -->
    <link rel="stylesheet" href="dist\css\bootstrap.min.css">
    <script src="dist\js\bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Update Task</title>
</head>
<body>
    <!-- Header code starts here -->
    <div class="col-md-12" id="header">
        <h3><i class="fa fa-solid fa-list" style="padding-right: 15px;">Task Management System</i></h3>
    </div>

    <div class="row"><br>
        <div class="col-md-4 m-auto" style="color: white;">
            <br>
            <h3 style="color: white;">Update the Task</h3><br>
            <?php
            $query = "SELECT * FROM tasks WHERE tid = " . mysqli_real_escape_string($connection, $_GET['id']);
            $query_run = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row['tid']; ?>" required>
                    </div>
                    <div class="form-group">
                        <select name="status" class="form-control">
                            <option value="">-Status-</option>
                            <option value="In-Progress" <?php if ($row['status'] == 'In-Progress') echo 'selected'; ?>>In-Progress</option>
                            <option value="Completed" <?php if ($row['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                        </select>
                    </div><br>
                    <input type="submit" class="btn btn-warning" name="update" value="Update">
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
