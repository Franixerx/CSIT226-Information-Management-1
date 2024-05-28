<!DOCTYPE html>
<html>
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
    $connect = mysqli_connect("localhost", "root", "", "roomradar") 
    or die("Error in connection: ");

    if (!$connect) {
        throw new Exception("Error connecting to database");
    }

    $sql = "SELECT * from useraccount"; // Fetch all users
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
            <tr>
                <th>User ID</th>
                <th>Password</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>";
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . htmlspecialchars($row["UserID"]) . "</td>
                <td>" . htmlspecialchars($row["Password"]) . "</td>
                <td>" . htmlspecialchars($row["phoneNumber"]) . "</td>
                <td>" . htmlspecialchars($row["Email"]) . "</td>
                <td>" . htmlspecialchars($row["Role"]) . "</td>
                <td>
                    <a href='update.php?updateid=" . urlencode($row["UserID"]) . "' class='btnUpdate'>Update</a>
                    <a href='delete.php?deleteid=" . urlencode($row["UserID"]) . "' class='btnDel'>Delete</a>
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
