<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
if (isset($_POST['password-reset-token']) && $_POST['email']) {
  include "dbConnection.php";

  $result = mysqli_query($conn, "SELECT family_list FROM users WHERE Email='" . $_POST['email'] . "'");

  $row = $result->fetch_assoc();
  $status =  $row["family_list"];

  if ($status != 33) {

    $token = md5($_POST['email']) . rand(10, 9999);

    mysqli_query($conn, "UPDATE users set  email_verification_link ='" . $token . "' WHERE Email='" . $_POST['email'] . "'");

    $link = "<a href='localhost/myProject/Store-main/family-verify-email.php?key=" . $_POST['email'] . "&token=" . $token . "'>Click and Verify Email</a>";

    $mail = new PHPMailer();

    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;
    // GMAIL username
    $mail->Username = "imposteronlinestore@gmail.com";
    // GMAIL password
    $mail->Password = "tamer2081";
    $mail->SMTPSecure = "ssl";
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From = 'imposteronlinestore@gmail.com';
    $mail->FromName = $_POST['email'];
    $mail->AddAddress('imposteronlinestore@gmail.com', 'Admin');
    $mail->Subject  =  'Verify Family Member';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Verify Family Member And Send Confirm Email ' . $link . '';
    if ($mail->Send()) {
      echo "Admin Will Check Your Request and will send your confirmation email.";
?>
      echo <script type='text/javascript'>
        alert('Admin Will Check Your Request and will send your confirmation email !!');
        window.location.href = "logout.php";
      </script>";
    <?php
    } else {
    ?>
    <?php
      echo "Mail Error - >" . $mail->ErrorInfo;
    }
  } else {
    ?>
    echo <script type='text/javascript'>
      alert('You Already A Family Member');
      window.location.href = "index.php";
    </script>";
<?php
  }
}
?>