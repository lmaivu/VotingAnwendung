<!Doctype html>
<html>
<head>
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>

<div id= "box">
<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);


echo "Sie haben sich erfolgreich ausgeloggt.";
?>
    <br>
    <a href="../index.php">Zurück zur Startseite</a>
</div>

</html>
