<?php
  include_once 'db.php';

  $folderPath = 'upload/';

  // find doctor id
  $doctor_email = $_SESSION['doc_email'];
  $sql2 = "SELECT * FROM doctors WHERE email='$doctor_email'";
  $data2 = mysqli_query($con, $sql2);
  $doc_info = mysqli_fetch_assoc( $data2 );

  

  if( isset( $_POST['update_profile'] ) ) {

    $image_parts = explode(";base64,", $_POST['image']);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $file = $folderPath . uniqid() . '.png';
    file_put_contents($file, $image_base64);
    echo json_encode(["image uploaded successfully."]);

    $doc_name = $_POST['doc_name'];
    $new_email = $_POST['new_email'];
    $doc_design = $_POST['doc_design'];
    $doc_bio = $_POST['doc_bio'];
    $doctor_id = $doc_info['id'];
    $doc_pic = $file;

    // $sql = "UPDATE doctors SET name='update name' WHERE id=10";
    $sql = "UPDATE doctors SET name='$doc_name', email='$new_email', designation='$doc_design', picture='$doc_pic', details='$doc_bio' WHERE id=$doctor_id";
    mysqli_query( $con, $sql );
  }

?>