<?php
    include('../includes/connection.php');
    $query = "delete from tasks where tid = $_GET[id]";
    $query_run = mysqli_query($connection,$query);
    if ($query_run) {
        echo "<script>alert('Task updated Successfully');
        window.location.href ='admin_dashboard.php';
        </script>";
    } else {
        echo "<script>alert('Task updation Failed');
        window.location.href ='admin_dashboard.php';
        </script>";
    }
