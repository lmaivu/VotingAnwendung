<!-- Datei um das Voting Hinzuf�gen Formular zu �berpr�fen, die eingegebenen Werte werden als string umgewandelt und gespeichert,
als neuer Datensatz der Klasse Voting-->

<?php //include("../inc/session_check.php"); ?>

<?php
require_once("../Mapper/VotingManager.php");
require_once("Voting.php");

$frage = htmlspecialchars($_POST["frage"], ENT_QUOTES, "UTF-8");
$a = htmlspecialchars($_POST["a"], ENT_QUOTES, "UTF-8");
$b = htmlspecialchars($_POST["b"], ENT_QUOTES, "UTF-8");
$c = htmlspecialchars($_POST["c"], ENT_QUOTES, "UTF-8");
$d = htmlspecialchars($_POST["d"], ENT_QUOTES, "UTF-8");
$Vorlesung_ID = htmlspecialchars($_POST["Vorlesung_ID"], ENT_QUOTES, "UTF-8");


if (!empty($frage) && !empty($a) && !empty($b)&& !empty($c) && !empty($d) && !empty($Vorlesung_ID)) {
    $votingdaten = [
        "frage" => $frage,
        "a"=> $a,
        "b" => $b,
        "c" => $c,
        "d"=> $d,
        "Vorlesung_ID"=> $Vorlesung_ID,

    ];
    $Voting = new Voting($votingdaten);
    $VotingManager = new VotingManager();
    $VotingManager->save($Voting);
    header('Location: ../Voting/Votingverzeichnis.php');
} else {
    echo "Error: Bitte alle Felder ausf&uumlllen!<br/>";
}