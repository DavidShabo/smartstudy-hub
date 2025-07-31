<?php
// D.S: Login form handler
session_start();
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $pass = md5($_POST['password']); // NOTE: Insecure, use bcrypt in production

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
  $res = mysqli_query($conn, $sql);

  if (mysqli_num_rows($res) === 1) {
    $_SESSION['user'] = mysqli_fetch_assoc($res);
    header('Location: profile.php');
  } else {
    $error = \"Invalid login.\";
  }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
  <h2>Login</h2>
  <?php if (!empty($error)) echo \"<p style='color:red'>$error</p>\"; ?>
  <form method=\"POST\">
    <input type=\"email\" name=\"email\" placeholder=\"Email\" required><br>
    <input type=\"password\" name=\"password\" placeholder=\"Password\" required><br>
    <button type=\"submit\">Login</button>
  </form>
</body>
</html>
