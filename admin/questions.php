<?php include('../config/config.php'); $qs = mysqli_query($conn, "SELECT * FROM questions"); ?>
<h2>All Questions</h2>
<?php while($q = mysqli_fetch_assoc($qs)) echo "<div>{$q['question']}</div>"; ?>
