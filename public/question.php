<?php include('../config/config.php'); $id = $_GET['id'] ?? 1; $q = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM questions WHERE id=$id")); ?>
<h2>Question Detail</h2>
<p><?= $q['question'] ?></p>