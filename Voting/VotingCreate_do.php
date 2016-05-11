<!-- Datei um das Voting Hinzufügen Formular zu überprüfen, die eingegebenen Werte werden als string umgewandelt und gespeichert,
als neuer Datensatz der Klasse Voting-->

<?php //include("../inc/session_check.php"); ?>

<?php
require_once("../Mapper/VotingManager.php");
require_once("Voting.php");

$voting_ID = htmlspecialchars($_POST["voting_ID"], ENT_QUOTES, "UTF-8");
$voting_name = htmlspecialchars($_POST["voting_name"], ENT_QUOTES, "UTF-8");
$voting_ablaufzeit = htmlspecialchars($_POST["voting_ablaufzeit"], ENT_QUOTES, "UTF-8");

if (!empty($voting_name) && !empty($voting_ablaufzeit) && !empty($voting_ergebnis)) {
    $votingdaten = [
        "Voting_Name" => $name,
        "Voting_Ergebnis" => $voting_ergebnis,
        "Ablaufzeit" => $voting_ablaufzeit,

    ];
    $voting = new Voting($votingdaten);
    $votingManager = new VotingManager();
    $votingManager->save($voting);
    header('Location: index.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
}