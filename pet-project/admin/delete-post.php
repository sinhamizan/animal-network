<?php 

  include_once 'db.php';
  $user_id = $_GET['id'];

  echo $user_id;
  
  $post_sql = "DELETE FROM posts WHERE id=$user_id";
  $post_qs = mysqli_query( $con, $post_sql );
  if( $post_qs ) {
    header( 'location:posts.php' );
  }
  else {
    echo "Post can not delete.";
  }

?>