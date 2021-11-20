<?php
    include_once 'partials/header.php'; 
    include_once 'db.php';

    $doctor_id = $_GET['id'];
    $sql = "SELECT * FROM sell_pets WHERE id=$doctor_id";
    $qs = mysqli_query( $con, $sql );
    $info = mysqli_fetch_assoc( $qs );


?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
        <div class="col-xl-4">
            <div class="doctor_pic">
               <?php if( $info['pet_img'] ): ?>
                  <img src="../uploads/sells/<?php echo $info['pet_img']; ?>" alt="">
               <?php else: ?>
                  <a href="#"><img src="images/avatar/1.jpg" alt=""></a>
               <?php endif; ?>
            </div>
        </div>
         <div class="col-xl-8">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">ads Details</h4>
               </div>
               <div class="card-body--">
                  <div class="">
                     <table class="table">
                        <tbody>
                           <tr>
                               <th>ads ID</th>
                               <td>#<?php echo $info['id']; ?></td>
                           </tr>
                           <tr>
                               <th>pet Name</th>
                               <td><?php echo $info['pet_name']; ?></td>
                           </tr>
                           <tr>
                               <th>pet price</th>
                               <td><?php echo $info['pet_price']; ?></td>
                           </tr>
                           <tr>
                               <th>address</th>
                               <td><?php echo $info['address']; ?></td>
                           </tr>
                           <tr>
                               <th>pet details</th>
                               <td><?php echo $info['pet_details']; ?></td>
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