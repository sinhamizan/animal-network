<?php
   session_start();

   include_once 'partials/header.php';
   include_once 'db.php';

   // admin users
   $admin_sql = "SELECT * FROM super_users";
   $admin_qs = mysqli_query( $con, $admin_sql );
   $total_admin = mysqli_num_rows( $admin_qs );

   // users
   $user_sql = "SELECT * FROM signup";
   $user_qs = mysqli_query( $con, $user_sql );
   $total_user = mysqli_num_rows( $user_qs );

   // doctors
   $doctor_sql = "SELECT * FROM doctors";
   $doctor_qs = mysqli_query( $con, $doctor_sql );
   $total_doctor = mysqli_num_rows( $doctor_qs );

   // posts
   $post_sql = "SELECT * FROM posts";
   $post_qs = mysqli_query( $con, $post_sql );
   $total_post = mysqli_num_rows( $post_qs );

   // selling ads
   $sell_sql = "SELECT * FROM sell_pets";
   $sell_qs = mysqli_query( $con, $sell_sql );
   $total_sell = mysqli_num_rows( $sell_qs );

   // adopts ads
   $adopt_sql = "SELECT * FROM adopt_pets";
   $adopt_qs = mysqli_query( $con, $adopt_sql );
   $total_adopt = mysqli_num_rows( $adopt_qs );

   // posts
   $comment_sql = "SELECT * FROM comments";
   $comment_qs = mysqli_query( $con, $comment_sql );
   $total_comment = mysqli_num_rows( $comment_qs );
?>

<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Dashboard</h4>
               </div>
               <div class="card-body">
                  <div class="all-items ov-h">
                     <div class="single-item">
                        <h2>totol admin users</h2>
                        <h3><?php echo $total_admin; ?></h3>
                     </div>

                     <div class="single-item">
                        <h2>totol registered users</h2>
                        <h3><?php echo $total_user; ?></h3>
                     </div>

                     <div class="single-item">
                        <h2>totol doctors</h2>
                        <h3><?php echo $total_doctor; ?></h3>
                     </div>

                     <div class="single-item">
                        <h2>totol posts</h2>
                        <h3><?php echo $total_post; ?></h3>
                     </div>

                     <div class="single-item">
                        <h2>totol Selling ads</h2>
                        <h3><?php echo $total_sell; ?></h3>
                     </div>

                     <div class="single-item">
                        <h2>totol adopting ads</h2>
                        <h3><?php echo $total_adopt; ?></h3>
                     </div>

                     <div class="single-item">
                        <h2>totol Comments</h2>
                        <h3><?php echo $total_comment; ?></h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include_once 'partials/footer.php'; ?>