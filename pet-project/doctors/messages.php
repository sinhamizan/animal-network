<?php
   session_start();
   
   include_once 'partials/header.php'; 
   include_once 'db.php';

   // find doctor id
   $doctor_email = $_SESSION['doc_email'];
   $sql3 = "SELECT * FROM doctors WHERE email='$doctor_email'";
   $data2 = mysqli_query($con, $sql3);
   $doc_info = mysqli_fetch_assoc( $data2 );
   $doctor_id = $doc_info['id'];

   $sql = "SELECT * FROM chats WHERE doctors_id=$doctor_id ORDER BY id DESC";
   $qs = mysqli_query( $con, $sql );
   

?>

<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card message-not">
               <div class="card-body">
                  <h4 class="box-title">All Messages </h4>
               </div>
               <div class="card-body--">
                  <div class="">
                     <table class="table">
                        <tbody>
                           <?php
                              while( $msg = mysqli_fetch_assoc( $qs ) ):

                                 $sender = $msg['users_id'];
                                 $sql2 = "SELECT fulll_name FROM signup WHERE id = '{$sender}' ORDER BY id DESC";
                                 $get_ads2 = mysqli_query( $con, $sql2 ); 
                                 $user = mysqli_fetch_assoc( $get_ads2 );

                           ?>
                              <tr>
                                 <?php if( $msg['is_seen'] == 0 ): ?>
                                 <div class="alert alert-primary ml-2 mr-2" role="alert">
                                    <a href="messege-seen.php?id=<?php echo $sender; ?>&&did=<?php echo $doctor_id; ?>"><?php echo "New message from " . $user['fulll_name']; ?></a>
                                 </div>
                                 <?php else: ?>
                                 <div class="alert alert-light" role="alert">
                                    <a href="messege-seen.php?id=<?php echo $sender; ?>&&did=<?php echo $doctor_id; ?>"><?php echo "Message from " . $user['fulll_name']; ?></a>
                                 </div>
                                 <?php endif; ?>
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