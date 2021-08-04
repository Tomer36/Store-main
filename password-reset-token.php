<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_POST['password-reset-token']) && $_POST['email']) {
  include 'dbConnection.php';

  $emailId = $_POST['email'];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE Email='" . $emailId . "'");

  $row = mysqli_fetch_array($result);

  if ($row) {

    $token = md5($emailId) . rand(10, 9999);

    $expFormat = mktime(
      date("H"),
      date("i"),
      date("s"),
      date("m"),
      date("d") + 1,
      date("Y")
    );

    $expDate = date("Y-m-d H:i:s", $expFormat);

    $update = mysqli_query($conn, "UPDATE users set  pass_word='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE Email='" . $emailId . "'");

    $link = "<a href='http://localhost/myProject/store-main/reset-password.php?key=" . $emailId . "&token=" . $token . "'>Click To Reset password</a>";
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
    $mail->FromName = 'T&L';
    $mail->AddAddress($emailId, 'tamer');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password ' . $link . '';
    if ($mail->Send()) {
      echo "Check Your Email and Click on the link sent to your email";
    } else {
      echo "Mail Error - >" . $mail->ErrorInfo;
    }
  } else {
    echo "Invalid Email Address. Go back";
  }
}
