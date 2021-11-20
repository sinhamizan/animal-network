<?php 
session_start();
include_once 'db.php';

$commenter_id = $_SESSION['id'];
$commenter = $_SESSION['name'];
$post_id = $_POST['post'];
$comment = $_POST['comment'];

$sql = "INSERT INTO comments(post_id, user_id, user_name, comment) VALUES('$post_id', $commenter_id, '$commenter', '$comment' )";

if($comment != ''){
    $result = mysqli_query($con, $sql);
}

echo $result;