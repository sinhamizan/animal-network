<?php 

  include_once 'db.php';
  $user_id = $_GET['id'];
  
  $post_sql = "DELETE FROM comments WHERE id=$user_id";
  $post_qs = mysqli_query( $con, $post_sql );
  if( $post_qs ) {
    header( 'location:comments.php' );
  }

?>