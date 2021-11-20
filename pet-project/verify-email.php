<?php
  include_once 'db.php';
  $email = $_GET['email'];
  $vcode = $_GET['vcode'];

  if( isset( $email ) && isset( $vcode ) ) {
    $qs = "SELECT * FROM signup WHERE email='$email' AND verification_code='$vcode'";
    $res = mysqli_query( $con, $qs );
    $res_info = mysqli_fetch_assoc( $res );
    if( $res ) {
      if( mysqli_num_rows( $res ) == 1 ) {
        if( $res_info['is_verified'] == 0 ) {
          $email2 = $res_info['email'];
          
          $updat = "UPDATE signup SET is_verified=1 WHERE email='$email2'";
          $updat_qs = mysqli_query( $con, $updat );
          if( $updat_qs ) {
            header( 'location: login.php' );
          }
        }
      }
    }
  }


?>