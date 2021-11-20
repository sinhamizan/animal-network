<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }
  include_once 'db.php';
  $post_id = $_GET['id'];
  
  $post_sql = "DELETE FROM sell_pets WHERE id=$post_id";
  $post_qs = mysqli_query( $con, $post_sql );
  if( $post_qs ) {
      header( 'location:buy-sell.php' );
  }
?>