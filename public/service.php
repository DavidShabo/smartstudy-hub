<?php include('../config/config.php'); $id = $_GET['id'] ?? 1; $subj = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM subjects WHERE id=$id")); ?>
<!DOCTYPE html><html><body>
<h2><?= $subj['name'] ?></h2>
<p>Level: <?= $subj['level'] ?></p>
<a href="ask.php?subject=<?= $subj['id'] ?>">Ask a Question</a>
</body></html>
