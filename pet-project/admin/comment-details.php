<?php
    include_once 'partials/header.php'; 
    include_once 'db.php';

    $doctor_id = $_GET['id'];
    $sql = "SELECT * FROM comments WHERE id=$doctor_id";
    $qs = mysqli_query( $con, $sql );
    $info = mysqli_fetch_assoc( $qs );


?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-8 offset-xl-2">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Full Comment</h4>
               </div>
               <div class="card-body--">
                  <div class="">
                     <table class="table">
                        <tbody>
                           <tr>
                               <th>Comment ID</th>
                               <td>#<?php echo $info['id']; ?></td>
                           </tr>
                           <tr>
                               <th>Comments</th>
                               <td><?php echo $info['comment']; ?></td>
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