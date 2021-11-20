
<?php
session_start();
include 'db.php';
$author_id = $_SESSION['id'];

date_default_timezone_set("Asia/Dhaka");
$post_date = date("d-m-Y, h:ia");

if(isset($_POST['crop_image']))
{
  $post_text = $_POST[ 'post_text' ];

  $data = $_POST['crop_image'];
  $image_array_1 = explode(";", $data);
  $image_array_2 = explode(",", $image_array_1[1]);
  $base64_decode = base64_decode($image_array_2[1]);
  $path_img = 'uploads/posts/'.time().'.png';
  $imagename = ''.time().'.png';
  file_put_contents($path_img, $base64_decode); 

  $sql2 = "INSERT INTO posts( author_id, post_text, post_file, post_date ) VALUES( '$author_id', '$post_text', '$imagename', '$post_date' )"; 
  mysqli_query($con, $sql2); 
  
}
?>