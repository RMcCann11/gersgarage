<?php

//start session
session_start();

include '../private/db_connection.php';

//Check to see if the form (login section) has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $username = $_POST['username'];
  $pass = $_POST['password'];

  // create SQL statement
  $sql = "SELECT user_name FROM user WHERE user_name='$username' and user_password='$pass'";

  // Query database
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);

  // count the number of records found
  $count = mysqli_num_rows($result);

// If result matched $username and $pass, table row must be 1 row
  if($count > 0) {
      $_SESSION['loggedin_user'] = $row['user_name'];
      header('Location: index.php');
    } else {
      $error = "Your Login Name or Password is invalid";
    }
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Ger's Garage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/mystyle.css">
</head>
<body>


    <div class="container-fluid">
        
        <div class="jumbotron text-center" id="jtcolour">
                <h1><u>Welcome To Ger's Garage</u></h1>
                
    </div>
    <div class="row">
        <div class="col-sm-6 offset-sm-3" style="background-color:rgb(236, 236, 112);">
        <p id="red" style="text-align: center;">Please enter your login details below.</p> 

<div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-person"></i></div>
            <div class="form-group"><input class="form-control" type="test" name="username" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="login_button">Log In</button>
    </div>
    
    <p id="red" style="text-align: center;">Please note that if you don't have an existing account, you can create
    one by clicking <a href="register.php">on this link.</a></p> 

    
      
  
</body>
</html>