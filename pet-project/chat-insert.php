<?php 
session_start();

if( !isset( $_SESSION['email'] ) ) {
  header( 'location: index.php' );
}

include_once 'db.php';

$sender = $_SESSION['id'];
$receiver = $_POST['receiver'];
$msg = $_POST['msg'];

$sql = "INSERT INTO chats( users_id, doctors_id, message, reply ) VALUE('$sender', '$receiver', '$msg', '')";
$result = mysqli_query($con, $sql);

if($result) {
  echo 1;
}else{
  echo 0;
}