<?php include('../config/config.php'); $id = $_GET['id'] ?? 0; $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM subjects WHERE id=$id")); ?>
<form method="POST"><input value="<?= $row['name'] ?>" name="name"><button>Update</button></form>
