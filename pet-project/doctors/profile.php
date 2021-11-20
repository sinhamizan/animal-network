<?php
    include_once 'partials/header.php'; 
    include_once 'db.php';

   // find doctor id
   $doctor_email = $_SESSION['doc_email'];
   $sql2 = "SELECT * FROM doctors WHERE email='$doctor_email'";
   $data2 = mysqli_query($con, $sql2);
   $doc_info = mysqli_fetch_assoc( $data2 );
   $doctor_id = $doc_info['id'];

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
                  <img src="upload/profiles/<?php echo $info['picture']; ?>" alt="">
               <?php else: ?>
                  <a href="#"><img src="images/1.jpg" alt="Picture"></a>
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