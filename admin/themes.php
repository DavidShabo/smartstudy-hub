<!DOCTYPE html><html><body>
<h2>Switch Theme</h2>
<button onclick="setTheme('default')">Default</button>
<button onclick="setTheme('dark')">Dark</button>
<button onclick="setTheme('seasonal')">Seasonal</button>
<script>
  function setTheme(t) {
    fetch(`../storage/theme.txt`, {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: 'theme=' + t
    }).then(() => alert("Theme updated!"));
  }
</script>
</body></html>
