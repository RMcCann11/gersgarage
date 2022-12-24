<?php

//start session
session_start();
include '../private/db_connection.php';

//Check to see if the form (registration section) has been submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $pass = $_POST['password'];

    // create SQL statement
    $sql = "INSERT INTO user (user_name, user_password) VALUES ('{$username}', '{$pass}')";

    // Query database
    $result = mysqli_query($connection, $sql);

    header('Location: login_page.php');

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
        <p id="red" style="text-align: center;">Please create your account below.</p> 
        <p id="red" style="text-align: center;">Once you have submitted the required details you will
        be redirected to a login page where you will be able to use your newly created login details.</p>

<div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Registration Form</h2>
            <div class="illustration"><i class="icon ion-ios-person"></i></div>
            <div class="form-group"><input class="form-control" type="test" name="username" placeholder="Please enter a username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Please enter a password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="register_button">Register</button>
    </div>
  
</body>
</html>