<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Login | Kas RT</title>
</head>
<body>
  <div class="container">
    <?php
      if (isset($_GET['action']) && $_GET['action'] == 'register') {
        include('register.php');
      } else {
        include('login.php');
      }
    ?>
  </div>
</body>
</html>
