<?php 
session_start();

// if( !isset( $_SESSION['email'] ) ) {
//   header( 'location: index.php' );
// }

include_once 'db.php';

// find doctor id
$doctor_email = $_SESSION['doc_email'];
$sql2 = "SELECT * FROM doctors WHERE email='$doctor_email'";
$data2 = mysqli_query($con, $sql2);
$doc_info = mysqli_fetch_assoc( $data2 );
$doctor_id = $doc_info['id'];

$user_id = $_POST['receiver_doc'];
$msg = $_POST['msg_doc'];

$sql = "INSERT INTO chats( users_id, doctors_id, message, reply ) VALUE('$user_id', '$doctor_id','', '$msg')";
$result = mysqli_query($con, $sql);

if($result) {
  echo 1;
}else{
  echo 0;
}