<?php 
  include_once 'db.php';
  session_start();
  unset($_SESSION['doc_email']);
  session_destroy();
  header( 'location:index.php' );
?>