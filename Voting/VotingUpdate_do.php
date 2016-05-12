<?php //include("../inc/session_check.php"); ?>

<?php

require_once("../Mapper/VotingManager.php");
require_once("Voting.php");

$notiz_id = htmlspecialchars($_POST["notiz_id"], ENT_QUOTES, "UTF-8");
$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$betreff = htmlspecialchars($_POST["betreff"], ENT_QUOTES, "UTF-8");
$text = htmlspecialchars($_POST["text"], ENT_QUOTES, "UTF-8");

if (!empty($voting_id) && !empty($name) && !empty($betreff) && !empty($text)) {
    $votingManager = new VotingManager();
    $voting = $votingManager->findById($notiz_id);
    $voting->name = $voting;
    $voting->betreff = $betreff;
    $voting->text = $text;
    $votingManager->save($voting);
    header('Location: index.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}

