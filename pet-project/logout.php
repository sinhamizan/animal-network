<?php 
  include_once 'db.php';
  session_start();
  unset($_SESSION['email']);
  unset($_SESSION['id']);
  unset($_SESSION['name']);
  session_destroy();
  header( 'location:login.php' );
?>