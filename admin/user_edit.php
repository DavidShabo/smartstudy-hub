<?php include('../config/config.php'); $id = $_GET['id'] ?? 0; $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id")); ?>
<h2>Edit User</h2>
<form method="POST"><input value="<?= $user['name'] ?>" name="name"><button>Save</button></form>
