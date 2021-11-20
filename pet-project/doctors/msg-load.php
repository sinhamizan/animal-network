<?php 
session_start();

// if( !isset( $_SESSION['doc_email'] ) ) {
//   header( 'location: index.php' );
// }

include_once 'db.php';

// find doctor id
$doctor_email = $_SESSION['doc_email'];
$sql2 = "SELECT * FROM doctors WHERE email='$doctor_email'";
$data2 = mysqli_query($con, $sql2);
$doc_info = mysqli_fetch_assoc( $data2 );
$doctor_id = $doc_info['id'];

$user_id = $_POST['receiver_id'];

$sql = "SELECT * FROM chats WHERE users_id=$user_id && doctors_id=$doctor_id";
$data = mysqli_query($con, $sql);

$output = '';

if( mysqli_num_rows($data) > 0 ) {
    while($row = mysqli_fetch_assoc($data)) {
      if( $row['message'] ) {
        $output .= "
        <div class='single_msg'>
        <span>User: </span><p>{$row['message']}</p>
        </div>";
      }
      if( $row['reply'] ) {
        $output .= "
        <div class='single_msg'>
          <span>Me: </span><h5>{$row['reply']}</h5>
        </div>";
      }
    }

    echo $output;
}else {
  echo "No Message Found!";
}



