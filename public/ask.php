<?php include('../config/config.php'); $subject = $_GET['subject']; if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $question = $_POST['question'];
  mysqli_query($conn, "INSERT INTO questions (subject_id, question) VALUES ($subject, '$question')");
  echo "<p>Submitted!</p>";
} ?>
<!DOCTYPE html><html><body>
<h2>Ask a Question</h2>
<form method="POST">
  <textarea name="question" required></textarea><br>
  <button type="submit">Submit</button>
</form>
</body></html>

/*