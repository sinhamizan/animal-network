<?php 
session_start();

if( !isset( $_SESSION['email'] ) ) {
  header( 'location: index.php' );
}

$sender_id = $_SESSION['id'];
$receiver_id = $_POST['receiver_id'];

include_once 'db.php';

// 
$sql = "SELECT * FROM chats WHERE sender=$receiver_id && receiver=$sender_id";
$data = mysqli_query($con, $sql);

$sql2 = "SELECT * FROM doctors WHERE id = $receiver_id";
$sender_info = mysqli_query( $con, $sql2 ); 
$row2 = mysqli_fetch_assoc( $sender_info );

$output = '';

if( mysqli_num_rows($data) > 0 ) {
    while($row = mysqli_fetch_assoc($data)) {
      $output .= "
        <h2>{$row2['name']}</h2>
        <p>{$row['message']}</p>
      ";
    }

    echo $output;
}else {
  echo "No Message Found!";
}
