<?php
 include_once 'partials/header.php'; 



?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Orders </h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">SL.</th>
                              <th>Products ID</th>
                              <th class="avatar">Thumbnail</th>
                              <th>Product Name</th>
                              <th>Product Category</th>
                              <th>Quantity</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="serial">1.</td>
                              <td> #5469 </td>
                              <td class="avatar">
                                 <div class="round-img">
                                    <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                 </div>
                              </td>
                              <td> <span class="name">Louis Stanley</span> </td>
                              <td> <span class="product">iMax</span> </td>
                              <td><span class="count">231</span></td>
                              <td>
                                 <span class="badge badge-complete">Active</span>
                              </td>
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