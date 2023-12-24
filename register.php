<div class="form-container" id="registrationFormContainer">
  <form action="register_process.php" method="post">
    <h2 style="text-align:center;">Registration</h2>
    <label for="Nama Lengkap">Nama Lengkap:</label>
    <input type="text" id="Nama Lengkap" name="Nama Lengkap" required>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="Email"> Email:</label>
    <input type="text" id="Email" name="Email"required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    <button type="submit" name="register">Register</button>
    <p>Already have an account? <a href="index.php">Login</a></p>
  </form>
</div>