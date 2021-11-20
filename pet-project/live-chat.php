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
      <div class="col-6">
        <div class="chat-content">
          <div class="chat-header">
            <div class="back">
              <a href="doctors.php"> < </a>
            </div>
            <div class="header-img">
              <img src="uploads/doctors/<?php echo $res_info['picture']; ?>" alt="Doctor Image">
            </div>
            <div class="doc-name">
              <p><?php echo $res_info['name']; ?></p>
            </div>
          </div>
          <div class="chat-body">
            <form action="" method="POST">
              <textarea name="chat_msg" class="form-control" id="chat_msg" rows="2"></textarea>
              <input type="submit" name="chat_submit" id="chat_submit" value="Send">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  var conn = new WebSocket('ws://localhost:8080');
  conn.onopen = function(e) {
      console.log("Connection established!");
  };

  conn.onmessage = function(e) {
      console.log(e.data);
  };
</script>
  
<?php include_once 'partials/footer.php'; ?>