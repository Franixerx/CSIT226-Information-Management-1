<!DOCTYPE html>
<html lang="en">

<body>
    <section class="login">
        <div class="content">
            <h2>Sign In</h2>
            <form action="" method="post">
                <div class="inputBox">
                    <label>UserID: </label>
                    <input type="text" name="userID" required>
                </div>
                <div class="inputBox">
                    <label>Password: </label>
                    <input type="password" name="Password" required>
                </div>
                <div class="inputBox">
                    <input type="submit" name="buttonLogin" value="Login">
                </div>
            </form>
        </div>
    </section>
</body>

</html>

<?php
	session_start();
	$con= mysqli_connect("localhost","root","","roomradar") 
		or die("Error in connection");
	echo "connected";



	if(isset($_POST['buttonLogin'])){
		$userID = $_POST['userID'];			
		$password= $_POST['Password'];
		echo $password;
		$sql ="SELECT UserID, Password FROM useraccount WHERE UserID='$userID'";
		$result = mysqli_query($con,$sql);
		$count = mysqli_num_rows($result);
		
		
		$row = mysqli_fetch_array($result);

		if($count == 0){
			echo "<script language='javascript'>
						alert('username not existing.');
				  </script>";
		}else if($row[1] != $password) {
			echo "<script language='javascript'>
						alert('Incorrect password');
				  </script>";
		}else{
			$_SESSION['UserID']= $userID;
			header("location: connector.php");
		}	
	}		
?>