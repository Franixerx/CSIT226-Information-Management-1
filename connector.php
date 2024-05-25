<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        <a href="insert_user.php"><button type="submit" id="insertButton" name="insertButton">Insert User</button></a>
        <a href="display_user.php"><button type="submit" id="display-user-btn" name="displayButton">Display Users</button></a>
    </pre>
</body>
</html>

<?php
    session_start();

    $connect = mysqli_connect("localhost", "root", "", "roomradar") or die("Error connection");

    if(isset($_POST['insertButton'])){
        header("location: insert_user.html");
    }
?>