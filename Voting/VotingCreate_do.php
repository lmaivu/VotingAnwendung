<!-- Datei um das Voting Hinzufügen Formular zu überprüfen, die eingegebenen Werte werden als string umgewandelt und gespeichert,
als neuer Datensatz der Klasse Voting-->

<?php //include("../inc/session_check.php"); ?>

<?php
require_once("VotingManager.php");
require_once("Voting.php");

$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$betreff = htmlspecialchars($_POST["betreff"], ENT_QUOTES, "UTF-8");
$text = htmlspecialchars($_POST["text"], ENT_QUOTES, "UTF-8");

if (!empty($name) && !empty($betreff) && !empty($text)) {
    $nutzerdaten = [
        "betreff" => $betreff,
        "name" => $name,
        "text" => $text,
    ];
    $voting = new Voting($nutzerdaten);
    $votingManager = new VotingManager();
    $votingManager->save($voting);
    header('Location: index.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
}