<?php
$services = ['DB' => true, 'Mail' => false, 'Queue' => true];
echo "<h2>System Status</h2><ul>";
foreach ($services as $k => $v) echo "<li>$k: " . ($v ? '✅' : '❌') . "</li>";
echo "</ul>";
?>
