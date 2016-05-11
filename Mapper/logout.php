<!Doctype html>
<html>
<head>
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>

<div id= "main">
<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);


echo "Sie haben sich erfolgreich ausgeloggt.";
?>
    <br>
    <a href="../index.php">Zur&uumlck zum Startseite</a>
</div>

</html>
