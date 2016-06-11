<!-- Variablen müssen noch geändert werden!!! -->
<?php //include("../inc/session_check.php"); ?>

<?php

require_once("../Mapper/VotingManager.php");
require_once("Voting.php");

$notiz_id = htmlspecialchars($_POST["notiz_id"], ENT_QUOTES, "UTF-8");
$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$betreff = htmlspecialchars($_POST["betreff"], ENT_QUOTES, "UTF-8");
$text = htmlspecialchars($_POST["text"], ENT_QUOTES, "UTF-8");

if (!empty($Voting_ID) && !empty($name) && !empty($betreff) && !empty($text)) {
    $votingManager = new VotingManager();
    $Voting = $votingManager->findById($notiz_id);
    $Voting->name = $Voting;
    $Voting->text = $text;
    $votingManager->save($Voting);
    header('Location: ../index.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}

