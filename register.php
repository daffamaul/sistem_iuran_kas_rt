<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Kas RT</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <script src="./bootstrap/js/bootstrap.min.js"></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- My Style -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body>
  <div class="container">
    <form class="m-3" method="post" action="">
      <h2 class="text-center fw-semibold">Register</h2>
      <img src="./img/user_icon.jpg" width="100" alt="" class="mx-auto d-block">
      <div class="mb-3">
        <label for="full_name" class="form-label fw-medium">Full name</label>
        <input type="text" name="full_name" class="form-control" id="full_name" placeholder="input your name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label fw-medium">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="input your email" required>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label fw-medium">Username</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="input your username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label fw-medium">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="input your password" required>
      </div>
      <div class="mb-3 form-check">
        <a href="login.php" class="fw-medium link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover text-end d-inline">
          Already account? login here!
        </a>
      </div>
      <button type="submit" class="btn btn-success d-block mx-auto fw-semibold" name="register">Register</button>
    </form>
  </div>
</body>

</html>