<?php
 include_once 'partials/header.php'; 
 include_once 'db.php';

 $sql = "SELECT * FROM comments";
 $qs = mysqli_query( $con, $sql );



?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">All Comments </h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">SL.</th>
                              <th>Comment ID</th>
                              <th>Comment</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1; ?>
                           <?php while( $user = mysqli_fetch_assoc( $qs ) ): ?>
                           <tr>
                              <td class="serial"><?php echo $i++; ?></td>
                              <td> #<?php echo $user['id']; ?> </td>
                              <td> <span class="name"><?php echo substr( $user['comment'], 0, 50 ); ?></span>... </td>
                              <td>
                                 <a href="delete-comment.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                                 <a href="comment-details.php?id=<?php echo $user['id']; ?>" class="btn btn-info">View</a>
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