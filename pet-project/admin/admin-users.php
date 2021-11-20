<?php
 include_once 'partials/header.php'; 
 include_once 'db.php';

 $sql = "SELECT * FROM super_users";
 $qs = mysqli_query( $con, $sql );



?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">All Admins </h4>
                  <!-- <div class="new_user">
                     <a href="" class="btn btn-info">Add New Admin</a>
                  </div> -->
               </div>
               <div class="card-body-- admin_users">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">SL.</th>
                              <th>Admin ID</th>
                              <th>Full Name</th>
                              <th>Email</th>
                              <!-- <th>Actions</th> -->
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1; ?>
                           <?php while( $user = mysqli_fetch_assoc( $qs ) ): ?>
                           <tr>
                              <td class="serial"><?php echo $i++; ?></td>
                              <td> #<?php echo $user['id']; ?> </td>
                              <td> <span class="name"><?php echo $user['name']; ?></span> </td>
                              <td> <span class="product"><?php echo $user['email']; ?></span> </td>
                              <!-- <td>
                                 <a href="" class="btn btn-danger">Delete</a>
                                 <a href="" class="btn btn-info">View</a>
                              </td> -->
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