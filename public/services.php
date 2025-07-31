<?php include('../config/config.php'); $result = mysqli_query($conn, "SELECT * FROM subjects"); ?>
<!DOCTYPE html><html><body>
<h2>All Subjects</h2>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
  <div><h3><?= $row['name'] ?> (<?= $row['level'] ?>)</h3>
  <a href="service.php?id=<?= $row['id'] ?>">Details</a></div>
<?php } ?>
</body></html>