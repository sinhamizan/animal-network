<?php
 include_once 'partials/header.php'; 
 include_once 'db.php';

 $sql = "SELECT * FROM posts";
 $qs = mysqli_query( $con, $sql );



?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">All Users </h4>
                  <!-- <div class="new_user">
                     <a href="" class="btn btn-info">Add New User</a>
                  </div> -->
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">SL.</th>
                              <th>Author Name</th>
                              <th>Post Title</th>
                              <th>Posted Date</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1; ?>
                           <?php while( $user = mysqli_fetch_assoc( $qs ) ): ?>
                           <tr>
                              <td class="serial"><?php echo $i++; ?></td>
                              <td> <span class="name"><?php echo $user['author_id']; ?></span> </td>
                              <td> <span class="product"><?php echo substr( $user['post_text'], 0, 25 ); ?>...</span> </td>
                              <td><span><?php echo $user['post_date']; ?></span></td>
                              <td>
                                 <a href="delete-post.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                                 <a href="post-details.php?id=<?php echo $user['id']; ?>" class="btn btn-info">View</a>
                              </td>
                           </tr>
                           <?php endwhile; ?>
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