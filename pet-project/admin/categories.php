<?php
   include_once 'partials/header.php';
   include_once '../class/main-class.php';

   $obj = new Main_Class();

   $result = $obj->display_category();
?>

<?php if( isset( $_SESSION['success_msg'] ) ): ?>
   <div class="alert alert-primary" role="alert"><?php 
      echo $_SESSION['success_msg'];
      unset( $_SESSION['success_msg'] );
   ?></div>
<?php endif; ?>

<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Categories</h4>
                  <a class="add-category btn btn-info" href="add-category.php">New</a>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">SL.</th>
                              <th>Category ID</th>
                              <th>Category Name</th>
                              <th>Status</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $i = 1;
                              while( $row = mysqli_fetch_assoc( $result ) ):
                           ?>
                              <tr>
                                 <td class="serial"><?php echo $i++; ?>.</td>
                                 <td>#<?php echo $row['id'] ?></td>
                                 <td> <span class="name"><?php echo $row['name']; ?></span> </td>
                                 <td><?php 
                                    if( $row['status'] == 1 ): ?>
                                       <a href="" class="btn btn-info">Active</a>
                                    <?php else: ?>
                                       <a href="" class="btn btn-warning">Deactive</a>
                                    <?php endif; ?></td>
                                 <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger">delete</a>
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