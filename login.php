<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <title>Login | Kas RT</title>
</head>

<body>
    <div class="container">
        <form class="mt-3" method="post" action="">
            <h2 class="text-center fw-semibold">login</h2>
            <img src="./img/user_icon.jpg" width="100" alt="" class="mx-auto d-block">
            <div class="mb-3">
                <label for="username" class="form-label fw-medium">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="input your username..." required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-medium">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="input your password..." required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label fw-medium" for="remember">Remember me</label> |
                <a href="register.php" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover text-end d-inline fw-medium">
                    Register here!
                </a>
            </div>
            <button type="submit" class="btn btn-success d-block mx-auto fw-semibold" name="login">Login</button>
        </form>
    </div>
</body>

</html>