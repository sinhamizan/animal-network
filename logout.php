<?php 
  include_once 'db.php';
  session_start();
  unset($_SESSION['email']);
  unset($_SESSION['id']);
  session_destroy();
  header( 'location:login.php' );
?>