<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';
  include_once 'db.php';

  $doc_id = $_GET['id'];

  $sql = "SELECT * FROM doctors WHERE id='$doc_id'";
  $res = mysqli_query( $con, $sql );
  $res_info = mysqli_fetch_assoc( $res );

?>


<section class="chat-area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="chat-content">
          <div class="chat-header">
            <div class="back">
              <a href="doctors.php"> < </a>
            </div>
            <div class="header-img">
              <?php if( $res_info['picture'] ): ?>
                <img src="doctors/upload/profiles/<?php echo $res_info['picture']; ?>" alt="">
              <?php else: ?>
                <img src="assets/imgs/profile.png" alt="">
              <?php endif; ?>
            </div>
            <div class="doc-name">
              <p><?php echo $res_info['name']; ?></p>
            </div>
          </div>
          <div class="chat-body">
            <div class="chat-list">
              <div id="show_chat"></div>
            </div>

            <form action="" method="POST" id="reset_form">
              <input type="hidden" value="<?php echo $doc_id; ?>" id="receiver">
              <input type="text" name="chat_msg" class="form-control" id="chat_msg">
              <!-- <textarea name="chat_msg" class="form-control" id="chat_msg" rows="2"></textarea> -->
              <input type="submit" id="chat_submit" value="Send">
            </form>
            <div id="error_msg"></div>
            <div class="check_user_msg">
              <button class="btn btn-info" onclick="userMessage()">Check New Message</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
<?php include_once 'partials/footer.php'; ?>

<script>

function load_data() {
  var receiver_id = $('#receiver').val();

  $.ajax({
    url: 'msg-load.php',
    type: 'POST',
    data: { receiver_id:receiver_id },
    success: function(data) {
      $('#show_chat').html(data)
    }
  })
}
load_data()


  jQuery('#chat_submit').on('click', function(e){
  e.preventDefault();

  var msg = $('#chat_msg').val();
  var receiver = $('#receiver').val();
  
  if ( msg === '' ) {
    $('#error_msg').html("Please write a message.").slideDown();
  }else {
    $.ajax({
      url: 'chat-insert.php',
      type: 'POST',
      data: {msg:msg, receiver:receiver},
      success: function(data) {
          if( data == 1 ) {
            load_data();
            $('#reset_form').trigger('reset');
          }else{
            alert("Something Occur Wrong!");
          }
      }
    })
  }

});

function userMessage() {
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