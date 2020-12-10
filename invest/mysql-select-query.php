<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
		table, th, td {
  border: 3.5px solid black; align:center;       padding-left: 20px;
    align-self: center;
    padding-bottom: 2%;
}
		</style>
</head>
<body>
<div style="align:left; width:50%; ">

<p><b>Table below for user details <?php echo htmlspecialchars($_SESSION["username"]); ?></p>
<p align="right"><b>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "moremoney");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM moneypaid";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>user id</th>";
                echo "<th>Reff ID</th>";
                echo "<th>Paid amount</th>";
                echo "<th>Pay date</th>";
            echo "</tr>";
		
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['userId'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['datepay'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
</b></p>
</div>

  
	<a href="welcome.php" class="btn btn-warning">Back</a>
</body>
</html>