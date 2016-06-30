<?php include("../inc/session_check.php"); ?>
    <!-- Datei um das Voting Hinzuf?gen Formular zu ?berpr?fen, die eingegebenen Werte werden als string umgewandelt und gespeichert,
als neuer Datensatz der Klasse Voting hi-->

 <!DOCTYPE html>
 <html>

<body>

<div id="standard">
<?php
require_once("../Mapper/DozentManager.php");
require_once("../Mapper/Dozent.php");
require_once ("../inc/head.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname = htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");



if (!empty($login) && !empty($vorname) && !empty($nachname) && !empty($password)) {
    $dozentdaten = [
        "login" => $login,
        "vorname" => $vorname,
        "nachname" => $nachname,
        "hash" => password_hash($password, PASSWORD_DEFAULT)

    ];
    $dozent = new Dozent($dozentdaten);
    $DozentManager = new DozentManager();
    $DozentManager->create
    ($dozent);
    echo "Sie haben sich erfolgreich registriert. Zum Fortfahren melden Sie sich an."; ?> <br>
    <a href= "../index.php"> Anmeldeseite </a>
<?php
} else {
    echo "Error: Bitte alle Felder ausf&uumlllen!<br/>"; }
?>
</div>
</body>
</html>
