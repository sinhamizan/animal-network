<?php
    include_once 'partials/header.php'; 
    include_once 'db.php';

    $user_id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id=$user_id";
    $qs = mysqli_query( $con, $sql );
    $info = mysqli_fetch_assoc( $qs );


?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
        <div class="col-xl-4">
            <div class="doctor_pic">
               <?php if( $info['post_file'] == '' ): ?>
                  <img src="images/avatar/1.jpg" alt="">
               <?php else: ?>
                  <img src="../uploads/posts/<?php echo $info['post_file']; ?>" alt="">
               <?php endif; ?>
            </div>
        </div>
         <div class="col-xl-8">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Post Details</h4>
               </div>
               <div class="card-body--">
                  <div class="">
                     <table class="table">
                        <tbody>
                           <tr>
                               <th>Post ID</th>
                               <td>#<?php echo $info['id']; ?></td>
                           </tr>
                           <tr>
                               <th>Author Name</th>
                               <td><?php echo $info['author_id']; ?></td>
                           </tr>
                           <tr>
                               <th>Post Description</th>
                               <td><?php echo $info['post_text']; ?></td>
                           </tr>
                           <tr>
                               <th>Posted Date</th>
                               <td><?php echo $info['post_date']; ?></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include_once 'partials/footer.php'; ?>