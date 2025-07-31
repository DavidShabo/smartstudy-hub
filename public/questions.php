<?php include('../config/config.php'); $res = mysqli_query($conn, "SELECT * FROM questions"); ?>
<h2>All Submitted Questions</h2>
<ul><?php while($row = mysqli_fetch_assoc($res)) echo "<li>{$row['question']}</li>"; ?></ul>
