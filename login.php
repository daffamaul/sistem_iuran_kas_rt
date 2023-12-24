<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Proses login di sini
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Tambahkan validasi dan logika login sesuai kebutuhan
    // Contoh sederhana hanya untuk ilustrasi
    if ($username == "user" && $password == "pass") {
        echo "<p>Login successful!</p>";
    } else {
        echo "<p>Login failed. Please check your username and password.</p>";
    }
}
?>

<div class="form-container" id="loginFormContainer">
  <form action="index.php" method="post">
    <input type="hidden" name="action" value="login">
    <h2 style="text-align:center;">Login</h2>
    <img src="img/user icon.jpg" alt="" width="100" style="margin:auto;" />
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <div class="remember-forgot">
      <label for="remember">
        <input type="checkbox" id="remember" name="remember"> Remember Me
      </label>
      <br>
      <a href="index.php?action=forgot_password">Forgot Password?</a>
    </div>
    <br>
    <button type="submit" name="login">Login</button>
    <p>Don't have an account? <a href="index.php?action=register">Register Now</a></p>
  </form>
</div>
