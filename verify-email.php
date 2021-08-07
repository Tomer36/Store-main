<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>User Account Activation by Email Verification using PHP</title>
  <!-- CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';
  if ($_GET['key'] && $_GET['token']) {
    include "dbConnection.php";

    $email = $_GET['key'];

    $token = $_GET['token'];

    $query = mysqli_query(
      $conn,
      "SELECT * FROM `users` WHERE `email_verification_link`='" . $token . "' and `Email`='" . $email . "';"
    );

    $d = date('Y-m-d H:i:s');
    $stat = 33;

    if (mysqli_num_rows($query) > 0) {

      $row = mysqli_fetch_array($query);

      mysqli_query($conn, "UPDATE users set family_list = '" . $stat . "' , email_verified_at ='" . $d . "' WHERE Email='" . $email . "'");
      $link2 = "<a href='localhost/myProject/Store-main/Sign_in.php'>Click and Sign In</a>";

      $msg = "Member Joined";
      $mail2 = new PHPMailer();
      $mail2->CharSet =  "utf-8";
      $mail2->IsSMTP();
      // enable SMTP authentication
      $mail2->SMTPAuth = true;
      // GMAIL username
      $mail2->Username = "imposteronlinestore@gmail.com";
      // GMAIL password
      $mail2->Password = "tamer2081";
      $mail2->SMTPSecure = "ssl";
      // sets GMAIL as the SMTP server
      $mail2->Host = "smtp.gmail.com";
      // set the SMTP port for the GMAIL server
      $mail2->Port = "465";
      $mail2->From = 'imposteronlinestore@gmail.com';
      $mail2->FromName = 'Admin';
      $mail2->AddAddress($email);
      $mail2->Subject  =  'Verified Family Member';
      $mail2->IsHTML(true);
      $mail2->Body    = 'Admin Verified you as family member, Please Login to start adding to the family list ' . $link2 . '';
      
      if ($mail2->Send()) {
        echo "Mail Sent";
      } else {
        echo "Mail Error - >" . $mail2->ErrorInfo;
      }
    }
  } else {
    $msg = "Danger! Your something goes to wrong.";
  }
  ?>
  <div class="container mt-3">
    <div class="card">
      <div class="card-header text-center">
        User Account Activation by Email Verification using PHP
      </div>
      <div class="card-body">
        <p><?php echo $msg; ?></p>
      </div>
    </div>
  </div>

</body>

</html>