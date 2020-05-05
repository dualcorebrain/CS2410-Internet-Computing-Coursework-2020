
<?php

//PHP MAILER NOT WORKING, Using PHPMAILER library version 5.2 From github by PHPMailer - https://github.com/PHPMailer/PHPMailer
    if(isset($_post['submit'])){
        require 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->Host='smtp.gmail.com';
        $mail->Port= '587';
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Username='filoemailtester@gmail.com';        //Email + Password created for this software only
        $mail->Password="Filoclaimer123!";

        $mail->setForm($_POST['email']);
        $mail->addAddress('prasadanurag226@gmail.com');
        $mail->addReplyTO($_POST['email']);

        $mail->isHTML(true);
        $mail->Subject='New Claim Submission';
        $mail->Body='<h1 Name:'. $_POST['name'];

        if(!$mail->send()){
            $result = "Something went wrong with sending claim submission";
        }
        else{
            $result="Thanks".$_POST['name']."Thanks your claim has been submitted";
        }
    }
?>

<div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">


                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="name" class="form-control" placeholder="First Name" required>

                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" placeholder="Email" required>
                      </div>
                      <div class="form-group">
                          <label>subject</label>
                          <input type="text" name="subject" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>message</label>
                          <input type="text" name="subject" class="form-control" placeholder="Username" required>
                      </div>
                      <input type="submit"  name="submit" class="btn btn-primary" value="Save" required />
                      <h4><?php echo $result?></h4>
                  </form>
                   <!-- Form End-->