<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "piolo") 
    or die("Error in connection: ");

    // Check if the updateid parameter is set
    if (isset($_GET['updateid'])) {
        $userID = $_GET['updateid'];
        $sql = "SELECT * FROM `useraccount` WHERE UserID = '$userID'";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $userID = $row['UserID'];
            $password = $row['Password'];
            $phoneNumber = $row['phoneNumber'];
            $email = $row['Email'];
            $role = $row['Role'];
        } else {
            echo "Error: " . $connect->error;
        }
    }

    if (isset($_POST['submit_button'])) {
        $userID = $_POST['UserID'];
        $password = $_POST['Password'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['Email'];
        $role = $_POST['Role'];

        $sql = "UPDATE `useraccount` SET Password = '$password', phoneNumber = '$phoneNumber', Email = '$email', Role = '$role' WHERE UserID = '$userID'";
        $result = mysqli_query($connect, $sql);
        
        if ($result) {
            echo "<script>alert('Update Successfully');</script>";
            header("Location: display_user.php");
            exit();
        } else {
            echo "Error: " . $connect->error;
        }
    }
?>

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
                <label for="password">Used ID:</label><br>
                <input type="text" id="UserID" name="UserID" placeholder="Enter user ID" autocomplete="off" value="<?php echo $userID;?>" readonly><br><br>
                <label for="password">Password:</label><br>
                //or eh edit nimo ang type ="text" para ma show ang password ditso
                <input type="password" id="Password" name="Password" placeholder="Enter password" autocomplete="off" value="<?php echo $password;?>"><br><br>
                //to toggle imong password

                <input type="checkbox" id="togglePassword" class="toggle-password"> Show Password<br><br>
                <label for="phoneNumber">Phone Number:</label><br>
                <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number" autocomplete="off" value="<?php echo $phoneNumber;?>"><br><br>
                <label for="email">Email:</label><br>
                <input type="email" id="Email" name="Email" placeholder="Enter email" autocomplete="off" value="<?php echo $email;?>"><br><br>
                <label for="role">Role:</label><br>
                <select id="Role" name="Role">
                    <option value="tenant" <?php echo isset($role) && $role == 'tenant' ? 'selected' : ''; ?>>Tenant</option>
                    <option value="landlord" <?php echo isset($role) && $role == 'landlord' ? 'selected' : ''; ?>>Landlord</option>
                </select>
                <br><br>
        <button type="submit" id="btnSubmit" name="submit_button">Update</button>
    </form>
        <script>//para nis toggle passsowrd
            document.getElementById('togglePassword').addEventListener('change', function() {
            var passwordField = document.getElementById('Password');
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
            });
        </script>
    </body>
</html>