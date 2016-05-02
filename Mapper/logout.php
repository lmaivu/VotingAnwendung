<!Doctype html>
<html>

<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);

echo "Sie haben sich erfolgreich ausgeloggt.";
?>
<a href="../index.php">Zur&uumlck zum Login</a>;

</html>
