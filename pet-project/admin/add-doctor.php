<?php
    session_start();
   include_once 'partials/header.php';
   include_once 'db.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendMailDoctor( $email ) {
        require 'PHPMailer\PHPMailer.php';
        require 'PHPMailer\SMTP.php';
        require 'PHPMailer\Exception.php';
    
        $mail = new PHPMailer(true);
    
        try {
          $mail->isSMTP();                                            
          $mail->Host       = 'smtp.gmail.com';                     
          $mail->SMTPAuth   = true;                                  
          $mail->Username   = '';                     
          $mail->Password   = '';                               
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;       
          $mail->Port       = 465;
    
          $mail->setFrom('', 'Pet Animal');
          $mail->addAddress( $email );
          
          $mail->isHTML(true);                                  
          $mail->Subject = 'Login Success Message';
          $mail->Body    = "Hi, This is your Login information. Email: $email and Password: 12345. Please <a href='http://localhost/pet-project/doctors'>Login</a> and Update your password.";
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      
          $mail->send();
          return true;
        } catch (Exception $e) {
          return false;
        }
      }


    if( isset($_POST['new_doctor']) ) {
        $doctor_name = $_POST['doctor_name'];
        $doctor_email = $_POST['doctor_email'];
        $doctor_desig = $_POST['doctor_desig'];
        $about_doctor = $_POST['about_doctor'];
        $doctor_pic = $_FILES['doctor_pic'];

        $pic_name = $doctor_pic['name'];
        $pic_tmp_name = $doctor_pic[ 'tmp_name' ];
        $pic_loc = 'images/doctors/' . $pic_name;
        move_uploaded_file( $pic_tmp_name, $pic_loc );

        if( $doctor_name != '' && $doctor_email != '' && $doctor_desig != '' ) {
            $check_email = "SELECT * FROM doctors WHERE email = '$doctor_email'";
            $get_email = mysqli_query( $con, $check_email );

            if( mysqli_num_rows( $get_email ) > 0 ) { ?>
                <div class="alert alert-warning" role="alert">This Email already used! Please try to another Email</div>
            <?php } else {
                $sql = "INSERT INTO doctors( name, email, designation, picture, details ) VALUES( '$doctor_name', '$doctor_email', '$doctor_desig', '$pic_name', '$about_doctor' )";
                $qs = mysqli_query( $con, $sql );

                if( $qs && sendMailDoctor( $doctor_email ) ) {
                    header( 'location: doctors.php' );
                } else {
                    header( 'location: add-doctor.php' );
                }
            }
        }
        else { ?>
            <div class="alert alert-warning" role="alert">Please Fillup the required fields</div>
        <?php }
        
    }
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Add New Doctor</strong></div>
                    <div class="card-body card-block">
                        <form action="" method="POST"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Doctor Name</label>
                                <input type="text" id="company" name="doctor_name" placeholder="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Doctor Email</label>
                                <input type="email" id="doc_email" name="doctor_email" placeholder="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="company" class="form-control-label">Doctor Designation</label>
                                <input type="text" id="company" name="doctor_desig" placeholder="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="company" class="form-control-label">Doctor Picture</label>
                                <input type="file" id="company" name="doctor_pic" placeholder="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="company" class="form-control-label">About Doctor</label>
                                <textarea name="about_doctor" id="" class="form-control" rows="5"></textarea>
                            </div>
                            <input id="payment-button" value="Add Doctor" name="new_doctor" type="submit" class="btn btn-lg btn-info btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'partials/footer.php'; ?>