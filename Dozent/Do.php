<!-- Datei um das Voting Hinzuf?gen Formular zu ?berpr?fen, die eingegebenen Werte werden als string umgewandelt und gespeichert,
als neuer Datensatz der Klasse Voting hi-->

<?php //include("../inc/session_check.php"); ?>


<?php
require_once("../Mapper/DozentManager.php");
require_once("../Mapper/Dozent.php");

$Dozent_ID = htmlspecialchars($_POST["Dozent_ID"], ENT_QUOTES, "UTF-8");
$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname = htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");



if (!empty($login) && !empty($vorname) && !empty($nachname) && !empty($password)) {
    $dozentdaten = [
        "login" => $login,
        "vorname" => $vorname,
        "nachname" => $nachname,
        "password" => $password,

    ];
    $dozent = new Dozent($dozentdaten);
    $DozentManager = new DozentManager();
    $DozentManager->create($dozent);

    header('Location: ../Mapper/startseite.php');
} else {
    echo "Error: Bitte alle Felder ausf&uumlllen!<br/>"; }