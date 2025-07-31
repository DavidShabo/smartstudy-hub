<?php
// D.S: User registration
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = md5($_POST['password']);

  $check = mysqli_query($conn, \"SELECT * FROM users WHERE email='$email'\");
  if (mysqli_num_rows($check)) {
    $error = \"User already exists.\";
  } else {
    mysqli_query($conn, \"INSERT INTO users(name, email, password) VALUES('$name', '$email', '$pass')\");
    header(\"Location: login.php\");
  }
}
?>

<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
  <h2>Register</h2>
  <?php if (!empty($error)) echo \"<p style='color:red'>$error</p>\"; ?>
  <form method=\"POST\">
    <input type=\"text\" name=\"name\" placeholder=\"Full Name\" required><br>
    <input type=\"email\" name=\"email\" placeholder=\"Email\" required><br>
    <input type=\"password\" name=\"password\" placeholder=\"Password\" required><br>
    <button type=\"submit\">Register</button>
  </form>
</body>
</html>
