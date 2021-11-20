<?php 

  include_once 'db.php';
  $user_id = $_GET['id'];
  
  // delete user
  $post_sql = "DELETE FROM signup WHERE id=$user_id";
  $post_qs = mysqli_query( $con, $post_sql );

  // delete post
  $post_sql2 = "DELETE FROM posts WHERE author_id=$user_id";
  $post_qs2 = mysqli_query( $con, $post_sql2 );

  // delete sell ads
  $post_sql3 = "DELETE FROM sell_pets WHERE author_id=$user_id";
  $post_qs3 = mysqli_query( $con, $post_sql3 );

  // delete adopt ads
  $post_sql4 = "DELETE FROM adopt_pets WHERE author_id=$user_id";
  $post_qs4 = mysqli_query( $con, $post_sql4 );

  // delete comment
  $post_sql5 = "DELETE FROM comments WHERE user_id=$user_id";
  $post_qs5 = mysqli_query( $con, $post_sql5 );

  if( $post_qs && $post_qs2 && $post_qs3 && $post_qs4 && $post_qs5) {
    header( 'location:users.php' );
  }

?>