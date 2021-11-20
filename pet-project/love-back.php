<?php 
session_start();
include_once 'db.php';

$liker = $_SESSION['id'];
$post = $_POST['post'];

$sql = "DELETE FROM likes WHERE liker='${liker}' && post='${post}'";
$result = mysqli_query($con, $sql);

if($result) {
    echo 1;
}else{
    echo 0;
}


?>