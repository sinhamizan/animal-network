<?php
 include_once 'partials/header.php'; 
 include_once 'db.php';

 $sql = "SELECT * FROM sell_pets";
 $qs = mysqli_query( $con, $sql );



?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">All Selling ads </h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">SL.</th>
                              <th>ads ID</th>
                              <th class="avatar">Picture</th>
                              <th>pet Name</th>
                              <th>price</th>
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
                                    <?php if( $user['pet_img'] ): ?>
                                       <a href="#"><img class="rounded-circle" src="../uploads/sells/<?php echo $user['pet_img']; ?>" alt=""></a>
                                    <?php else:?>
                                       <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                   <?php
                                   endif;
                                    ?>
                                 </div>
                              </td>
                              <td> <span class="name"><?php echo $user['pet_name']; ?></span> </td>
                              <td> <span class="product"><?php echo $user['pet_price']; ?></span> </td>
                              <td>
                                 <a href="delete-selling-ads.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                                 <a href="selling-ads-details.php?id=<?php echo $user['id']; ?>" class="btn btn-info">View</a>
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