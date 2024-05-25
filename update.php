<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Record</title>
</head>
<body>
  <h1>Update User</h1>
  <form action="" method="post">
            <input type="hidden" id="UserID" name="UserID" placeholder="Enter user ID"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="Password" name="Password" placeholder="Enter password"><br><br>
            <label for="phoneNumber">Phone Number:</label><br>
            <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number"><br><br>
            <label for="email">Email:</label><br>
            <input type="email" id="Email" name="Email" placeholder="Enter email"><br><br>
            <label for="role">Role:</label><br>
            <select id="Role" name="Role">
      <option value="tenant">Tenant</option>
      <option value="landlord">Landlord</option>
    </select><br><br>
    <button type="submit" id="btnSubmit" name="submit_button">Update</button>
  </form>
</body>
</html>
<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "roomradar") 
        or die("Error in Connection");
    

    // Check if the updateid parameter is set
    if (isset($_GET['updateid'])) {
        $userID = $_GET['updateid'];
        $sql = "SELECT * FROM `useraccount` WHERE UserID = '$userID'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $userID = $row['UserID'];
            $password = $row['Password'];
            $phoneNumber = $row['phoneNumber'];
            $email = $row['Email'];
            $role = $row['Role'];
            
        } else {
            echo "Error: " . $con->error;
        }
    }

    if (isset($_POST['btnSubmit'])) {
        $userID = $_POST['UserID'];
        $password = $_POST['Password'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['Email'];
        $role = $_POST['Role'];
    
    
        $sql = "UPDATE `useraccount` SET UserID = '$userID', Password = '$password', phoneNumber = '$phoneNumber', Email = '$email', Role = '$role' WHERE UserID = '$userID'";
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            echo "<script>alert('Update Successfully');</script>";
            header("Location: display_user.php");
            exit();
        } else {
            echo "Error: " . $con->error;
        }
    } else if (isset($_POST['bttnBack'])) {
        header("Location: display_user.php");
        exit();
    }
?>