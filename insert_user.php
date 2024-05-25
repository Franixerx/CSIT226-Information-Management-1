<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Record</title>
</head>
<body>
  <h1>Add New User</h1>
  <form action="" method="post">
            <label for="userID">User ID:</label><br>
            <input type="text" id="UserID" name="UserID" placeholder="Enter user ID"><br>
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
    <button type="submit" id="submit_button" name="submit_button">Add User</button>
  </form>
</body>
</html>

<a href="connector.php">BACK</a>
<?php
    $connect = mysqli_connect("localhost", "root", "", "roomradar") or die("Error in connection: ");
 
 
    if (isset($_POST['submit_button'])) {
        $userID = $_POST['UserID'];
        $password = $_POST['Password'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['Email'];
        $role = $_POST['Role'];
 
        $sql= "SELECT UserID from useraccount WHERE UserID = '$userID'";
 
 
        $result = mysqli_query($connect, $sql);
        $count = mysqli_num_rows($result);
 
        if ($count == 0) {
            $sql = "INSERT INTO useraccount (UserID, Password, phoneNumber, Email, Role) VALUES ('$userID', '$password', '$phoneNumber', '$email', '$role')";
            mysqli_query($connect, $sql);

            echo "New record created successfully";
        }else{
            echo "User ID already exists";
        }
    }
?>