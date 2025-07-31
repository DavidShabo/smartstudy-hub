<?php
session_start();
if (!isset($_SESSION['admin'])) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['user'] === 'admin' && $_POST['pass'] === 'admin123') {
      $_SESSION['admin'] = true;
      header('Location: dashboard.php');
    }
  }
}
?>
<!DOCTYPE html><html><body>
<h2>Admin Login</h2>
<form method="POST">
  <input name="user" placeholder="Username"><br>
  <input name="pass" type="password" placeholder="Password"><br>
  <button>Login</button>
</form>
</body></html>