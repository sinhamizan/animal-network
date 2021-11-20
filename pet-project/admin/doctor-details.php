<?php
    include_once 'partials/header.php'; 
    include_once 'db.php';

    $doctor_id = $_GET['id'];
    $sql = "SELECT * FROM doctors WHERE id=$doctor_id";
    $qs = mysqli_query( $con, $sql );
    $info = mysqli_fetch_assoc( $qs );


?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
        <div class="col-xl-4">
            <div class="doctor_pic">
               <?php if( $info['picture'] ): ?>
                  <img src="images/doctors/<?php echo $info['picture']; ?>" alt="">
               <?php else: ?>
                  <a href="#"><img src="images/avatar/1.jpg" alt=""></a>
               <?php endif; ?>
            </div>
        </div>
         <div class="col-xl-8">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Doctor Details</h4>
               </div>
               <div class="card-body--">
                  <div class="">
                     <table class="table">
                        <tbody>
                           <tr>
                               <th>Doctor ID</th>
                               <td>#<?php echo $info['id']; ?></td>
                           </tr>
                           <tr>
                               <th>Full Name</th>
                               <td><?php echo $info['name']; ?></td>
                           </tr>
                           <tr>
                               <th>Designation</th>
                               <td><?php echo $info['designation']; ?></td>
                           </tr>
                           <tr>
                               <th>About Doctors</th>
                               <td><?php echo $info['details']; ?></td>
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