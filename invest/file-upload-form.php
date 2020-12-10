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
		</style>
</head>
<body>
    <form action="upload-manager.php" method="post" enctype="multipart/form-data">
        <h2>Upload Payment</h2>
		<p align ="center">
        <label  for="fileSelect">Filename:</label>
        <input type="file" name="photo" id="fileSelect">
		<br>
        <input type="submit" class="btn btn-success" name="submit" value="Upload"></p>
        <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
		
		<p>
		<a href="welcome.php" class="btn btn-warning">Back</a>
		</p>
    </form>
</body>
</html>