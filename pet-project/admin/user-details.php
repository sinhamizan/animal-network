<?php
    include_once 'partials/header.php'; 
    include_once 'db.php';

    $user_id = $_GET['id'];
    $sql = "SELECT * FROM signup WHERE id=$user_id";
    $qs = mysqli_query( $con, $sql );
    $info = mysqli_fetch_assoc( $qs );


?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
        <div class="col-xl-4">
            <div class="doctor_pic">
               <?php if( $info['image'] == '' ): ?>
                  <img src="images/avatar/1.jpg" alt="">
               <?php else: ?>
                  <img src="../uploads/profiles/<?php echo $info['image']; ?>" alt="">
               <?php endif; ?>
            </div>
        </div>
         <div class="col-xl-8">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">User Details</h4>
               </div>
               <div class="card-body--">
                  <div class="">
                     <table class="table">
                        <tbody>
                           <tr>
                               <th>User ID</th>
                               <td>#<?php echo $info['id']; ?></td>
                           </tr>
                           <tr>
                               <th>Full Name</th>
                               <td><?php echo $info['fulll_name']; ?></td>
                           </tr>
                           <tr>
                               <th>Email</th>
                               <td><?php echo $info['email']; ?></td>
                           </tr>
                           <tr>
                               <th>Phone</th>
                               <td><?php echo $info['phone']; ?></td>
                           </tr>
                           <tr>
                               <th>User Status</th>
                               <td><?php
                                 if( $info['is_verified'] == 0 ) { ?>
                                    <p style="color: green">Active</p>
                                 <?php }else { ?>
                                    <p style="color: red">Deactive</p>
                                <?php }
                               
                               ?></td>
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