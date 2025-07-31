<?php include('../config/config.php'); $users = mysqli_query($conn, "SELECT * FROM users"); ?>
<h2>All Users</h2><ul><?php while($u = mysqli_fetch_assoc($users)) echo "<li>{$u['name']} ({$u['email']})</li>"; ?></ul>
