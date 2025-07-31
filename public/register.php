<?php
include('../config/config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = md5($_POST['password']);
  $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if (mysqli_num_rows($check)) {
    $error = "User already exists.";
  } else {
    mysqli_query($conn, "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$pass')");
    header("Location: login.php");
  }
}
?>
<!DOCTYPE html>
<html><body>
<h2>Register</h2>
<?php if (!empty($error)) echo "<p>$error</p>"; ?>
<form method="POST">
  <input name="name" required placeholder="Full Name"><br>
  <input name="email" type="email" required placeholder="Email"><br>
  <input name="password" type="password" required placeholder="Password"><br>
  <button>Register</button>
</form>
</body></html>
