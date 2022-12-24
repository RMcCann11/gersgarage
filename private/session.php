<?php
   include('db_connection.php');
   session_start();
   
   if(!isset($_SESSION['loggedin_user'])){
      header("location:login_page.php");
      die();
   }