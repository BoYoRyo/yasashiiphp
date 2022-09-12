<form action="htmlsp.php" method="POST">
  <input type="text" name="test">
  <input type="submit">
</form>
<?php
echo $_POST['test'];
?>