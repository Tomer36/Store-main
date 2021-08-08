<!doctype html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Family Member Request</title>
  <!-- CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header text-center">
      Family Member Request
      </div>
      <div class="card-body">
        <form action="family-member-email-request.php" method="post">

          <div class="form-group">
            <label for="exampleInputEmail1">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required="">
            <small id="emailHelp" class="form-text text-muted">We'll Look into your request as soon as posible!</small>
          </div>

          <input type="submit" name="password-reset-token" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>

</body>

</html>