<?php
include_once 'db.php';

$user_id = $_GET['id'];
$doc_id = $_GET['did'];

$sql = "UPDATE chats SET is_seen=1 WHERE doctors_id=$doc_id AND users_id=$user_id";
$qs = mysqli_query( $con, $sql );

if( $qs ) {
  header("location: chat.php?id=".$_GET['id']);
}

?>