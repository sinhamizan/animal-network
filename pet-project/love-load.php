<?php 
  session_start();
  include_once 'db.php';

  $liker = $_SESSION['id'];
  $post_love = $_POST['post_love'];

  $output = "";

  $sql_count = "SELECT * FROM likes WHERE post='$post_love'";
  $qs_count = mysqli_query( $con, $sql_count );
  $total_love = mysqli_num_rows( $qs_count );

  $sql_love = "SELECT * FROM likes WHERE liker='$liker' && post='$post_love'";
  $qs_love = mysqli_query( $con, $sql_love );
  $love_rs = mysqli_num_rows( $qs_love );


  if( $love_rs > 0 ){
    $output .= "<li>
      <p data='' class='love_back'>
        <i id='heart_back' class='fas fa-heart'></i>
      </p>
      <span id='show_love'> {$total_love} </span>
    </li>";
    
  } else {
    $output .="<li><p data='' class='love_react'><i id='heart_react' class='fas fa-heart'></i></p> <span id='show_love'>{$total_love}</span></li>";
  }

  echo $output;




  