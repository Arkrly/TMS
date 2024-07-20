<?php
    include('../includes/connection.php');
    $query = "update leaves set status = 'Approved' where lid = $_GET[id]";
    $query_run = (mysqli_query($connection, $query));
    if($query_run){
        echo "<script>alert('Leave Status updated Successfully');
            window.location.href ='admin_dashboard.php';
            </script>";
    } 
    else{
        echo "<script>alert('Error please try again');
            window.location.href ='admin_dashboard.php';
            </script>";
    }