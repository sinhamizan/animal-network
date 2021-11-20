<?php 
session_start();

if( !isset( $_SESSION['email'] ) ) {
  header( 'location: index.php' );
}

$sender_id = $_SESSION['id'];
$receiver_id = $_POST['receiver_id'];

include_once 'db.php';

$sql = "SELECT * FROM chats WHERE users_id=$sender_id && doctors_id=$receiver_id";
$data = mysqli_query($con, $sql);

$sql2 = "SELECT * FROM signup WHERE id = $sender_id";
$sender_info = mysqli_query( $con, $sql2 ); 
$row2 = mysqli_fetch_assoc( $sender_info );

$output = '';

if( mysqli_num_rows($data) > 0 ) {
    while($row = mysqli_fetch_assoc($data)) {
      if( $row['message'] ) {
        $output .= "
        <div class='single_msg user'>
          <span>Me </span><p>{$row['message']}</p>
        </div>
      ";
      }
      if( $row['reply'] ) {
        $output .= "
        <div class='single_msg'>
        <span>Doctor </span><h5>{$row['reply']}</h5>
        </div>
      ";
      }
    }

    echo $output;
}else {
  echo "No Message Found!";
}
