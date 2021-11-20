<?php
   session_start();
   include_once 'partials/header.php';

   
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
                        <h2>totol category: <?php echo $total_cat; ?></h2>
                        <h3>active category: </h3>
                        <h3>deactive category: </h3>
                     </div>

                     <div class="single-item">
                        <h2>totol category: <span>12</span></h2>
                        <h3>active category: </h3>
                        <h3>deactive category: </h3>
                     </div>

                     <div class="single-item">
                        <h2>totol category: <span>12</span></h2>
                        <h3>active category: </h3>
                        <h3>deactive category: </h3>
                     </div>

                     <div class="single-item">
                        <h2>totol category: <span>12</span></h2>
                        <h3>active category: </h3>
                        <h3>deactive category: </h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include_once 'partials/footer.php'; ?>