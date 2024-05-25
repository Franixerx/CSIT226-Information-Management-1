<html><!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Display Form</title>
</head>
<body>
<br>
<h1>Display Form</h1>
<br>


<?php
 
            $conn = mysqli_connect("localhost", "root", "", "roomradar") or die("Error");
            if (!$conn) {
                throw new Exception("Error connecting to database");
            }
            $sql = "SELECT * useraccount FROM UserID = $userID";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table border='1'>
                    <tr>
                    <th>User ID</th>
                    <th>Password</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>";
                
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row["UserID"]."</td>
                    <td>" . $row["Password"]."</td>
                    <td>" . $row["phoneNumber"]."</td>
                    <td>" . $row["Email"]."</td>
                    <td>" . $row["Role"]."</td>
                    <td>
                    <a href='update.php?updateid=" . $row["UserID"] . "' class='btnUpdate'>Update</a>
                    <a href='delete.php? deleteid=" . $row["UserID"] . "' class='btnDel'>Delete</a>
                    </td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
 
    ?>
<br>
<a href="connector.php">BACK</a>

</body>
</html>