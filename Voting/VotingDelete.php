<?php include_once("../inc/session_check.php");; ?>

<?php
require_once("../Voting/Voting.php");
require_once("../Mapper/VotingManager.php");

$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);
$VorlesungManager->delete($Voting);

echo "Das Voting wurde erfolgreich gelöscht."; //Überlegung POP-UP Fenster programmieren zur Abfrage der Löschbestätigung
header('Location: ../Vorlesung/Vorlesungsverzeichnis.php');