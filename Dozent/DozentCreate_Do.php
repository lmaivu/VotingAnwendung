<?php
include("../inc/session_check.php");
?>
    <!-- Datei um das Voting Hinzuf?gen Formular zu ?berpr?fen, die eingegebenen Werte werden als string umgewandelt und gespeichert,
als neuer Datensatz der Klasse Voting hi-->

<!DOCTYPE html>
<html>

<body>

<div class="Fehlermeldung">
<?php
require_once("../Mapper/DozentManager.php");
require_once("../Mapper/Dozent.php");
include ("../inc/head.php");

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

    echo "Sie haben erfolgreich einen neuen Dozenten registriert.<br/>";
    echo "<a href= ../index.php> Zur&uumlck zur Anmeldeseite </a> ";

}
else { ?>
    <div class="Fehlermeldung">
        <?php echo "Bitte alle Felder ausfüllen!<br/>"; ?>
        <a href="../Dozent/DozentCreate_Form.php"> Zurück </a> <?php } ?>
    </div>
</div>
</body>
</html>
