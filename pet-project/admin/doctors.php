<?php
 include_once 'partials/header.php'; 
 include_once 'db.php';

 $sql = "SELECT * FROM doctors";
 $qs = mysqli_query( $con, $sql );



?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">All Doctors </h4>
                  <div class="new_user">
                     <a href="add-doctor.php" class="btn btn-info">Add New Doctor</a>
                  </div>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">SL.</th>
                              <th>Doctor ID</th>
                              <th class="avatar">Picture</th>
                              <th>Full Name</th>
                              <th>Designation</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1; ?>
                           <?php while( $user = mysqli_fetch_assoc( $qs ) ): ?>
                           <tr>
                              <td class="serial"><?php echo $i++; ?></td>
                              <td> #<?php echo $user['id']; ?> </td>
                              <td class="avatar">
                                 <div class="round-img">
                                    <?php if( $user['picture'] ): ?>
                                       <a href="#"><img class="rounded-circle" src="images/doctors/<?php echo $user['picture']; ?>" alt=""></a>
                                    <?php else:?>
                                       <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                   <?php
                                   endif;
                                    ?>
                                 </div>
                              </td>
                              <td> <span class="name"><?php echo $user['name']; ?></span> </td>
                              <td> <span class="product"><?php echo $user['designation']; ?></span> </td>
                              <td>
                                 <a href="delete-doctor.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                                 <a href="doctor-details.php?id=<?php echo $user['id']; ?>" class="btn btn-info">View</a>
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