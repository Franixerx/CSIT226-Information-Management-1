<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "roomradar") 
        or die("Error in connection");

    if ($con->connect_error) {
        die("Failed to connect: " . $con->connect_error);
    }

    // Disable foreign key constraints
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0");

    if (isset($_GET['deleteid'])) {
        $userID = $_GET['deleteid'];

        // Prepare the SQL statement
        $sql = "DELETE FROM useraccount WHERE UserID = '$userID'";

        // Execute the statement
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('location:display_user.php');
        } else {
            die(mysqli_error($con));
        }
    }

    // Enable foreign key constraints
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS=1");

    mysqli_close($con);
?>