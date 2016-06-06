<!-- Datei um das Voting Hinzuf�gen Formular zu �berpr�fen, die eingegebenen Werte werden als string umgewandelt und gespeichert,
als neuer Datensatz der Klasse Voting-->

<?php //include("../inc/session_check.php"); ?>

<?php
require_once("../Mapper/VotingManager.php");
require_once("Voting.php");

$Voting_ID = htmlspecialchars($_POST["voting_ID"], ENT_QUOTES, "UTF-8");
$Voting_name = htmlspecialchars($_POST["voting_name"], ENT_QUOTES, "UTF-8");
$Vorlesung = htmlspecialchars($_POST["vorlesung"], ENT_QUOTES, "UTF-8");
$Voting_ablaufzeit = htmlspecialchars($_POST["voting_ablaufzeit"], ENT_QUOTES, "UTF-8");
$Einschreibeschlussel = htmlspecialchars($_POST["Einschreibeschlussel"], ENT_QUOTES, "UTF-8");

if (!empty($Voting_name) && !empty($Voting_ablaufzeit) && !empty($Vorlesung)&& !empty($Einschreibeschlussel)) {
    $votingdaten = [
        "Voting_Name" => $Voting_name,
        "Einschreibeschlussel" => $Einschreibeschlussel,
        "Vorlesung"=> $Vorlesung,
        "Ablaufzeit" => $Voting_ablaufzeit,

    ];
    $Voting = new Voting($votingdaten);
    $VotingManager = new VotingManager();
    $VotingManager->save($Voting);
    header('Location: ../Voting/Votingverzeichnis.php');
} else {
    echo "Error: Bitte alle Felder ausf&uumlllen!<br/>";
}