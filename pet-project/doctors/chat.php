<?php
  session_start();
  
  include_once 'partials/header.php'; 
  include_once 'db.php';

  $doctor_id = 1;
  $user_id = $_GET['id'];

  $sql = "SELECT * FROM signup WHERE id=$user_id";
  $get_info = mysqli_query( $con, $sql ); 
  $user = mysqli_fetch_assoc( $get_info );

?>

<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card message-not">
               <div class="card-body user-header">
                <div class="header-img">
                  <img src="../uploads/profiles/<?php echo $user['image']; ?>" alt="User Image">
                </div>
                <div class="doc-name">
                  <p><?php echo $user['fulll_name']; ?></p>
                </div>
                </div>
               <div class="card-body--">
                <div class="chat-content">
                  <div class="chat-body">
                    <div id="show_chat_doc"></div>
                    <form action="" method="POST" id="reset_form_doc">
                      <input type="hidden" value="<?php echo $user_id; ?>" id="receiver_doc">
                      <input type="text" name="chat_msg" class="form-control" id="chat_msg_doc">
                      <input type="submit" id="chat_submit_doc" value="Send">
                    </form>
                    <div id="error_msg"></div>
                  </div>
                  <div class="refresh_msg">
                    <button class="btn btn-info" onclick="refresh_message()">Check New Message</button>
                  </div>
                </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include_once 'partials/footer.php'; ?>


<script>

function load_data_doc() {
  var receiver_doc2 = jQuery('#receiver_doc').val();

  jQuery.ajax({
    url: 'msg-load.php',
    type: 'POST',
    data: { receiver_id:receiver_doc2 },
    success: function(data) {
      jQuery('#show_chat_doc').html(data)
    }
  })
}
load_data_doc();


  jQuery('#chat_submit_doc').on('click', function(e){
  e.preventDefault();

  var msg_doc = jQuery('#chat_msg_doc').val();
  var receiver_doc = jQuery('#receiver_doc').val();

  if ( msg_doc === '' ) {
    jQuery('#error_msg').html("Please write a message.").slideDown();
  } else {
    jQuery.ajax({
      url: 'chat-insert-doc.php',
      type: 'POST',
      data: {msg_doc:msg_doc, receiver_doc:receiver_doc},
      success: function(data) {
          if( data == 1 ) {
            load_data_doc();
            jQuery('#reset_form_doc').trigger('reset');
          }else{
            alert("Something Occur Wrong!");
          }
      }
    })
  }

});

function refresh_message() {
  location.reload();
}

function scrollBtm() {
  setTimeout( scrollFunc , 300);
}

function scrollFunc() {
  window.scrollTo(0, 1000);
}
window.onload = scrollBtm();


</script>