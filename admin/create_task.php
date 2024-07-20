<?php
    session_start();
    if(isset($_SESSION['email'])){
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
    <h3>Create a new Task</h3>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Select User :</label>
                    <select name="id" class="form-control">
                        <option value="">- Select-</option>
                        <?php
                            include("../includes/connection.php");
                            $query = "select uid,name from user";
                            $query_run = mysqli_query($connection, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                    ?>
                                    <option value="<?php echo $row['uid']; ?>"><?php echo $row['name']; ?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" rows = "3" cols = "50" name = "description" placeholder ="mention the task"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Start date</label>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">End date</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-warning" name="create_task" value="Create">
            </form>
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